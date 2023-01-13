<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table   = 'categories';
    protected $guarded = false;

    public static function tree()
    {
        $allCategories  = self::all();
        $rootCategories = $allCategories->where( 'parent_id', 0 );
        self::formatTree( $rootCategories, $allCategories );

        return $rootCategories;

    }


    private static function formatTree( $categories, $allCategories )
    {
        foreach( $categories as $category ) {
            $category->children = $allCategories->where( 'parent_id', $category->id )->values();
            if( !empty( $category->children ) ) {
                self::formatTree( $category->children, $allCategories );
            }
        }
    }

}
