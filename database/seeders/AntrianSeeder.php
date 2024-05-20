<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AntrianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('antrians')->insert([
            'waktu_antrian' => "2024-04-21 23:00:00",
            'nomor_antrian' => 1,
            'loket' => 2,
            'ruang_antrian' => "Ruang A",
            'user_id' => 1,
        ]);
        DB::table('antrians')->insert([
            'waktu_antrian' => "2024-04-21 23:00:00",
            'nomor_antrian' => 1,
            'loket' => 1,
            'ruang_antrian' => "Ruang A",
            'user_id' => 1,
        ]);
        DB::table('antrians')->insert([
            'waktu_antrian' => "2024-04-21 23:00:00",
            'nomor_antrian' => 2,
            'loket' => 1,
            'ruang_antrian' => "Ruang A",
            'user_id' => 2,
        ]);
        DB::table('antrians')->insert([
            'waktu_antrian' => "2024-04-22 23:00:00",
            'nomor_antrian' => 1,
            'loket' => 2,
            'ruang_antrian' => "Ruang B",
            'user_id' => 1,
        ]);
    }
}