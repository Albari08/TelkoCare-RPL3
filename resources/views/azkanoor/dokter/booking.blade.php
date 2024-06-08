@extends('layout.dokter.master')
@section('title-page')
    Booking
@endsection
@section('addJs')
@endsection
@section('menu-booking')
    activemenu
    <!-- active menu sidebar -->
@endsection
@section('content')
    <hr class=" border-[#FFF5F5] border-b-2 mb-10">
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
    @error('booking_status')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
    @csrf
    @foreach ($bookings as $booking)
        <div class="mx-auto lg:mx-0  md:w-[500px] p-3">
            <div class="flex gap-3 items-center justify-between px-3 py-5 border-b border-[#FF0000] h-full bg-white">
                <img src="{{ asset('asset/img/dokter.png') }}" alt="dokter">
                <div class="text-center">
                    <h2 class="font-bold text-xl">{{ $booking->user->nama }}</h2>
                    <p class="text-sm">
                         {{ \Carbon\Carbon::parse($booking->jadwalDokter->tanggal)->translatedFormat('d F Y') }} {{ \Carbon\Carbon::parse($booking->jadwalDokter->waktu)->translatedFormat('H:i') }}
                    </p>
                </div>
                <form action="{{ route('dokter.booking.update', ['id' => $booking->id]) }}" method="post">
                    @csrf
                    @method('post')
                    <input class="hidden" type="text" name="booking_status" id="booking{{ $booking->id }}"
                        value="Diterima">
                    <button
                        class="cursor-pointer w-12 h-12 mx-auto flex items-center justify-center bg-[#FFC1C1]/50 rounded-full hover:shadow-md">
                        <svg width="24" viewBox="0 0 35 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.8876 20.5876L0.512542 11.4352C-0.170847 10.8854 -0.170847 9.99385 0.512542 9.44394L2.98736 7.45265C3.67075 6.90274 4.77885 6.90274 5.46224 7.45265L13.125 13.618L29.5378 0.412391C30.2211 -0.137464 31.3293 -0.137464 32.0126 0.412391L34.4875 2.40368C35.1709 2.95354 35.1709 3.84507 34.4875 4.39498L14.3624 20.5876C13.679 21.1375 12.5709 21.1375 11.8876 20.5876V20.5876Z"
                                fill="black" />
                        </svg>

                    </button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
