<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorReturnController extends Controller
{
    static function reply(Request $request, $telegram)
    {
        $input = $request->all();
        $params = [ 'chat_id' => $input['message']['chat']['id'], 'text' => 'Извините, что-то пошло не так, попробуйте сначала /start',];

        $telegram->sendMessage($params);
    }
}
