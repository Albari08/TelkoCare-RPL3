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
        <img src="{{ asset('asset/img/waiting.png') }}" class="text-center mx-auto mb-7" alt="waiting">
        <p class="text-center lg:text-[2rem]">Menunggu Konfirmasi Dari Dokter</p>
    </div>
    
@endsection
