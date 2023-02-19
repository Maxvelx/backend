<?php

namespace App\Http\Controllers\API\telegram;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class TelegramController extends Controller
{
    /**
     * @throws GuzzleException
     */
    public static function sendMessage($phone, $total)
    {
        $message         = "<pre>У вас нове замовлення!</pre>"."\n".
            "Тел. замовника: "."<code>".$phone."</code>"."\n".
            "Разом на суму: ".$total."\n".
            "<b>Бажаєте перейти в адмін панель?</b>";
        $token           = '6015572784:AAEEkM1C8x27VEMJdZatqyyqLBqeWg2_K9E';
        $inline_button1  = [
            "text" => "Перейти в адмін панель",
            "url"  => "https://adminshop.template.maxvel.pp.ua/"
        ];
        $inline_keyboard = [[$inline_button1]];
        $keyboard        = array("inline_keyboard" => $inline_keyboard);
        $replyMarkup     = json_encode($keyboard);

        $client = new Client();
        return $client->post('https://api.telegram.org/bot'.$token.'/sendMessage', [
            'form_params' => [
                'chat_id'                  => 166145439,
                'text'                     => $message,
                'parse_mode'               => 'html',
                'reply_markup'             => $replyMarkup,
            ]
        ]);
    }

}
