@extends('dokter/layout/master')
@section('title-page')
    Tambah Jadwal Dokter
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
                        class="inline-block p-2 rounded-t-lg text-[#FF0000] dark:text-purple-500 hover:text-[#FF0000] dark:hover:text-purple-500  dark:border-purple-500 "
                        role="tab" aria-controls="sunting" aria-selected="false">Sunting</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('dokter.jadwal.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000] dark:text-purple-500 hover:text-[#FF0000] dark:hover:text-purple-500  dark:border-purple-500 border-b-2 border-[#FF0000]"
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
            <form method="POST" action="{{ route('dokter.jadwal.store') }}">
                @csrf
                <!-- Nama -->
                <div class="mb-4">
                    <label for="hari" class="block text-sm font-medium text-gray-700 mb-3">Hari</label>
                    <select
                        class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:ring focus:border-blue-500"
                        id="hari" name="hari">
                        <option value="" disabled selected>Pilih Hari</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                    @error('hari')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="jam_buka" class="block text-sm font-medium text-gray-700">Jam Buka</label>
                    <input type="time" id="jam_buka" name="jam_buka" value="{{ old('jam_buka') }}"
                        class="mt-1 p-2 w-full border rounded-md @error('jam_buka') border-red-500 @enderror">
                    @error('jam_buka')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="jam_tutup" class="block text-sm font-medium text-gray-700">Jam Tutup</label>
                    <input type="time" id="jam_tutup" name="jam_tutup" value="{{ old('jam_tutup') }}"
                        class="mt-1 p-2 w-full border rounded-md @error('jam_tutup') border-red-500 @enderror">
                    @error('jam_tutup')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-start">
                    <button type="submit"
                        class="bg-red-500 hover:bg-danger-600 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
                </div>
            </form>
    </section>
@endsection
