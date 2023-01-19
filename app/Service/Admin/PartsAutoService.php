<?php

namespace App\Service\Admin;

use App\Models\Parts;
use App\Models\PartsImages;

class PartsAutoService
{
    public function store( $data )
    {

        try {
            \DB::beginTransaction();

            if( !empty( $data['brands'] ) ) {
                $brandIds = $data['brands'];
                unset( $data['brands'] );
            }
            if( !empty( $data['image'] ) ) {
                $imageIds = $data['image'];
                unset( $data['image'] );
            }
            if( !empty( $data['tags'] ) ) {
                $tagsIds = $data['tags'];
                unset( $data['tags'] );
            }

            $data['price_show'] = Parts::getPrice($data);

            $part = Parts::firstOrCreate( $data );

            if( !empty( $brandIds ) ) {
                $part->brands()->attach( $brandIds );
            }
            if( !empty( $tagsIds ) ) {
                $part->tags()->attach( $tagsIds );
            }
            if( !empty( $imageIds ) ) {
                foreach( $imageIds as $image ) {
                    $image = \Storage::disk( 'public' )->put( '/image/parts', $image );
                    PartsImages::firstOrCreate( [ 'path_image' => $image, 'part_id' => $part['id'] ] );
                }
            }

            \DB::commit();

        } catch( \Exception $exception ) {
            \DB::rollBack();
            abort( 500, $exception );
        }
    }

    public function update( $data, $part )
    {

        try {
            \DB::beginTransaction();

            if( !empty( $data['brands'] ) ) {
                $brandIds = $data['brands'];
                unset( $data['brands'] );
            }
            if( !empty( $data['image'] ) ) {

                $imagesIds = $data['image'];
                unset( $data['images'] );
            }
            if( !empty( $data['tags'] ) ) {
                $tagsIds = $data['tags'];
                unset( $data['tags'] );
            }

            $data['price_show'] = Parts::getPrice($data);

            $part->update( $data );

            if( !empty( $brandIds ) ) {
                $part->brands()->sync( $brandIds );
            }
            if( !empty( $tagsIds ) ) {
                $part->tags()->sync( $tagsIds );
            }
            if( !empty( $imagesIds ) ) {
                $partImages = PartsImages::where('part_id', $part->id)->pluck('path_image');
                foreach ($partImages as $partImage) {
                    \Storage::disk( 'public' )->delete($partImage);
                }
                $part->images()->delete();
                foreach( $imagesIds as $image ) {
                    $image = \Storage::disk( 'public' )->put( '/image/parts', $image );
                    $part->images()->firstOrCreate( [ 'path_image' => $image, 'part_id' => $part['id'] ] );
                }
            }

            \DB::commit();

        } catch( \Exception $exception ) {
            \DB::rollBack();
            abort( 500 );
        }
    }
}
