<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJadwalDokterRequest;
use App\Http\Requests\UpdateJadwalDokterRequest;
use App\Models\Dokter;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;


class JadwalDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminIndex($id, Request $request)
    {
        
        $startDate = now()->toDateString();
        $endDate = now()->addDays(5)->toDateString();
        if($request->startDate && $request->endDate){
            $startDate = $request->startDate;
            $endDate = $request->endDate;
        }
        $jadwalDokters = JadwalDokter::where('dokter_id', $id)
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->orderBy('tanggal')
            ->orderBy('waktu')
            ->get();
        $dokter = Dokter::where('id', $id)->first();
        $groupedJadwalDokters = $jadwalDokters->groupBy('tanggal');
        $detailJadwal = JadwalDokter::where('id', $request->idwaktu)->first();
        return view('azkanoor.jadwal-dokter', compact('startDate', 'endDate', 'jadwalDokters', 'groupedJadwalDokters', 'detailJadwal', 'dokter'));
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
    public function store(StoreJadwalDokterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalDokter $jadwalDokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalDokter $jadwalDokter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function adminUpdate(Request $request, $id)
    {
        $request->validate([
            'waktu' => 'required|date_format:H:i:s',
            'tanggal' => 'required|date',
        ]);
        $jadwalDokter = JadwalDokter::find($id);
        $jadwalDokter->update([
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
        ]);
        return redirect()->route('admin.jadwal.dokter', ['id' => $jadwalDokter->dokter_id])->with('success', 'Jadwal Dokter berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalDokter $jadwalDokter)
    {
        //
    }
}