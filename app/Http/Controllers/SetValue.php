<?php

namespace App\Http\Controllers;

use App\Models\Energy;
use App\Models\Gvs;
use App\Models\Hvs;
use Illuminate\Support\Facades\Cache;

class SetValue extends Controller
{
    public function index()
    {
        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'text' => 'Введите показание счетчика и нажмите Сохранить:',
            'reply_markup' => json_encode(
                [
                    'keyboard' => [
                        [
                            ['text' => 'Сохранить'],
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

    public function sendToCache($value)
    {
        if (Cache::has('gvs')) {
            Cache::put('gvs', $value);
        } elseif (Cache::has('hvs')) {
            Cache::put('hvs', $value);
        } elseif (Cache::has('energy')) {
            Cache::put('energy', $value);
        }
    }

    public function saveValue()
    {
        if (Cache::has('gvs')) {
            Gvs::create([
                'value' => Cache::get('gvs')
            ]);
        } elseif (Cache::has('hvs')) {
            Hvs::create([
                'value' => Cache::get('hvs')
            ]);
        } elseif (Cache::has('energy')) {
            Energy::create([
                'value' => Cache::get('energy')
            ]);
        }

        app(StartController::class)->startMenu();
    }
}
