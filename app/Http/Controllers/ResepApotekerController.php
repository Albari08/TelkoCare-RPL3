<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;

class ResepApotekerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $resep = Resep::where('nama_apoteker', 'like', "%$search%")->get();
        return view('resepApoteker.index', compact('resep'));
    }

    public function show($id)
    {
        $resep = Resep::findOrFail($id);
        return view('resepApoteker.show', compact('resep'));
    }

    public function confirm($id)
    {
        $resep = Resep::findOrFail($id);
        $resep->status = 'Confirmed';
        $resep->save();

        return redirect()->route('resepApoteker.index')->with('status', 'Resep berhasil dikonfirmasi');
    }
}
