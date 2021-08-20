<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if (empty($this->result)) {
            ErrorReturnController::reply($request, $this->telegram);
            return;
        }

        $message = $this->result['message']['text'];

        $message = str_replace(',', '.', $message);

        if (array_search($message, $this->startMenu) !== false) {
            $key = array_search($message, $this->startMenu);
            foreach ($this->command[$key] as $controller => $method) {
                app($controller)->{$method}();
                return;
            }
        }

        if ($message == 'Ввести показатель') {
            app(SetValue::class)->index();
        }

        if (is_numeric($message)) {
            app(SetValue::class)->sendToCache($message);
        }


        if ($message == 'Сохранить') {
            app(SetValue::class)->saveValue();
        }

        if ($message == 'Сформировать') {
            app(ResponseController::class)->index();
        }
    }
}
