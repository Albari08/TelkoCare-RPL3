@extends('layout.pasien.master')
@section('title-page')
    Booking
@endsection
@section('menu-booking')
    activemenu
@endsection
@section('content')
    <hr class=" border-[#FFF5F5] mb-10">
    <div>
        @if (session('error'))
            <div id="alert-2"
                class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <div class="ms-3 text-sm font-medium">
                    {{ session('error') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        @if (session('success'))
            <div id="alert-3"
                class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-5 md:gap-x-24 md:gap-y-14 ">
            @foreach ($dokters as $dokter)
                <a href="{{ route('pasien.jadwal.dokter', ['id' => $dokter->id]) }}">
                    <div class="flex gap-3 items-center justify-between px-10 py-5 border-b border-[#FF0000] bg-white">
                        <img src="{{ asset('asset/img/dokter.png') }}" alt="dokter">
                        <div class="text-center">
                            <h2 class="font-bold text-xl">{{ $dokter->nama }}</h2>
                            <p class="text-sm text-[#FF0000]">{{ $dokter->keahlian }}</p>
                        </div>
                        <div>
                            <svg width="8" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="rotate-180">
                                <path class="fill-[#FF0000] "
                                    d="M7.72404 15.6093L0.114709 7.99996L7.72404 0.390625L9.60938 2.27596L3.88537 7.99996L9.60938 13.724L7.72404 15.6093Z" />
                            </svg>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
@endsection
