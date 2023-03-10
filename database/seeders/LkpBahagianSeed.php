<?php

namespace Database\Seeders;

use App\Models\LkpBahagian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LkpBahagianSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $senarai_bahagian = [
            'Bahagian Kewangan',
            'Bahagian Integriti',
            'Bahagian IT',
        ];

        foreach($senarai_bahagian as $bahagian) {
            LkpBahagian::updateOrCreate(
                [
                    'keterangan' => $bahagian,
                ],
                [
                    'status' => true
                ]
            );
        };

    }
}
