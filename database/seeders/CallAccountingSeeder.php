<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CallAccountingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'SubscriberName' => 'Quadient franz.',
                'DialledNumber' => '0244826010',
                'Date' => '2023-07-18',
                'Time' => '14:32:00',
                'RingingDuration' => '00:00:30',
                'CallDuration' => '00:00:39',
                'Type' => 'angenommen',
                'CallType' => 'eingehend',
            ],
            // Füge hier weitere Testdaten hinzu, falls benötigt
        ];

        // Daten in die Tabelle einfügen
        DB::table('deine_tabellenname')->insert($data);
    }
}
