<?php

namespace Database\Seeders;

use App\Models\Diagnosa;
use App\Models\Tindakan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TindakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tindakan::create([
            'nama' => 'Diet'
        ]);
        Tindakan::create([
            'nama' => 'Pengobatan'
        ]);
    }
}
