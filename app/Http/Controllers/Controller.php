<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Telegram\Bot\Api;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected Api $telegram;
    protected \Telegram\Bot\Objects\Update $result;
    protected int $chatId;

    protected array $startMenu = [
        '/start',
        'В начало',
        'Горячая вода',
        'Холодная вода',
        'Свет',
    ];

    protected array $command = [
        [StartController::class => 'startMenu'],
        [StartController::class => 'startMenu'],
        [GvsController::class => 'index'],
        [HvsController::class => 'index'],
        [EnergyController::class => 'index'],
    ];


    public function __construct()
    {
        $this->telegram = new Api('1926141755:AAGpGThgfLP8R72ZHH-Z-kXtRcQHj_9GP2s');

        //возвращаемые значения бота
        $this->result = $this->telegram->getWebhookUpdate();

        $this->chatId = $this->result['message']['chat']['id'];
    }

}
