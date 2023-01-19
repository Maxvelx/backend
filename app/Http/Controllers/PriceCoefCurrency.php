<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PriceCoefCurrency extends Controller
{
    public static function getPriceWithCoef($price_show)
    {
        $coef = DB::table('settings')->value('coef');

        return ceil($price_show * $coef);

    }

}