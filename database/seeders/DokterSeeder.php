<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dokters')->insert([
            'nama' => "Dr. Manah",
            'alamat' => fake()->address(),
            'email' => "manah@gmail.com",
            'nohp' => fake()->phoneNumber(),
            'keahlian' => fake()->randomElement(['Spesialis Jantung', 'Spesialis Mata', 'Spesialis Bedah', 'Spesialis Anak', 'Dokter Umum']),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        for ($i = 0; $i < 10; $i++) {
            DB::table('dokters')->insert([
                'nama' =>  fake()->name(),
                'alamat' => fake()->address(),
                'email' => fake()->email(),
                'nohp' => fake()->phoneNumber(),
                'keahlian' => fake()->randomElement(['Spesialis Jantung', 'Spesialis Mata', 'Spesialis Bedah', 'Spesialis Anak', 'Dokter Umum']),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}