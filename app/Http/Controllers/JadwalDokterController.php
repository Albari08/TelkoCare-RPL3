<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJadwalDokterRequest;
use App\Http\Requests\UpdateJadwalDokterRequest;
use App\Models\Booking;
use App\Models\Dokter;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonTimeZone;

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
    public function index($id, Request $request)
    {
        $bookings = Booking::where('user_id', Auth::user()->id)->get();
        if($bookings->isNotEmpty()){
            foreach ($bookings as $booking) {
                $jadwal_dokter_time = Carbon::parse($booking->jadwalDokter->tanggal . ' ' . $booking->jadwalDokter->waktu, 'Asia/Jakarta');
                $now = Carbon::now()->setTimezone('Asia/Jakarta');
                if ($jadwal_dokter_time->gt($now) && strtolower($booking->status) == "progress" ) {
                    return view('azkanoor.pasien.konfirmasi-booking', compact('booking'));
                }else if ($jadwal_dokter_time->gt($now) && strtolower($booking->status) == "diterima") {
                    return view('azkanoor.pasien.booking-selesai', compact('booking'));
                }
            }
        }
        $startDate = now()->toDateString();
        $endDate = now()->addDays(5)->toDateString();
        if ($request->startDate && $request->endDate) {
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
        return view('azkanoor.pasien.jadwal-dokter', compact('startDate', 'endDate', 'jadwalDokters', 'groupedJadwalDokters', 'detailJadwal', 'dokter'));
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