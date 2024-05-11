<?php

namespace App\Http\Controllers\Apoteker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('apoteker.pages.dashboard', [
            'title' => 'Dashboard'
        ]);
    }
}
