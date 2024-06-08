@extends('apoteker/layout/master')
@section('title-page')
    Ubah Password
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
                        class="inline-block p-2 rounded-t-lg text-[#FF0000] dark:text-purple-500 hover:text-[#FF0000] dark:hover:text-purple-500  dark:border-purple-500 "
                        role="tab" aria-controls="sunting" aria-selected="false">Sunting</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('apoteker.ubah-password.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000]/50 hover:text-[#FF0000]/30 dark:text-gray-400 hover:border-[#FF0000]/50 dark:hover:text-gray-300 border-b-2 border-[#FF0000]"
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
            <form method="POST" action="{{ route('apoteker.ubah-password.update') }}">
                @csrf
                <!-- Nama -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi Baru</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 p-2 w-full border rounded-md @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Kata Sandi
                        Baru</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="mt-1 p-2 w-full border rounded-md @error('password_confirmation') border-red-500 @enderror">
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Tombol Submit -->
                <div class="flex justify-start">
                    <button type="submit"
                        class="bg-red-500 hover:bg-danger-600 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
                </div>
            </form>
        </div>
    </section>
@endsection
