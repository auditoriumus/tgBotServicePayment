<?php

namespace App\Http\Controllers;

use App\Models\Energy;
use App\Models\Gvs;
use App\Models\Hvs;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function index()
    {
        $gvs = Gvs::orderBy('id', 'desc')
            ->get()
            ->toArray();
        $totalGvs = ($gvs[0]['value']-$gvs[1]['value'])*205.15;

        $hvs = Hvs::orderBy('id', 'desc')
            ->get()
            ->toArray();
        $totalHvs = ($hvs[0]['value']-$hvs[1]['value'])*42.30;

        $energy = Energy::orderBy('id', 'desc')
            ->get()
            ->toArray();
        $totalEnergy = ($energy[0]['value'] - $energy[1]['value'])/2*5.66;

        $this->telegram->sendMessage([
            'chat_id' => $this->chatId,
            'parse_mode' => 'HTML',
            'text' => '
            <b>Электроэнергия</b>: Оплачено до ' . $energy[1]['value'] . "\n" . 'Cейчас ' . $energy[0]['value'] . "\n" . $energy[0]['value'] . ' - ' . $energy[1]['value'] . ' = ' . $energy[0]['value'] - $energy[1]['value'] . '/2*5.66 = ' . $totalEnergy  . "р.\n\n" .

            '<b>ХВС</b>: Оплачено до ' . $hvs[1]['value'] . "\n" . 'Сейчас ' . $hvs[0]['value'] . "\n" . $hvs[0]['value'] . ' - ' . $hvs[1]['value'] . ' = ' . $hvs[0]['value']-$hvs[1]['value'] . '(мкуб)*42.30=' . $totalHvs . "р.\n\n" .

            '<b>ГВС</b>: Оплачено до ' . $gvs[1]['value'] . "\n" . 'Сейчас ' . $gvs[0]['value'] . "\n" . $gvs[0]['value'] . ' - ' . $gvs[1]['value'] . ' = ' . $gvs[0]['value']-$gvs[1]['value'] . '(мкуб)*205.15=' . $totalGvs  . "р.\n\n" .

            $totalEnergy . ' + ' . $totalHvs . ' + ' . $totalGvs . ' = ' . $totalEnergy + $totalHvs + $totalGvs . 'р'

        ]);
    }
}
