<?php

namespace App\Http\Resources\API\client;

use App\Http\Resources\API\admin\tag\TagResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     *
     */
    public static function getCurrency($part)
    {
        if ($part->convert == 1) {
            if ($part->price_currency == 1) {
                $currency = 'usd';
            } elseif ($part->price_currency == 2) {
                $currency = 'euro';
            } else {
                $currency = 'грн';
            }
        }
        if ($part->convert == 0) {
            if ($part->price_currency == 1) {
                $currency = 'usd';
            } elseif ($part->price_currency == 2) {
                $currency = 'euro';
            } else {
                $currency = 'грн';
            }
        }

        return $currency;
    }
}
