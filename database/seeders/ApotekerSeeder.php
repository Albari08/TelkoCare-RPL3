<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ApotekerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('apotekers')->insert([
            'nama' => "Apoteker",
            'tempat_praktik' => fake()->address(),
            'email' => "apoteker@gmail.com",
            'password' => Hash::make('password'),
            'jadwal_praktik' => "Senin - Jum'at"
        ]);
    }
}
