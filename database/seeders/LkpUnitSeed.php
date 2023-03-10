<?php

namespace Database\Seeders;

use App\Models\LkpUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LkpUnitSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $senarai_unit = [
            'Unit A',
            'Unit B',
            'Unit C'
        ];

        foreach($senarai_unit as $unit) {
            LkpUnit::updateOrCreate(
                [
                    'keterangan' => $unit,
                ],
                [
                    'status' => true
                ]
            );
        };
    }
}
