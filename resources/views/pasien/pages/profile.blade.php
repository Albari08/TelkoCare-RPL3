@extends('pasien/layout/master')
@section('title-page')
    Profile Pengguna
@endsection
@section('menu-profile')
    activemenu
@endsection
@push('styles')
    <style>
        .accordion-item {
            border-bottom: 1px solid #e2e8f0;
        }

        .accordion-title {
            cursor: pointer;
        }

        .accordion-content {
            display: none;
            padding: 0 1rem;
        }

        .accordion-content.show {
            display: block;
        }
    </style>
@endpush
@push('scripts')
    <script>
        // JavaScript for accordion functionality
        const accordionItems = document.querySelectorAll('.accordion-item');

        accordionItems.forEach(item => {
            const title = item.querySelector('.accordion-title');
            const content = item.querySelector('.accordion-content');

            title.addEventListener('click', () => {
                // Toggle show class on content
                content.classList.toggle('show');

                // Toggle icon rotation
                const icon = title.querySelector('svg');
                icon.classList.toggle('rotate-180');
            });
        });
    </script>
@endpush
@section('content')
    <section>
        <div class="px-10 mb-4 border-b border-[#FFF5F5] dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" role="tablist">
                <li class="me-2" role="presentation">
                    <a href="{{ route('pasien.profile.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000] dark:text-purple-500 hover:text-[#FF0000] dark:hover:text-purple-500  dark:border-purple-500 border-b-2 border-[#FF0000]"
                        role="tab" aria-controls="sunting" aria-selected="false">Sunting</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('pasien.pemeriksaan.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000]/50 hover:text-[#FF0000]/30 dark:text-gray-400 hover:border-[#FF0000]/50 dark:hover:text-gray-300 "
                        role="tab" aria-controls="riwayat">Riwayat</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('pasien.faq.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000]/50 hover:text-[#FF0000]/30 dark:text-gray-400 hover:border-[#FF0000]/50 dark:hover:text-gray-300"
                        role="tab" aria-controls="faq" aria-selected="false">FAQ</a>
                </li>
            </ul>
        </div>
        <div class="mx-10">
            <form method="POST" action="{{ route('pasien.profile.update') }}">
                @csrf
                <!-- Nama -->
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="nama" name="nama" value="{{ auth()->user()->nama ?? old('nama') }}"
                        class="mt-1 p-2 w-full border rounded-md @error('nama') border-red-500 @enderror">
                    @error('nama')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ auth()->user()->email ?? old('email') }}"
                        class="mt-1 p-2 w-full border rounded-md @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alamat -->
                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea id="alamat" name="alamat"
                        class="mt-1 p-2 w-full border rounded-md @error('alamat') border-red-500 @enderror">{{ auth()->user()->alamat ?? old('alamat') }}</textarea>
                    @error('alamat')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nomor Kartu -->
                <div class="mb-4">
                    <label for="nim" class="block text-sm font-medium text-gray-700">Nomor
                        Kartu</label>
                    <input type="text" id="nim" name="nim" value="{{ auth()->user()->nim ?? old('nim') }}"
                        class="mt-1 p-2 w-full border rounded-md @error('nim') border-red-500 @enderror">
                    @error('nim')
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
