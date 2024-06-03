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
                        class="inline-block p-2 rounded-t-lg text-[#FF0000] dark:text-purple-500 hover:text-[#FF0000] dark:hover:text-purple-500  dark:border-purple-500"
                        role="tab" aria-controls="sunting" aria-selected="false">Sunting</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('pasien.pemeriksaan.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000]/50 hover:text-[#FF0000]/30 dark:text-gray-400 hover:border-[#FF0000]/50 dark:hover:text-gray-300 "
                        role="tab" aria-controls="riwayat">Riwayat</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('pasien.faq.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000]/50 hover:text-[#FF0000]/30 dark:text-gray-400 hover:border-[#FF0000]/50 dark:hover:text-gray-300 border-b-2 border-[#FF0000]"
                        role="tab" aria-controls="faq" aria-selected="false">FAQ</a>
                </li>
            </ul>
        </div>
        <div class="px-10">
            <h1 class="text-3xl font-semibold text-gray-800 mb-6">Frequently Asked Questions</h1>

            <div class="accordion">
                <!-- FAQ Item 1 -->
                <div class="accordion-item mb-4 bg-white rounded-lg shadow-md">
                    <div class="accordion-title p-4  flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Apa itu Telkocare?</h2>
                        <svg class="w-6 h-6 fill-current text-gray-600 transform accordion-arrow"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 0 1 1.414 0L12 13.586l5.293-5.293a1 1 0 1 1 1.414 1.414l-6 6a1 1 0 0 1-1.414 0l-6-6a1 1 0 0 1 0-1.414z" />
                        </svg>
                    </div>
                    <div class="accordion-content p-4 my-4">
                        <p class="text-gray-600">
                            Telkocare adalah platform website yang dirancang untuk memudahkan pasien dalam mengakses
                            layanan kesehatan, khususnya dalam hal konsultasi medis dan informasi kesehatan lainnya.
                        </p>
                    </div>
                </div>
                <!-- FAQ Item 2 -->
                <div class="accordion-item mb-4 bg-white rounded-lg shadow-md">
                    <div class="accordion-title p-4  flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Bagaimana cara mendaftar di Telkocare?</h2>
                        <svg class="w-6 h-6 fill-current text-gray-600 transform accordion-arrow"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 0 1 1.414 0L12 13.586l5.293-5.293a1 1 0 1 1 1.414 1.414l-6 6a1 1 0 0 1-1.414 0l-6-6a1 1 0 0 1 0-1.414z" />
                        </svg>
                    </div>
                    <div class="accordion-content p-4 my-4">
                        <p class="text-gray-600">
                            Anda dapat membuka website kemudian sign up pada halaman awal telkocare
                        </p>
                    </div>
                </div>
                <!-- FAQ Item 3 -->
                <div class="accordion-item mb-4 bg-white rounded-lg shadow-md">
                    <div class="accordion-title p-4  flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Bagaimana cara mengambil antrian?</h2>
                        <svg class="w-6 h-6 fill-current text-gray-600 transform accordion-arrow"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 0 1 1.414 0L12 13.586l5.293-5.293a1 1 0 1 1 1.414 1.414l-6 6a1 1 0 0 1-1.414 0l-6-6a1 1 0 0 1 0-1.414z" />
                        </svg>
                    </div>
                    <div class="accordion-content p-4 my-4">
                        <p class="text-gray-600">
                            Untuk mengambil antrian pastikan Anda telah log in, kemudian pada pada sebelah kiri
                            halaman terdapat menu antrian, anda dapat klik menu tersebut kemudian klik ambil antrian
                        </p>
                    </div>
                </div>
                <!-- FAQ Item 4 -->
                <div class="accordion-item mb-4 bg-white rounded-lg shadow-md">
                    <div class="accordion-title p-4  flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Apakah konsultasi medis melalui Telkocare
                            aman?</h2>
                        <svg class="w-6 h-6 fill-current text-gray-600 transform accordion-arrow"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 0 1 1.414 0L12 13.586l5.293-5.293a1 1 0 1 1 1.414 1.414l-6 6a1 1 0 0 1-1.414 0l-6-6a1 1 0 0 1 0-1.414z" />
                        </svg>
                    </div>
                    <div class="accordion-content p-4 my-4">
                        <p class="text-gray-600">
                            Ya, konsultasi medis melalui Telkocare aman. Semua dokter yang tersedia di platform ini
                            telah diverifikasi dan memiliki lisensi yang sah untuk praktik medis.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
