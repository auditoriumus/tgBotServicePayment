<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HvsController extends Controller
{
    public function index()
    {
        Cache::put('hvs', true);
        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Холодная вода: Выберите действие:',
            'reply_markup' => json_encode(
                [
                    'keyboard' => [
                        [
                            ['text' => 'Ввести показатель'],
                        ],
                        [
                            ['text' => 'В начало'],
                        ],
                    ],
                    'resize_keyboard' => true,
                    'one_time_keyboard' => false]
            ),
        ]);
    }
}
