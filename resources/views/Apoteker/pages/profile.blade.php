@extends('apoteker/layout/master')
@section('title-page')
    Sunting Apoteker
@endsection
@section('menu-profile')
    activemenu
@endsection
@section('content')
    <section>
        <div class="px-10 mb-4 border-b border-[#FFF5F5] dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" role="tablist">
                <li class="me-2" role="presentation">
                    <a href="{{ route('apoteker.profile.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000] dark:text-purple-500 hover:text-[#FF0000] dark:hover:text-purple-500  dark:border-purple-500 border-b-2 border-[#FF0000]"
                        role="tab" aria-controls="sunting" aria-selected="false">Sunting</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('apoteker.ubah-password.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000]/50 hover:text-[#FF0000]/30 dark:text-gray-400 hover:border-[#FF0000]/50 dark:hover:text-gray-300"
                        role="tab" aria-controls="faq" aria-selected="false">Ubah Kata Sandi</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('apoteker.penjualan.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000]/50 hover:text-[#FF0000]/30 dark:text-gray-400 hover:border-[#FF0000]/50 dark:hover:text-gray-300 "
                        role="tab" aria-controls="riwayat">Riwayat Penjualan</a>
                </li>
            </ul>
        </div>
        <div class="mx-10">
            <form method="POST" action="{{ route('apoteker.profile.update') }}">
                @csrf
                <!-- Nama -->
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="nama" name="nama"
                        value="{{ auth()->guard('apoteker')->user()->nama ?? old('nama') }}"
                        class="mt-1 p-2 w-full border rounded-md @error('nama') border-red-500 @enderror">
                    @error('nama')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        value="{{ auth()->guard('apoteker')->user()->email ?? old('email') }}"
                        class="mt-1 p-2 w-full border rounded-md @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- tempat_praktik -->
                <div class="mb-4">
                    <label for="tempat_praktik" class="block text-sm font-medium text-gray-700">Tempat Praktik</label>
                    <textarea id="tempat_praktik" name="tempat_praktik"
                        class="mt-1 p-2 w-full border rounded-md @error('tempat_praktik') border-red-500 @enderror">{{ auth()->guard('apoteker')->user()->tempat_praktik ?? old('tempat_praktik') }}</textarea>
                    @error('tempat_praktik')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nomor Kartu -->
                <div class="mb-4">
                    <label for="jadwal_praktik" class="block text-sm font-medium text-gray-700">Jadwal Praktik</label>
                    <input type="text" id="jadwal_praktik" name="jadwal_praktik"
                        value="{{ auth()->guard('apoteker')->user()->jadwal_praktik ?? old('jadwal_praktik') }}"
                        class="mt-1 p-2 w-full border rounded-md @error('jadwal_praktik') border-red-500 @enderror">
                    @error('jadwal_praktik')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="flex justify-start">
                    <button type="submit"
                        class="bg-red-500 hover:bg-danger-600 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline">Sunting
                        Profile</button>
                </div>
            </form>
        </div>
    </section>
@endsection
