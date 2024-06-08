<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pasien.pages.dashboard', [
            'title' => 'Dashboard'
        ]);
    }
}
