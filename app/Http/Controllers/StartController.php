<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StartController extends Controller
{

    public function startMenu()
    {
        Cache::flush();
        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Выберите услугу:',
            'reply_markup' => json_encode(
                [
                    'keyboard' => [
                        [
                            ['text' => 'Горячая вода'],
                            ['text' => 'Холодная вода'],
                            ['text' => 'Свет'],
                        ],
                        [
                            ['text' => 'Сформировать'],
                        ],
                    ],
                    'resize_keyboard' => true,
                    'one_time_keyboard' => false]
            ),
        ]);
    }
}
