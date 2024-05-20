@extends('dokter/layout/master')
@section('title-page')
    Sunting Dokter
@endsection
@section('menu-profile')
    activemenu
@endsection
@section('content')
    <section>
        <div class="px-10 mb-4 border-b border-[#FFF5F5] dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" role="tablist">
                <li class="me-2" role="presentation">
                    <a href="{{ route('dokter.profile.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000] dark:text-purple-500 hover:text-[#FF0000] dark:hover:text-purple-500  dark:border-purple-500 border-b-2 border-[#FF0000]"
                        role="tab" aria-controls="sunting" aria-selected="false">Sunting</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('dokter.jadwal.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000] dark:text-purple-500 hover:text-[#FF0000] dark:hover:text-purple-500  dark:border-purple-500 "
                        role="tab" aria-controls="sunting" aria-selected="false">Jadwal</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('dokter.pemeriksaan.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000]/50 hover:text-[#FF0000]/30 dark:text-gray-400 hover:border-[#FF0000]/50 dark:hover:text-gray-300"
                        role="tab" aria-controls="faq" aria-selected="false">Riwayat Pemeriksaan</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('dokter.help.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000]/50 hover:text-[#FF0000]/30 dark:text-gray-400 hover:border-[#FF0000]/50 dark:hover:text-gray-300 "
                        role="tab" aria-controls="riwayat">Help</a>
                </li>
            </ul>
        </div>
        <div class="mx-10">
            <form method="POST" action="{{ route('dokter.profile.update') }}">
                @csrf
                <!-- Nama -->
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="nama" name="nama"
                        value="{{ auth()->guard('dokter')->user()->nama ?? old('nama') }}"
                        class="mt-1 p-2 w-full border rounded-md @error('nama') border-red-500 @enderror">
                    @error('nama')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        value="{{ auth()->guard('dokter')->user()->email ?? old('email') }}"
                        class="mt-1 p-2 w-full border rounded-md @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- tempat_praktik -->
                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea id="alamat" name="alamat"
                        class="mt-1 p-2 w-full border rounded-md @error('alamat') border-red-500 @enderror">{{ auth()->guard('dokter')->user()->alamat ?? old('alamat') }}</textarea>
                    @error('alamat')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nomor Kartu -->
                <div class="mb-4">
                    <label for="nohp" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                    <input type="text" id="nohp" name="nohp"
                        value="{{ auth()->guard('dokter')->user()->nohp ?? old('nohp') }}"
                        class="mt-1 p-2 w-full border rounded-md @error('nohp') border-red-500 @enderror">
                    @error('nohp')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Nomor Kartu -->
                <div class="mb-4">
                    <label for="keahlian" class="block text-sm font-medium text-gray-700">Keahlian</label>
                    <input type="text" id="keahlian" name="keahlian"
                        value="{{ auth()->guard('dokter')->user()->keahlian ?? old('keahlian') }}"
                        class="mt-1 p-2 w-full border rounded-md @error('keahlian') border-red-500 @enderror">
                    @error('keahlian')
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
