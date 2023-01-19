<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PriceCurrency extends Controller
{
    public static function getCurrencyPrice($data)
    {
        $usd = DB::table('settings')->value('usd');
        $euro = DB::table('settings')->value('euro');

        //Перевіряємо в якій валюті ціна
        if ($data['price_currency'] == 1) {
            $price_1 = ceil($data['price_1'] * $usd);
        } elseif ($data['price_currency'] == 2) {
            $price_1 = ceil($data['price_1'] * $euro);
        } else {
            //Це якщо ціна заведена в гривні, price_currency = 0
            $price_1 = ceil($data['price_1']);
        }

        //Перевіряємо в якій валюті ціна
        if ($data['price_2'] > 0) {
            if ($data['price_currency'] == 1) {
                $price_2 = ceil($data['price_2'] * $usd);
            } elseif ($data['price_currency'] == 2) {
                $price_2 = ceil($data['price_2'] * $euro);
            } else {
                //Це якщо ціна FIX заведена в гривні, price_currency = 0
                $price_2 = ceil($data['price_2']);
            }
        }

        return $price_2 ?: $price_1;
    }

}