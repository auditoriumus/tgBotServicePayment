<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'service' => 'Горячая вода',
                'cost' => 205.15
            ],
            [
                'service' => 'Холодная вода',
                'cost' => 42.30
            ],
            [
                'service' => 'Свет',
                'cost' => 5.66
            ],
        ];

        DB::table('prices')->insert($data);
    }
}
