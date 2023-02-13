<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class PriceCoefCurrency extends Controller
{

    private static $coef  = null;
    private static $usd   = null;
    private static $euro  = null;
    private static $coef2 = null;

    public static function checkAndReturnPriceWithExchange($part, $price)
    {
        //Перевіряємо в якій валюті ціна
        if ($part['price_currency'] == 1) {
            $price = ceil($price * self::$usd);
        } elseif ($part['price_currency'] == 2) {
            $price = ceil($price * self::$euro);
        } else {
            //Це якщо ціна заведена в гривні, price_currency = 0
            $price = ceil($price);
        }

        return $price;
    }

    public static function checkDependenciesQuery($part)
    {
        if ($part['price_currency'] != 0 || $part['price_2'] <= 0) {
            $data = DB::table('settings')->first();
            if ($data) {
                self::$coef = $data->coef;
                self::$usd  = $data->usd;
                self::$euro = $data->euro;
            }
        }

        if (isset($part['label'])) {
            self::$coef2 = Supplier::where('title', $part['label'])->value('coefficient');
        }
    }

    public static function getPriceWithCoef($part)
    {
        self::checkDependenciesQuery($part);

        $price = $part['price_2'] > 0 ? $part['price_2'] : $part['price_1'];

        $price = self::checkAndReturnPriceWithExchange($part, $price);

        if ($part['price_2'] > 0) {
            return ceil($price);
        }
        if (self::$coef2 > 0) {
            return ceil($price * self::$coef2);
        }

        return ceil($price * self::$coef);
    }

    public static function getPriceWithCoefWoutConvert($part)
    {
        self::checkDependenciesQuery($part);

        $price = $part['price_2'] > 0 ? $part['price_2'] : $part['price_1'];

        if ($part['price_2'] > 0) {
            return ceil($price);
        }

        if (self::$coef2 > 0) {
            return ceil($price * self::$coef2);
        }

        return ceil($price * self::$coef);
    }

}