<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Nomina;

class NominaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nomina::create([
            'user_id' => 1,
            'periodo' => '2025-11',
            'monto' => 1500.00,
        ]);

        Nomina::create([
            'user_id' => 1,
            'periodo' => '2025-12',
            'monto' => 1600.00,
        ]);

        Nomina::create([
            'user_id' => 1,
            'periodo' => '2026-01',
            'monto' => 1700.00,
        ]);
    }
}
