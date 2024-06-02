<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
    }
    public function dokterIndex()
    {
        $bookings = Booking::whereHas('jadwalDokter', function ($query) {
            $query->where('dokter_id', Auth::guard('dokter')->user()->id);
        })->where('status', 'progress')->get();
        return view('azkanoor.dokter.booking', compact('bookings'));
    }
    public function reminderBooking()
    {
        $bookings = Booking::where('user_id', Auth::user()->id)->get();
        
        if ($bookings->isNotEmpty()) {
            foreach ($bookings as $booking) {
                $jadwal_dokter_time = Carbon::parse($booking->jadwalDokter->tanggal . ' ' . $booking->jadwalDokter->waktu, 'Asia/Jakarta');
                $now = Carbon::now()->setTimezone('Asia/Jakarta'); 
                if ($jadwal_dokter_time->gt($now) && strtolower($booking->status) == "diterima") {
                    return view('azkanoor.pasien.reminder-booking', compact('booking', 'bookings'));
                }
            }
        }
        $booking = null;
        return view('azkanoor.pasien.reminder-booking', compact('booking', 'bookings'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'jadwal_dokter_id' => 'required|integer',
            ]);
            $jadwal_dokter = JadwalDokter::findOrFail($request->jadwal_dokter_id);
            $jadwal_dokter_time = Carbon::parse($jadwal_dokter->tanggal . ' ' . $jadwal_dokter->waktu, 'Asia/Jakarta');
            $waktu_sekarang = Carbon::now()->setTimezone('Asia/Jakarta');
            if ($jadwal_dokter_time->lt($waktu_sekarang)) {
                return redirect()->back()->with('error', 'Jadwal dokter sudah lewat dari jam sekarang.');
            }
            Booking::create([
                'jadwal_dokter_id' => $request->jadwal_dokter_id,
                'user_id' => Auth::user()->id,
            ]);

            return redirect()->back()->with('success', 'Booking Berhasil Ditambah');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
    }
    public function pasienUbahBooking(Request $request, $id){
        $booking = Booking::find($id);
        $booking->update([
            'status' => "Dibatalkan",
        ]);
        return redirect()->route('pasien.booking')->with('success', 'Berhasil Ubah Jadwal');
    }
    public function dokterUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'booking_status' => 'required',
            ]);
            $booking = Booking::find($id);
            $booking->update([
                'status' => $request->booking_status,
            ]);
            return redirect()->back()->with('success', 'Booking Berhasil Diterima');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}