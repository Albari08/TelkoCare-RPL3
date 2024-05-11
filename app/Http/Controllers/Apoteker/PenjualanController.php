<?php

namespace App\Http\Controllers\Apoteker;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $items = Penjualan::latest()->get();
        return view('apoteker.pages.penjualan.index', [
            'title' => 'Riwayat Penjualan',
            'items' => $items
        ]);
    }
}
