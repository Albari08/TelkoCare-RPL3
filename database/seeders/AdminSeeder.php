<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'nama' => "Admin",
            'alamat' => fake()->address(),
            'email' => "admin@gmail.com",
            'password' => Hash::make('password'),
        ]);
        for ($i = 0; $i < 10; $i++) {
            DB::table('admins')->insert([
                'nama' => fake()->name(),
                'alamat' => fake()->address(),
                'email' => fake()->email(),
                'password' => Hash::make('password'),
            ]);
        }
    }
}