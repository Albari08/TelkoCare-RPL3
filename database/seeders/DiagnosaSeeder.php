<?php

namespace Database\Seeders;

use App\Models\Diagnosa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiagnosaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Diagnosa::create([
            'nama' => 'Hipertensi'
        ]);
        Diagnosa::create([
            'nama' => 'Hermofilia'
        ]);
    }
}
