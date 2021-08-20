<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class EnergyController extends Controller
{
    public function index()
    {
        Cache::put('energy', true);
        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Свет: Выберите действие:',
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
