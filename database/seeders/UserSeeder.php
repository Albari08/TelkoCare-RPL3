<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nama' => "user",
            'alamat' => fake()->address(),
            'tanggal_lahir' => fake()->date(),
            'tempat_lahir' => fake()->city(),
            'nim' =>fake()->randomNumber(9),
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'nohp' => fake()->phoneNumber(),
            'email' => "user@gmail.com",
            'password' => Hash::make('password'),
        ]);
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'nama' => fake()->name(),
                'alamat' => fake()->address(),
                'tanggal_lahir' => fake()->date(),
                'tempat_lahir' => fake()->city(),
                'nim' => fake()->randomNumber(9),
                'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                'nohp' => fake()->phoneNumber(),
                'email' => fake()->email(),
                'password' => Hash::make('password'),
            ]);
        }

    }
}