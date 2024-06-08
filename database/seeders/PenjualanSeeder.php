<?php

namespace Database\Seeders;

use App\Models\Obat;
use App\Models\Penjualan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obats = Obat::get();
        $penjualan = Penjualan::create([
            'kode' => 'PNJ001',
            'jenis_pembayaran' => 'Asuransi'
        ]);
        foreach ($obats as $obat) {
            $penjualan->details()->create([
                'obat_id' => $obat->id,
                'jumlah' => rand(1, 10)
            ]);
        }
    }
}
