<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class GvsController extends Controller
{
    public function index()
    {
        Cache::put('gvs', true);
        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Горячая вода: Выберите действие:',
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
