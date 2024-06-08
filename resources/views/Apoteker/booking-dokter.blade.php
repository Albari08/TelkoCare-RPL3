@extends('admin.layout.master')
@section('title-page')
    Booking
@endsection
@section('menu-booking')
    activemenu
@endsection
@section('content')
    <div class="inline-block">
        <div class="flex gap-9 items-center justify-between px-10 mb-5">
            <img src="{{ asset('asset/img/dokter.png') }}" alt="dokter">
            <div class="text-center">
                <h2 class="font-bold text-xl">Dr. Azka</h2>
                <p class="text-sm text-[#FF0000]">Dokter Umu</p>
            </div>
        </div>
    </div>
    <hr class=" border-[#FFF5F5] mb-10">
    <section>
        <div class="w-[90%] mx-auto">
            <h2 class="font-medium text-center text-2xl mb-6">Jadwal Tersedia</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-28 mb-28">
                <div class="font-medium text-lg">
                    <p>Sep 10</p>
                    <div class="grid grid-cols-3 justify-between gap-8 font-medium">
                        <div class=" px-3 py-2 bg-[#FFC1C166]/40 font-bold rounded-md text-center">
                            <p>11:00</p>
                        </div>
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>11:30</p>
                        </div>
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>12:00</p>
                        </div>
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>14:00</p>
                        </div>
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>15:00</p>
                        </div>
                    </div>
                </div>
                <div class="font-medium text-lg">
                    <p>Sep 11</p>
                    <div class="grid grid-cols-3 justify-between gap-8 font-medium">
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>11:00</p>
                        </div>
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>11:30</p>
                        </div>
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>12:00</p>
                        </div>
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>14:00</p>
                        </div>
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>15:00</p>
                        </div>
                    </div>
                </div>
                <div class="font-medium text-lg">
                    <p>Sep 12</p>
                    <div class="grid grid-cols-3 justify-between gap-8 font-medium">
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>11:00</p>
                        </div>
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>11:30</p>
                        </div>
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>12:00</p>
                        </div>
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>14:00</p>
                        </div>
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>15:00</p>
                        </div>
                    </div>
                </div>
                <div class="font-medium text-lg">
                    <p>Sep 13</p>
                    <div class="grid grid-cols-3 justify-between gap-8 font-medium">
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>11:00</p>
                        </div>
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>11:30</p>
                        </div>
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>12:00</p>
                        </div>
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>14:00</p>
                        </div>
                        <div class=" px-3 py-2 bg-[#E5E5E5] rounded-md text-center">
                            <p>15:00</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex gap-8 items-center mb-5">
                <div>
                    <p class="text-[#FF0000] font-semibold">Kalender</p>
                </div>
                <div><a href="/admin/booking-selesai" class="px-3 py-2 bg-[#FF0000] text-white hover:bg-[#FF0000]/60 duration-700 rounded transition ease-in-out">Submit</a>
                </div>
            </div>
        </div>
    </section>
@endsection
