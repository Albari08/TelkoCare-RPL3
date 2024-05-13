<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;
use App\Models\ResepDetail;
use App\Models\ResepDetailTemp;

class ResepPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $resep = Resep::all();

    //     return view('resepPasien.index', compact('resep'));
    // }

    public function index(Request $request)
    {
        $search = $request->get('search');
        $resep = Resep::where('nama_pasien', 'like', '%' . $search . '%')
                  ->where('status', '!=', 'Purchased')
                  ->get();
        return view('resepPasien.index', compact('resep'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $resep = Resep::find($id);
        $resepDetails = $resep->resepDetails;

        return view('resepPasien.show', compact('resep', 'resepDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $resep = Resep::find($id);
        $resep->status = "Purchased";
        $resep->store = $request->store;
        $resep->save();
        return redirect()->route('resepPasien.index', $resep->id)->with('status', 'Resep updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
