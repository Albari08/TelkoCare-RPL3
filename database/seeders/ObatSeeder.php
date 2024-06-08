<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Obat::create([
            'kode' => 'OB001',
            'nama' => 'Prinivil'
        ]);
        Obat::create([
            'kode' => 'OB002',
            'nama' => 'Zestril'
        ]);
        Obat::create([
            'kode' => 'OB001',
            'nama' => 'Norvasc'
        ]);
    }
}
