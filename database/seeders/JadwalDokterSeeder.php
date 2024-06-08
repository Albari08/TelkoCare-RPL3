<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JadwalDokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insert jadwal dokter untuk beberapa dokter dan tanggal yang sama
        for ($i = 0; $i < 10; $i++) {
            DB::table('jadwal_dokters')->insert([
                'tanggal' => Date::today()->addDays(1)->toDateString(),
                'waktu' => $faker->time(),
                'dokter_id' => $faker->randomElement([1, 2, 3, 4, 5]),
                'created_at' => Date::now(),
                'updated_at' => Date::now(),
            ]);
        }
        // Insert jadwal dokter untuk dokter dengan id 1 dan tanggal yang sama
        for ($i = 0; $i < 4; $i++) {
            DB::table('jadwal_dokters')->insert([
                'tanggal' => Date::today()->toDateString(),
                'waktu' => $faker->time(),
                'dokter_id' => 1,
                'created_at' => Date::now(),
                'updated_at' => Date::now(),
            ]);
        }

        // Insert jadwal dokter untuk dokter dengan id 1 dan tanggal +1 hari
        for ($i = 0; $i < 4; $i++) {
            DB::table('jadwal_dokters')->insert([
                'tanggal' => Date::today()->addDays($i)->toDateString(),
                'waktu' => $faker->time(),
                'dokter_id' => 1,
                'created_at' => Date::now(),
                'updated_at' => Date::now(),
            ]);
        }
        for ($i = 0; $i < 10; $i++) {
            DB::table('jadwal_dokters')->insert([
                'tanggal' => Date::today()->addDays($i)->toDateString(),
                'waktu' => $faker->time(),
                'dokter_id' => 1,
                'created_at' => Date::now(),
                'updated_at' => Date::now(),
            ]);
        }
    }
}