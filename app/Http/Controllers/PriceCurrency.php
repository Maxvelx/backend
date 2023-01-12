<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PriceCurrency extends Controller
{
    public static function getCurrencyPrice($part)
    {
        $usd  = DB::table('settings')->value('usd');
        $euro = DB::table('settings')->value('euro');
        $coef = DB::table('settings')->value('coef');

        $price_1 = ceil($part->price_1); //Це якщо ціна заведена в гривні, price_currency = 0
        //Перевіряємо в якій валюті ціна
        if ($part->price_currency == 1) {
            $price_1 = ceil($part->price_1 * $usd);
        } elseif ($part->price_currency == 2) {
            $price_1 = ceil($part->price_1 * $euro);
        }

        $price_2 = ceil($part->price_2);//Це якщо ціна FIX заведена в гривні, price_currency = 0
        //Перевіряємо в якій валюті ціна
        if ($part->price_2 > 0) {
            if ($part->price_currency == 1) {
                $price_2 = ceil($part->price_2 * $usd);
            } elseif ($part->price_currency == 2) {
                $price_2 = ceil($part->price_2 * $euro);
            }
        }

        $price_1 = ceil($price_1 * $coef);
        $price_2 = ceil($price_2 * $coef);

        return ['price_1' => $price_1, 'price_2' => $price_2];
    }

}