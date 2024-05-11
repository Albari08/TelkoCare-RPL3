<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAntrianRequest;
use App\Http\Requests\UpdateAntrianRequest;
use App\Models\Antrian;
use App\Models\LogUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  antrian pasien
    public function index(Request $request)
    {
        $tanggal = $request->tanggal;
        $today = Carbon::now('Asia/Jakarta')->toDateString();
        $antrians = Antrian::where('user_id', Auth::user()->id)
            ->whereDate('waktu_antrian', '>=', $today)
            ->orderBy('waktu_antrian')
            ->get();
        $groupedAntrians = $antrians->groupBy(function ($antrian) {
            return Carbon::parse($antrian->waktu_antrian)->format('d F Y');
        });

        if (!$tanggal) {
            $latestAntrianSatu = Antrian::where('loket', 1)->whereDate('waktu_antrian', $today)->latest()->first();
            $latestAntrianDua = Antrian::where('loket', 2)->whereDate('waktu_antrian', $today)->latest()->first();
        } else {
            $latestAntrianSatu = Antrian::where('loket', 1)->whereDate('waktu_antrian', $tanggal)->latest()->first();
            $latestAntrianDua = Antrian::where('loket', 2)->whereDate('waktu_antrian', $tanggal)->latest()->first();
        }
        return view('rafly.antrian-pasien', compact('groupedAntrians', 'latestAntrianSatu', 'latestAntrianDua', 'today', 'tanggal'));
    }
    public function adminIndex()
    {
        // Mendapatkan tanggal hari ini dengan zona waktu 'Asia/Jakarta'
        $today = Carbon::now('Asia/Jakarta')->toDateString();

        // Mendapatkan semua antrian dengan user_id 1 yang memiliki tanggal antrian setelah atau sama dengan hari ini
        $antrians = Antrian::whereDate('waktu_antrian', '>=', $today)
            ->orderBy('waktu_antrian')
            ->get();

        // Mengelompokkan antrians berdasarkan tanggal
        $groupedAntrians = $antrians->groupBy(function ($antrian) {
            return Carbon::parse($antrian->waktu_antrian)->format('d F Y');
        });
        return view('rafly.antrian-admin', compact('groupedAntrians'));
    }
    public function show($id, Request $request)
    {
        $tanggal = $request->tanggal;
        $today = Carbon::now('Asia/Jakarta')->toDateString();
        $antrians = Antrian::where('user_id', Auth::user()->id)
            ->whereDate('waktu_antrian', '>=', $today)
            ->orderBy('waktu_antrian')
            ->get();
        $groupedAntrians = $antrians->groupBy(function ($antrian) {
            return Carbon::parse($antrian->waktu_antrian)->format('d F Y');
        });

        if (!$tanggal) {
            $latestAntrianSatu = Antrian::where('loket', 1)->whereDate('waktu_antrian', $today)->latest()->first();
            $latestAntrianDua = Antrian::where('loket', 2)->whereDate('waktu_antrian', $today)->latest()->first();
        } else {
            $latestAntrianSatu = Antrian::where('loket', 1)->whereDate('waktu_antrian', $tanggal)->latest()->first();
            $latestAntrianDua = Antrian::where('loket', 2)->whereDate('waktu_antrian', $tanggal)->latest()->first();
        }
        $antriandetail = Antrian::find($id);
        return view('rafly.antrian-pasien-detail', compact('antriandetail', 'groupedAntrians', 'latestAntrianSatu', 'latestAntrianDua', 'today', 'tanggal'));
    }
    public function adminShow($id)
    {
        $antriandetail = Antrian::find($id);
        return view('rafly.antrian-admin-detail', compact('antriandetail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $mulaiAntrian = Carbon::parse('07:00:00', 'Asia/Jakarta'); // Waktu mulai antrian
        $akhirAntrian = Carbon::parse('21:30:00', 'Asia/Jakarta'); // Waktu akhir antrian 
        $now = Carbon::now('Asia/Jakarta');
        $request->validate([
            'loket' => 'required|integer',
            'tanggal' => 'required|date',
        ]);
        $latestAntrianSatu = Antrian::where('loket', 1)->whereDate('waktu_antrian', $request->tanggal)->latest()->first();
        $latestAntrianDua = Antrian::where('loket', 2)->whereDate('waktu_antrian', $request->tanggal)->latest()->first();
        if ($request->loket == 1) {
            $timeAntrian = null;
            $nomorAntrian = null;
            if ($latestAntrianSatu) {
                $nomorAntrian = $latestAntrianSatu->nomor_antrian + 1;
                $waktu_antrian = Carbon::parse($latestAntrianSatu->waktu_antrian, 'Asia/Jakarta');
                $nextTime = $waktu_antrian->addMinutes(10);

                // Periksa apakah waktu antrian terbaru sudah lewat dari waktu sekarang
                $timeAntrian = $nextTime->isPast() ? $now : $nextTime;
            } else {
                // Tidak ada antrian sebelumnya
                if ($request->tanggal == $now->toDateString()) {
                    // Tanggal yang dipilih adalah hari ini
                    $timeAntrian = $now->lt($mulaiAntrian) ? $mulaiAntrian : $now;
                    $nomorAntrian = 1;
                } elseif (Carbon::parse($request->tanggal)->gt($now)) {
                    // Tanggal yang dipilih di masa depan
                    $timeAntrian = $mulaiAntrian;
                    $nomorAntrian = 1;
                }
            }
            if (date('H:i', strtotime($timeAntrian)) > date('H:i', strtotime($akhirAntrian))) {
                return redirect()->back()->with('error', 'Antrian tutup');
            }
            $dateTimeAntrian = Carbon::parse($request->tanggal . ' ' . $timeAntrian->toTimeString(), 'Asia/Jakarta');

            Antrian::create([
                'nomor_antrian' => $nomorAntrian,
                'waktu_antrian' => $dateTimeAntrian,
                'ruang_antrian' => "Ruang A",
                'loket' => $request->loket,
                'user_id' => Auth::user()->id,
            ]);
            $logUser = LogUser::create([
                'tanggal' => now('Asia/Jakarta')->toDateString(),
                'waktu' => now('Asia/Jakarta')->toTimeString(),
                'aktifitas' => "Mengambil Antrian",
                'user_id' => Auth::user()->id,
            ]);
        } else if ($request->loket == 2) {
            $timeAntrian = null;
            $nomorAntrian = null;

            if ($latestAntrianDua) {
                $nomorAntrian = $latestAntrianDua->nomor_antrian + 1;
                $waktu_antrian = Carbon::parse($latestAntrianDua->waktu_antrian, 'Asia/Jakarta');
                $nextTime = $waktu_antrian->addMinutes(10);

                // Periksa apakah waktu antrian terbaru sudah lewat dari waktu sekarang
                $timeAntrian = $nextTime->isPast() ? $now : $nextTime;
            } else {
                // Tidak ada antrian sebelumnya
                if ($request->tanggal == $now->toDateString()) {
                    // Tanggal yang dipilih adalah hari ini
                    $timeAntrian = $now->lt($mulaiAntrian) ? $mulaiAntrian : $now;
                    $nomorAntrian = 1;
                } elseif (Carbon::parse($request->tanggal)->gt($now)) {
                    // Tanggal yang dipilih di masa depan
                    $timeAntrian = $mulaiAntrian;
                    $nomorAntrian = 1;
                }
            }
            if (date('H:i', strtotime($timeAntrian)) > date('H:i', strtotime($akhirAntrian))) {
                return redirect()->back()->with('error', 'Antrian tutup');
            }
            $dateTimeAntrian = Carbon::parse($request->tanggal . ' ' . $timeAntrian->toTimeString(), 'Asia/Jakarta');

            Antrian::create([
                'nomor_antrian' => $nomorAntrian,
                'waktu_antrian' => $dateTimeAntrian,
                'ruang_antrian' => "Ruang A",
                'loket' => $request->loket,
                'user_id' => Auth::user()->id,
            ]);
            $logUser = LogUser::create([
                'tanggal' => now('Asia/Jakarta')->toDateString(),
                'waktu' => now('Asia/Jakarta')->toTimeString(),
                'aktifitas' => "Mengambil Antrian",
                'user_id' => Auth::user()->id,
            ]);
        }
        return redirect()->route('pasien.antrian')->with('success', 'Antrian berhasil diperbarui.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function adminStore(Request $request)
    {
        // Validasi formulir
        $request->validate([
            'nomor' => 'required|numeric',
            'waktu' => 'required|date_format:H:i',
            'tanggal' => 'required|date',
            'ruang' => 'required',
        ]);
        $waktuantrian = $request->tanggal . " " . $request->waktu;
        $antrians = Antrian::all();

        // Iterasi melalui setiap antrian
        foreach ($antrians as $antrian) {
            // Skip entitas dengan id yang sama dengan id entitas saat ini
            if ($antrian->id == $request->id) {
                continue;
            }
            $waktuAntrian = Carbon::parse($antrian->waktu_antrian);
            $tanggalAntrian = $waktuAntrian->toDateString();
            // Memeriksa jika tanggal, waktu, dan ruang antrian sudah ada
            if (($request->loket == $antrian->loket && $request->ruang == $antrian->ruang_antrian && $request->tanggal == $tanggalAntrian && $request->nomor == $antrian->nomor_antrian) || ($request->loket == $antrian->loket && $request->tanggal == $tanggalAntrian && $request->nomor == $antrian->nomor_antrian)) {
                return redirect()->back()->with('error', 'Nomor Antrian di ' . $request->ruang . ' tanggal ' . $request->tanggal . ' Loket ' . $request->loket . ' bentrok.');
            }
            if ($waktuantrian == $antrian->waktu_antrian && $request->ruang == $antrian->ruang_antrian) {
                return redirect()->back()->with('error', 'Jadwal bentrok.');
            }

        }
        // Update informasi antrian
        $antrian = Antrian::find($request->id);
        $antrian->update([
            'nomor_antrian' => $request->nomor,
            'waktu_antrian' => $waktuantrian,
            'ruang_antrian' => $request->ruang,
            'loket' => $request->loket,
        ]);
        return redirect()->back()->with('success', 'Antrian berhasil diperbarui.');
    }
    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Antrian $antrian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAntrianRequest $request, Antrian $antrian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Antrian $antrian)
    {
        //
    }
}