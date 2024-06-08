<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PegawaiController;
use App\Http\Requests\StoreDokterRequest;
use App\Http\Requests\UpdateDokterRequest;
use App\Models\Booking;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLoginForm()
    {
        return view('login-dokter');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credential = $request->only('email', 'password');
        if (Auth::guard('dokter')->attempt($credential)) {
            $user = Auth::guard('dokter')->user();
            return redirect()->intended('/dokter/booking');
        }
        return redirect('login-dokter')->withInput()->withErrors(['login_gagal' => 'These credentials does not match our records']);
    }
    public function logout()
    {
        Auth::guard('dokter')->logout();
        return redirect('/login-dokter');
    }
    public function booking(){
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
        $dokters = Dokter::all();
        return view('azkanoor.pasien.list-dokter', compact('dokters'));
    }
     public function index()
    {
       
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
    public function store(StoreDokterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokter $dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokter $dokter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDokterRequest $request, Dokter $dokter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokter $dokter)
    {
        //
    }
}