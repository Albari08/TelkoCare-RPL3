@extends('layout.pasien.master')
@section('addCss')
    <style>
        input[type="radio"]:checked+label {
            border: 2px solid #ff0000;
            /* Ganti dengan warna border yang Anda inginkan */
        }
    </style>
@endsection
@section('title-page')
    Antrian
@endsection
@section('menu-antrian')
    activemenu
@endsection
@section('addJs')
    <script>
        function highlightLabel(label) {
            // Menghapus border dari semua label
            var allLabels = document.querySelectorAll('label');
            allLabels.forEach(function(l) {
                l.style.border = 'none';
            });

            // Menambahkan border ke label yang diklik
            label.style.border = '2px solid blue';
        }
    </script>
@endsection
@section('content')
    @php
        use Carbon\Carbon;

    @endphp
    <section>
        <div class="px-2 lg:px-10 mb-4 border-b border-[#FFF5F5] dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab"
                data-tabs-toggle="#default-styled-tab-content"
                data-tabs-active-classes="text-[#FF0000] border-b-2 hover:text-[#FF0000] dark:text-purple-500 dark:hover:text-purple-500 border-[#FF0000] dark:border-purple-500"
                data-tabs-inactive-classes="dark:border-transparent text-[#FF0000]/50 dark:text-gray-400 border-[#FF0000]/50 hover:border-[#FF0000]/50 dark:border-gray-700 dark:hover:text-gray-300"
                role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-2 rounded-t-lg" id="antrian-styled-tab" data-tabs-target="#styled-antrian"
                        type="button" role="tab" aria-controls="antrian" aria-selected="false">Ambil Antrian</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-2 rounded-t-lg" id="aktif-styled-tab" data-tabs-target="#styled-aktif"
                        type="button" role="tab" aria-controls="aktif" aria-selected="false">Antrian Aktif</button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="cursor-default inline-block p-2 rounded-t-lg text-[#FF0000]/50 border-[#FF0000]/50 hover:border-[#FF0000]/50"
                        id="detail-styled-tab">Detail</button>
                </li>
            </ul>
        </div>
        <div id="default-styled-tab-content">
            <div class="hidden w-[90%] mx-auto" id="styled-antrian" role="tabpanel" aria-labelledby="antrian-tab">
                <div class="flex gap-5 mb-10">
                    <div class="flex-col" style="width: 70%;">
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
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
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
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('pasien.antrian.create') }}" method="POST">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @csrf
                            @method('POST')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 lg:gap-20 mb-10">
                                <label onclick="highlightLabel(this)" for="loket1"
                                    class="flex items-center bg-[#D8D8D8] rounded-xl cursor-pointer">
                                    <input class="hidden" type="radio" name="loket" id="loket1" value="1">
                                    <div class=" p-3 bg-[#B34545] flex items-center rounded-xl h-full">
                                        <p class="text-white text-center lg:text-[52px] font-bold min-w-[100px]">
                                            @if ($latestAntrianSatu)
                                                @if (!$latestAntrianSatu->nomor_antrian)
                                                    1
                                                @else
                                                    {{ $latestAntrianSatu->nomor_antrian + 1 }}
                                                @endif
                                            @else
                                                1
                                            @endif
                                        </p>
                                    </div>
                                    <div
                                        class="p-3 text-[#B34545] mx-auto font-bold flex items-center lg:text-[32px] h-full">
                                        <p class="text-center">Loket 01</p>
                                    </div>
                                </label>
                                <label onclick="highlightLabel(this)" for="loket2"
                                    class="cursor-pointer flex items-center bg-[#D8D8D8] rounded-xl">
                                    <input class="hidden" type="radio" name="loket" id="loket2" value="2">
                                    <div class=" p-3 bg-[#4C27FF] flex items-center rounded-xl h-full">
                                        <p class="text-white text-center lg:text-[52px] font-bold min-w-[100px]">
                                            @if (!$latestAntrianDua)
                                                1
                                            @else
                                                {{ $latestAntrianDua->nomor_antrian + 1 }}
                                            @endif
                                        </p>
                                    </div>
                                    <div
                                        class="p-3 text-[#4C27FF] mx-auto font-bold flex items-center lg:text-[32px] h-full">
                                        <p class="text-center">Loket 02</p>
                                    </div>
                                </label>
                            </div>
                            <div>
                                @php
                                    $tanggalSekarang = Carbon::now('Asia/Jakarta')->toDateString();
                                @endphp
                                <input class="hidden" type="date" name="tanggal" id="tanggal"
                                    value="{{ $tanggal ?? $tanggalSekarang }}">
                                <button type="submit"
                                    class="bg-[#FF5050] hover:bg-[#FF5050]/80 duration-700 px-5 py-3 text-white font-bold text-base rounded-md">Ambil
                                    Antrian</button>
                            </div>
                        </form>
                    </div>
                    <div class="flex-col" style="width: 30%;">
                        <div class="flex justify-end">
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                class="block text-white fill-[#FF0000] hover:fill-[#FF0000]/50" type="button">
                                <svg class="w-8" viewBox="0 0 60 61" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M42.1655 6.85594e-06C43.5807 -0.00302474 44.6997 0.999674 44.703 2.3366L44.7063 4.61546C53.8884 5.27178 59.9539 10.978 59.9638 19.7289L60 45.3432C60.0131 54.8841 53.4408 60.7544 42.906 60.7696L17.173 60.8C6.704 60.8121 0.0494107 54.802 0.0362463 45.2339L2.20913e-05 19.9203C-0.0131201 11.1117 5.83844 5.42066 15.0206 4.65193L15.0173 2.37307C15.014 1.03614 16.1001 0.0303985 17.5482 0.0303985C18.9962 0.0273601 20.0823 1.03006 20.0856 2.36699L20.0889 4.49393L39.638 4.46962L39.6347 2.34268C39.6314 1.00575 40.7174 0.00305222 42.1655 6.85594e-06ZM43.5083 43.1434H43.4754C41.9615 43.1768 40.7471 44.3345 40.78 45.7322C40.7833 47.1299 42.0043 48.2815 43.5182 48.3118C45.0617 48.3088 46.3123 47.1511 46.309 45.7231C46.309 44.295 45.0551 43.1434 43.5083 43.1434ZM16.3897 43.1464C14.8758 43.2072 13.691 44.3649 13.6943 45.7626C13.7634 47.1603 15.014 48.2541 16.5279 48.1903C18.0122 48.1295 19.1937 46.9719 19.1246 45.5742C19.0917 44.2069 17.8707 43.1434 16.3897 43.1464ZM29.949 43.1312C28.4351 43.195 27.2536 44.3497 27.2536 45.7474C27.3227 47.1451 28.5733 48.2359 30.0872 48.1751C31.5682 48.1113 32.753 46.9567 32.6839 45.5559C32.651 44.1917 31.43 43.1282 29.949 43.1312ZM16.3732 32.2079C14.8593 32.2687 13.6778 33.4263 13.6811 34.824C13.7469 36.2217 15.0008 37.3156 16.5147 37.2518C17.9957 37.191 19.1772 36.0333 19.1081 34.6356C19.0752 33.2683 17.8575 32.2049 16.3732 32.2079ZM29.9358 32.1015C28.4219 32.1623 27.2371 33.32 27.2404 34.7177C27.3062 36.1154 28.5602 37.2062 30.0741 37.1454C31.555 37.0816 32.7365 35.927 32.6707 34.5293C32.6345 33.162 31.4168 32.0985 29.9358 32.1015ZM43.4951 32.1167C41.9812 32.1471 40.7964 33.2714 40.7997 34.6691V34.7025C40.8326 36.1002 42.0832 37.1606 43.6004 37.1302C45.0814 37.0968 46.2629 35.9392 46.23 34.5415C46.1609 33.2045 44.9728 32.1137 43.4951 32.1167ZM39.6446 9.14888L20.0955 9.17318L20.0987 11.6313C20.0987 12.9409 19.016 13.974 17.5679 13.974C16.1198 13.977 15.0305 12.947 15.0305 11.6374L15.0272 9.29776C8.60954 9.88419 5.05845 13.3237 5.06831 19.9142L5.07162 20.8592L54.8988 20.7984V19.7349C54.7572 13.2022 51.1634 9.7748 44.7128 9.26434L44.7161 11.604C44.7161 12.9105 43.6004 13.9466 42.1853 13.9466C40.7372 13.9497 39.6478 12.9166 39.6478 11.61L39.6446 9.14888Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div id="default-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Input Tanggal
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
                            <form action="{{ route('pasien.antrian') }}" method="GET">
                                <div class="p-4 md:p-5 space-y-4">
                                    <div>
                                        <label for="tanggal"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                                        <input type="date" id="tanggal" name="tanggal"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Input Tanggal" required
                                            value="{{ $tanggal ?? $tanggalSekarang }}" />
                                    </div>
                                </div>
                                <div
                                    class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                    <button data-modal-hide="default-modal" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden" id="styled-aktif" role="tabpanel" aria-labelledby="aktif-tab">
                <div class="w-[90%] mx-auto">
                    @foreach ($groupedAntrians as $tanggal => $antrians)
                        <div class="mb-5" x-data="{ open: true }">
                            <div class="mb-3 flex justify-between items-center">
                                <p class="text-base font-bold">
                                    {{ \Carbon\Carbon::parse($tanggal)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}
                                </p>
                                <button @click="open = ! open">
                                    <svg :class="open ? 'rotate-180' : ''"
                                        class="fill-[#0F0833] hover:fill-[#0F0833]/50 duration-500 w-4" viewBox="0 0 16 9"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.0615 6.43901L10.4755 1.85401C9.80885 1.21718 8.92241 0.861816 8.00048 0.861816C7.07856 0.861816 6.19211 1.21718 5.52548 1.85401L0.939481 6.43901C0.658086 6.72041 0.5 7.10206 0.5 7.50001C0.5 7.89796 0.658086 8.27962 0.939481 8.56101C1.22088 8.84241 1.60253 9.00049 2.00048 9.00049C2.39843 9.00049 2.78009 8.84241 3.06148 8.56101L7.64748 3.97501C7.74124 3.88128 7.8684 3.82862 8.00098 3.82862C8.13356 3.82862 8.26072 3.88128 8.35448 3.97501L12.9395 8.56101C13.2209 8.84241 13.6025 9.00049 14.0005 9.00049C14.3984 9.00049 14.7801 8.84241 15.0615 8.56101C15.3429 8.27962 15.501 7.89796 15.501 7.50001C15.501 7.10206 15.3429 6.72041 15.0615 6.43901Z" />
                                    </svg>
                                </button>
                            </div>
                            @foreach ($antrians as $antrian)
                                <div x-show="open"
                                    class="lg:flex flex-row justify-between gap-4 p-6 mb-5 bg-white border rounded-lg">
                                    <div class="flex-col lg:w-[80%]">
                                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 flex-col">
                                            <div>
                                                <p class="text-[12px] text-[#717375]">
                                                    {{ \Carbon\Carbon::parse($antrian->waktu_antrian)->isoFormat('HH:mm') }}
                                                </p>
                                                <p class="font-semibold">{{ $antrian->user->nama }}</p>
                                            </div>
                                            <div>
                                                <p class="text-[12px] text-[#717375]">Loket</p>
                                                <p>{{ $antrian->loket }}</p>
                                            </div>
                                            <div>
                                                <p class="text-[12px] text-[#717375]">Ruang</p>
                                                <p>{{ $antrian->ruang_antrian }}</p>
                                            </div>
                                            <div>
                                                <p class="text-[12px] text-[#717375]">Nomor Antrian</p>
                                                <p>{{ $antrian->nomor_antrian }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-col lg:w-[20%]">
                                        <div class="flex lg:justify-end">
                                            <a href="{{ route('pasien.antrian.detail', ['id' => $antrian->id]) }}"
                                                class="flex lg:w-full px-3 lg:px-0 text-[12px] text-[#FF0000] border-2 border-[#FF0000] justify-center items-center gap-3 py-3 rounded-lg font-bold bg-white"><i>
                                                    <svg class="w-4 fill-[#FF0000]" viewBox="0 0 12 15" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6.83563 0.833374C7.00725 0.833374 7.13927 0.973374 7.13927 1.14004V3.28671C7.13927 4.50671 8.13596 5.50671 9.34389 5.51337C9.84554 5.51337 10.2416 5.52004 10.5452 5.52004L10.6577 5.51955C10.8606 5.518 11.1338 5.51337 11.3703 5.51337C11.5353 5.51337 11.6673 5.64671 11.6673 5.81337V11.1734C11.6673 12.8267 10.3406 14.1667 8.70362 14.1667H3.4495C1.73332 14.1667 0.333984 12.76 0.333984 11.0267V3.84004C0.333984 2.18671 1.66732 0.833374 3.31088 0.833374H6.83563ZM7.54191 9.43338H3.95115C3.68052 9.43338 3.4561 9.65338 3.4561 9.92671C3.4561 10.2 3.68052 10.4267 3.95115 10.4267H7.54191C7.81253 10.4267 8.03695 10.2 8.03695 9.92671C8.03695 9.65338 7.81253 9.43338 7.54191 9.43338ZM6.18217 6.10004H3.95115C3.68052 6.10004 3.4561 6.32671 3.4561 6.60004C3.4561 6.87337 3.68052 7.09338 3.95115 7.09338H6.18217C6.4528 7.09338 6.67722 6.87337 6.67722 6.60004C6.67722 6.32671 6.4528 6.10004 6.18217 6.10004ZM8.10111 1.43737C8.10111 1.15004 8.44633 1.00737 8.64369 1.21471C9.35722 1.96404 10.6041 3.27404 11.3011 4.00604C11.4939 4.20804 11.3526 4.54337 11.0747 4.54404C10.5321 4.54604 9.89253 4.54404 9.43247 4.53937C8.70243 4.53937 8.10111 3.93204 8.10111 3.19471V1.43737Z" />
                                                    </svg>
                                                </i> Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
@endsection
