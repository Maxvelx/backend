<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PriceCurrency extends Controller
{
    public static function getСurrencyPrice($part)
    {

        $usd  = 10;
        $euro = 20;

        $price_1 = $part->price_1; //Це якщо ціна заведена в гривні, price_currency = 0
        //Перевіряемо в якій валюті ціна
        if ($part->price_currency == 1) {
            $price_1 = $part->price_1 * $usd;
        } elseif ($part->price_currency == 2) {
            $price_1 = $part->price_1 * $euro;
        }

        $price_2 = $part->price_2;//Це якщо ціна FIX заведена в гривні, price_currency = 0
        //Перевіряемо в якій валюті ціна
        if ($part->price_2 > 0) {
            if ($part->price_currency == 1) {
                $price_2 = $part->price_2 * $usd;
            } elseif ($part->price_currency == 2) {
                $price_2 = $part->price_2 * $euro;
            }
        }

        return ['price_1' => $price_1,'price_2' => $price_2];
    }

}
