<?php

namespace Database\Seeders;

use App\Models\Diagnosa;
use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Pemeriksaan;
use App\Models\Tindakan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemeriksaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_tindakan = Tindakan::get();
        $data_diagnosa = Diagnosa::get();
        $data_obat = Obat::get();
        $pemeriksaan = Pemeriksaan::create([
            'user_id' => 1,
            'dokter_id' => Dokter::inRandomOrder()->first()->id
        ]);
        foreach ($data_tindakan  as $tindakan) {
            $pemeriksaan->tindakans()->create([
                'tindakan_id' => $tindakan->id
            ]);
        }
        foreach ($data_diagnosa  as $diagnosa) {
            $pemeriksaan->diagnosas()->create([
                'diagnosa_id' => $diagnosa->id
            ]);
        }
        foreach ($data_obat  as $obat) {
            $pemeriksaan->obats()->create([
                'obat_id' => $obat->id
            ]);
        }
    }
}
