@extends('layout.pasien.master')
@section('title-page')
    Booking
@endsection
@section('addJs')
@endsection
@section('menu-booking')
    activemenu
@endsection
@section('content')
    <hr class=" border-[#FFF5F5] border-b-2 mb-10">
    <div class="mx-auto ">
        <img src="{{ asset('asset/img/success.png') }}" class="text-center mx-auto mb-7" alt="waiting">
        <p class="text-center lg:text-[1.7rem]">terima kasih sudah booking</p>
        <p class="text-center lg:text-[2rem]">Jadwal Booking dengan {{ $booking->jadwalDokter->dokter->nama }} pada tanggal {{ \Carbon\Carbon::parse($booking->jadwalDokter->tanggal)->translatedFormat('d F Y') }} pukul {{ \Carbon\Carbon::parse($booking->jadwalDokter->waktu)->translatedFormat('H:i') }}
        </p>
        <div class="mx-auto text-center my-4">
            <a href="{{ route('pasien.reminder.booking') }}" class="text-center px-5 py-2 rounded-md bg-[#FFC1C180] lg:text-[1.7rem] hover:bg-[#FFC1C1] duration-300">Jadwal Saya</a>
        </div>
    </div>
@endsection
