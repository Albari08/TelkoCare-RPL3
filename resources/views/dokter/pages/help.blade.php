@extends('dokter/layout/master')
@section('title-page')
    Help
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
@push('scripts')
    <script>
        // Mengambil elemen input dan semua elemen FAQ berdasarkan ID
        const searchInput = document.getElementById('searchInput');
        const faqItems = document.querySelectorAll('.accordion-item');

        // Menambahkan event listener pada tombol "Search"
        document.getElementById('searchInput').addEventListener('keyup', () => {
            const searchTerm = searchInput.value.trim().toLowerCase();

            // Loop melalui setiap elemen FAQ untuk mencocokkan dengan input pencarian
            faqItems.forEach(item => {
                const faqTitle = item.querySelector('h2').textContent.trim().toLowerCase();
                const faqId = item.id;

                // Memeriksa apakah judul FAQ cocok dengan input pencarian
                if (faqTitle.includes(searchTerm)) {
                    // Tampilkan elemen FAQ jika cocok
                    item.style.display = 'block';
                } else {
                    // Sembunyikan elemen FAQ jika tidak cocok
                    item.style.display = 'none';
                }
            });
        });
    </script>
@endpush
@section('content')
    <section>
        <div class="px-10 mb-4 border-b border-[#FFF5F5] dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" role="tablist">
                <li class="me-2" role="presentation">
                    <a href="{{ route('dokter.profile.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000] dark:text-purple-500 hover:text-[#FF0000] dark:hover:text-purple-500  dark:border-purple-500"
                        role="tab" aria-controls="sunting" aria-selected="false">Sunting</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('dokter.jadwal.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000] dark:text-purple-500 hover:text-[#FF0000] dark:hover:text-purple-500  dark:border-purple-500 "
                        role="tab" aria-controls="sunting" aria-selected="false">Jadwal Dokter</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('dokter.pemeriksaan.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000]/50 hover:text-[#FF0000]/30 dark:text-gray-400 hover:border-[#FF0000]/50 dark:hover:text-gray-300 "
                        role="tab" aria-controls="riwayat">Riwayat Pemeriksaan</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('dokter.help.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000]/50 hover:text-[#FF0000]/30 dark:text-gray-400 hover:border-[#FF0000]/50 dark:hover:text-gray-300 border-b-2 border-[#FF0000]"
                        role="tab" aria-controls="faq" aria-selected="false">Help</a>
                </li>
            </ul>
        </div>
        <div class="px-10">
            <div class="w-1/2 my-4">
                <form class="flex items-center border border-red-500 rounded-lg overflow-hidden">
                    <div class="relative w-full">
                        <input type="text" placeholder="Search..."
                            class="w-full px-3 py-2 pl-10 bg-white text-gray-700 focus:outline-none" id="searchInput" />
                        <svg class="absolute left-3 top-3 w-6 h-6 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m0 0l-6-6m6 6l-6 6m6-6l6 6"></path>
                        </svg>
                    </div>
                </form>
            </div>

            <div class="accordion">
                <!-- FAQ Item 1 -->
                <div class="accordion-item faq1  mb-4 bg-white rounded-lg shadow-md">
                    <div class="accordion-title p-4  flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Apakah dokter di Telkocare memiliki kontrol atas
                            jadwal praktek mereka?</h2>
                        <svg class="w-6 h-6 fill-current text-gray-600 transform accordion-arrow"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 0 1 1.414 0L12 13.586l5.293-5.293a1 1 0 1 1 1.414 1.414l-6 6a1 1 0 0 1-1.414 0l-6-6a1 1 0 0 1 0-1.414z" />
                        </svg>
                    </div>
                    <div class="accordion-content p-4 my-4">
                        <p class="text-gray-600">
                            Ya, dokter di Telkocare memiliki kontrol penuh atas jadwal praktek mereka. Mereka dapat
                            menentukan jam kerja dan ketersediaan mereka sendiri sesuai dengan preferensi dan kenyamanan
                        </p>
                    </div>
                </div>
                <!-- FAQ Item 2 -->
                <div class="accordion-item faq2  mb-4 bg-white rounded-lg shadow-md">
                    <div class="accordion-title p-4  flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Apakah ada batasan dalam jumlah pasien yang dapat
                            saya tangani setiap hari?</h2>
                        <svg class="w-6 h-6 fill-current text-gray-600 transform accordion-arrow"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 0 1 1.414 0L12 13.586l5.293-5.293a1 1 0 1 1 1.414 1.414l-6 6a1 1 0 0 1-1.414 0l-6-6a1 1 0 0 1 0-1.414z" />
                        </svg>
                    </div>
                    <div class="accordion-content p-4 my-4">
                        <p class="text-gray-600">
                            Tidak ada batasan dalam jumlah pasien yang dapat Anda tangani setiap hari di Telkocare. Anda
                            dapat menangani sebanyak mungkin konsultasi yang Anda rasa nyaman dan dapat diproses dengan
                            baik.
                        </p>
                    </div>
                </div>
                <!-- FAQ Item 3 -->
                <div class="accordion-item faq3  mb-4 bg-white rounded-lg shadow-md">
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
                            Telkocare adalah platform website yang dirancang untuk memudahkan pasien dalam mengakses layanan
                            kesehatan, khususnya dalam hal konsultasi medis dan informasi kesehatan lainnya.
                        </p>
                    </div>
                </div>
                <!-- FAQ Item 4 -->
                <div class="accordion-item faq4  mb-4 bg-white rounded-lg shadow-md">
                    <div class="accordion-title p-4  flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Bagaimana cara mendaftar sebagai dokter di
                            Telkocare?</h2>
                        <svg class="w-6 h-6 fill-current text-gray-600 transform accordion-arrow"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 0 1 1.414 0L12 13.586l5.293-5.293a1 1 0 1 1 1.414 1.414l-6 6a1 1 0 0 1-1.414 0l-6-6a1 1 0 0 1 0-1.414z" />
                        </svg>
                    </div>
                    <div class="accordion-content p-4 my-4">
                        <p class="text-gray-600">
                            Anda dapat mendaftar sebagai dokter di Telkocare dengan mengunjungi situs web resmi kami dan
                            mengisi formulir pendaftaran dokter. Tim kami akan menghubungi Anda untuk proses verifikasi
                            lebih lanjut
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
