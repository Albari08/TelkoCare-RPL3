@extends('layout.pasien.master')
@section('title-page')
    Booking
@endsection
@section('addJs')
@endsection
@section('menu-booking')
    activemenu
@endsection
@section('content')
    <section>
        <div class="px-10 mb-4 border-b border-[#FFF5F5] dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab"
                data-tabs-toggle="#default-styled-tab-content"
                data-tabs-active-classes="text-[#FF0000] border-b-2 hover:text-[#FF0000] dark:text-purple-500 dark:hover:text-purple-500 border-[#FF0000] dark:border-purple-500"
                data-tabs-inactive-classes="dark:border-transparent text-[#FF0000]/50 hover:[#FF0000]/30 dark:text-gray-400 border-[#FF0000]/50 hover:border-[#FF0000]/50 dark:border-gray-700 dark:hover:text-gray-300"
                role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-2 rounded-t-lg" id="aktif-styled-tab" data-tabs-target="#styled-aktif"
                        type="button" role="tab" aria-controls="aktif" aria-selected="false">Booking Aktif</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-2 rounded-t-lg" id="riwayat-styled-tab" data-tabs-target="#styled-riwayat"
                        type="button" role="tab" aria-controls="riwayat" aria-selected="false">Riwayat Booking</button>
                </li>
            </ul>
        </div>
        <div id="default-styled-tab-content" class="px-10">
            <div class="hidden" id="styled-aktif" role="tabpanel" aria-labelledby="aktif-tab">
                @if ($booking)
                    <div class="max-w-[500px] mx-auto bg-[#FF000085] p-5 rounded-md">
                        @php
                            $tanggalBooking = \Carbon\Carbon::parse($booking->jadwalDokter->tanggal);
                            $hariLagi = $tanggalBooking->diffInDays(\Carbon\Carbon::now()->setTimezone('Asia/Jakarta'));
                        @endphp
                        <p class="mb-5">{{ intval($hariLagi) }} Hari Lagi</p>
                        <p class="mb-5">Konsultasi dengan {{ $booking->jadwalDokter->dokter->nama }}</p>
                        <div>
                            <div class="flex items-center gap-3 mb-3">
                                <p><svg class="w-6" viewBox="0 0 27 33" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.713707 12.6229H26.2764C26.6743 12.6229 26.9999 12.9652 26.9999 13.3836V29.8663C26.9999 31.5463 25.7037 32.9093 24.106 32.9093H2.88412C1.28646 32.9093 -0.00976562 31.5463 -0.00976562 29.8663V13.3836C-0.00976562 12.9652 0.315797 12.6229 0.713707 12.6229ZM26.9999 9.83351V7.55129C26.9999 5.87132 25.7037 4.50833 24.106 4.50833H21.2121V1.21179C21.2121 0.793383 20.8865 0.45105 20.4886 0.45105H18.0771C17.6791 0.45105 17.3536 0.793383 17.3536 1.21179V4.50833H9.63654V1.21179C9.63654 0.793383 9.31097 0.45105 8.91306 0.45105H6.50149C6.10358 0.45105 5.77802 0.793383 5.77802 1.21179V4.50833H2.88412C1.28646 4.50833 -0.00976562 5.87132 -0.00976562 7.55129V9.83351C-0.00976562 10.2519 0.315797 10.5942 0.713707 10.5942H26.2764C26.6743 10.5942 26.9999 10.2519 26.9999 9.83351Z"
                                            fill="black" />
                                    </svg>
                                </p>
                                <p>{{ \Carbon\Carbon::parse($booking->jadwalDokter->tanggal)->translatedFormat('d F Y') }}
                                </p>
                            </div>
                            <div class="flex items-center gap-3 mb-3">
                                <p>
                                    <svg class="w-6" viewBox="0 0 31 33" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.4733 0.665894C7.21361 0.665894 0.521484 7.70274 0.521484 16.3878C0.521484 25.073 7.21361 32.1098 15.4733 32.1098C23.7329 32.1098 30.425 25.073 30.425 16.3878C30.425 7.70274 23.7329 0.665894 15.4733 0.665894ZM18.9158 22.8605L13.5983 18.7969C13.4114 18.6511 13.3028 18.4228 13.3028 18.1819V7.51255C13.3028 7.09415 13.6284 6.75181 14.0263 6.75181H16.9202C17.3181 6.75181 17.6437 7.09415 17.6437 7.51255V16.242L21.472 19.1709C21.7976 19.4181 21.8639 19.8936 21.6288 20.2359L19.9286 22.6957C19.6935 23.0316 19.2413 23.1077 18.9158 22.8605Z"
                                            fill="black" />
                                    </svg>
                                </p>
                                <p>{{ \Carbon\Carbon::parse($booking->jadwalDokter->waktu)->translatedFormat('H:i') }} WIB
                                </p>
                            </div>
                            <div class="flex items-center gap-3 mb-3">
                                <p>
                                    <svg width="31" height="30" viewBox="0 0 31 30" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M29.1435 6.29032H22.2839V2.68385C22.2839 1.68644 21.5176 0.880615 20.569 0.880615H10.2796C9.33107 0.880615 8.56473 1.68644 8.56473 2.68385V6.29032H1.70513C0.756579 6.29032 -0.00976562 7.09614 -0.00976562 8.09356V28.8308C-0.00976562 29.3267 0.376086 29.7324 0.847683 29.7324H30.001C30.4726 29.7324 30.8584 29.3267 30.8584 28.8308V8.09356C30.8584 7.09614 30.0921 6.29032 29.1435 6.29032ZM8.56473 25.4497C8.56473 25.8216 8.27534 26.1259 7.92164 26.1259H5.77802C5.42432 26.1259 5.13493 25.8216 5.13493 25.4497V23.1957C5.13493 22.8237 5.42432 22.5194 5.77802 22.5194H7.92164C8.27534 22.5194 8.56473 22.8237 8.56473 23.1957V25.4497ZM8.56473 18.2368C8.56473 18.6087 8.27534 18.913 7.92164 18.913H5.77802C5.42432 18.913 5.13493 18.6087 5.13493 18.2368V15.9827C5.13493 15.6108 5.42432 15.3065 5.77802 15.3065H7.92164C8.27534 15.3065 8.56473 15.6108 8.56473 15.9827V18.2368ZM17.1392 25.4497C17.1392 25.8216 16.8498 26.1259 16.4961 26.1259H14.3525C13.9988 26.1259 13.7094 25.8216 13.7094 25.4497V23.1957C13.7094 22.8237 13.9988 22.5194 14.3525 22.5194H16.4961C16.8498 22.5194 17.1392 22.8237 17.1392 23.1957V25.4497ZM17.1392 18.2368C17.1392 18.6087 16.8498 18.913 16.4961 18.913H14.3525C13.9988 18.913 13.7094 18.6087 13.7094 18.2368V15.9827C13.7094 15.6108 13.9988 15.3065 14.3525 15.3065H16.4961C16.8498 15.3065 17.1392 15.6108 17.1392 15.9827V18.2368ZM17.9967 8.65707C17.9967 8.84303 17.852 8.99517 17.6751 8.99517H16.2818V10.4603C16.2818 10.6463 16.1371 10.7984 15.9602 10.7984H14.8884C14.7116 10.7984 14.5669 10.6463 14.5669 10.4603V8.99517H13.1735C12.9967 8.99517 12.852 8.84303 12.852 8.65707V7.53005C12.852 7.34409 12.9967 7.19194 13.1735 7.19194H14.5669V5.72681C14.5669 5.54085 14.7116 5.3887 14.8884 5.3887H15.9602C16.1371 5.3887 16.2818 5.54085 16.2818 5.72681V7.19194H17.6751C17.852 7.19194 17.9967 7.34409 17.9967 7.53005V8.65707ZM25.7137 25.4497C25.7137 25.8216 25.4243 26.1259 25.0706 26.1259H22.927C22.5733 26.1259 22.2839 25.8216 22.2839 25.4497V23.1957C22.2839 22.8237 22.5733 22.5194 22.927 22.5194H25.0706C25.4243 22.5194 25.7137 22.8237 25.7137 23.1957V25.4497ZM25.7137 18.2368C25.7137 18.6087 25.4243 18.913 25.0706 18.913H22.927C22.5733 18.913 22.2839 18.6087 22.2839 18.2368V15.9827C22.2839 15.6108 22.5733 15.3065 22.927 15.3065H25.0706C25.4243 15.3065 25.7137 15.6108 25.7137 15.9827V18.2368Z"
                                            fill="black" />
                                    </svg>

                                </p>
                                <p>Telkom Medika</p>
                            </div>
                            <div class="flex items-center gap-3 mb-3">
                                <p>
                                    <svg width="32" height="33" viewBox="0 0 32 33" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M30.7432 23.1362L23.9908 20.0932C23.7023 19.9639 23.3817 19.9367 23.0773 20.0156C22.7728 20.0945 22.501 20.2752 22.3027 20.5306L19.3123 24.3724C14.6192 22.0457 10.8424 18.0742 8.62965 13.1394L12.2832 9.99502C12.5266 9.78689 12.6988 9.50103 12.7739 9.18075C12.8489 8.86046 12.8227 8.52318 12.6992 8.21997L9.8053 1.11973C9.66971 0.792867 9.42992 0.525997 9.12725 0.365135C8.82459 0.204272 8.47803 0.159499 8.14734 0.238536L1.87724 1.76002C1.55841 1.83743 1.27395 2.0262 1.07029 2.2955C0.866626 2.56481 0.755786 2.89875 0.755859 3.24282C0.755859 19.5036 13.29 32.6581 28.7301 32.6581C29.0575 32.6583 29.3752 32.5418 29.6314 32.3277C29.8877 32.1135 30.0673 31.8143 30.1409 31.479L31.5879 24.8859C31.6625 24.5365 31.6191 24.1706 31.4649 23.8512C31.3107 23.5319 31.0555 23.279 30.7432 23.1362Z"
                                            fill="black" />
                                    </svg>
                                </p>
                                <p>0802435522</p>
                            </div>
                        </div>
                        <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                            class="px-4 py-2 bg-[#FF828270] rounded-md border-2 border-white hover:bg-[#FF8282] duration-300">Ubah
                            Jadwal</button>
                    </div>
                    <!-- Main modal -->
                    <div id="default-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Ubah Jadwal
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="default-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5 space-y-4">
                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                        Yakin Ingin Ubah Jadwal? Jadwal akan dibatalkan
                                    </p>
                                </div>
                                <!-- Modal footer -->
                                <div
                                    class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <form action="{{ route('pasien.ubah.booking', ['id' => $booking->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('POST')
                                        <button data-modal-hide="default-modal" type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                            accept</button>
                                    </form>
                                    <button data-modal-hide="default-modal" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="hidden" id="styled-riwayat" role="tabpanel" aria-labelledby="riwayat-tab">
                @foreach ($bookings as $booking)
                    <p>{{ $booking->id }}</p>
                    <p>{{ $booking->status }}</p>
                    <p>{{ $booking->jadwalDokter->tanggal . ' ' . $booking->jadwalDokter->waktu }}</p>
                @endforeach
            </div>
        </div>
    </section>
@endsection
