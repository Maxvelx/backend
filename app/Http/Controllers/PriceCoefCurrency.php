<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PriceCoefCurrency extends Controller
{
    public static function getPriceWithCoef($part)
    {
        $coef = DB::table('settings')->value('coef');
        $usd  = DB::table('settings')->value('usd');
        $euro = DB::table('settings')->value('euro');

        //Перевіряємо в якій валюті ціна
        if ($part->price_currency == 1) {
            $price_show = ceil($part->price_show * $usd);
        } elseif ($part->price_currency == 2) {
            $price_show = ceil($part->price_show * $euro);
        } else {
            //Це якщо ціна заведена в гривні, price_currency = 0
            $price_show = ceil($part->price_show);
        }

        return ceil($price_show * $coef);
    }

    public static function getPriceWithCoefWoutConvert($price_show)
    {
        $coef = DB::table('settings')->value('coef');
        return ceil($price_show * $coef);
    }

}