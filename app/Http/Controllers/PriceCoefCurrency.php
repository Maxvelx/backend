<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class PriceCoefCurrency extends Controller
{

    public static function getPriceWithCoef($part)
    {
        $coef = null;
        $usd  = null;
        $euro = null;

        if ($part->price_currency != 0 || $part->price_2 <= 0) {
            $data = DB::table('settings')->first();
            if ($data) {
                $coef = $data->coef;
                $usd  = $data->usd;
                $euro = $data->euro;
            }
        }

        $coef2 = null;

        if ($part->label) {
            $coef2 = Supplier::where('title', $part->label)->value('coefficient');
        }

        //Перевіряємо в якій валюті ціна
        if ($part->price_currency == 1) {
            $price_show = ceil($part->price_show * $usd);
        } elseif ($part->price_currency == 2) {
            $price_show = ceil($part->price_show * $euro);
        } else {
            //Це якщо ціна заведена в гривні, price_currency = 0
            $price_show = ceil($part->price_show);
        }

        if ($part->price_2 > 0) {
            return ceil($price_show);
        }
        if ($coef2 > 0) {
            return ceil($price_show * $coef2);
        }

        return ceil($price_show * $coef);
    }

    public static function getPriceWithCoefWoutConvert($part)
    {
        $coef = null;
        if ($part->price_2 <= 0) {
            $coef = DB::table('settings')->value('coef');
        }

        $coef2 = null;
        if ($part->label) {
            $coef2 = Supplier::where('title', $part->label)->value('coefficient');
        }

        if ($part->price_2 > 0) {
            return ceil($part->price_show);
        }
        if ($coef2 > 0) {
            return ceil($part->price_show * $coef2);
        }

        return ceil($part->price_show * $coef);
    }

}