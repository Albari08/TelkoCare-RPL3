@extends('layout.admin.master')
@section('title-page')
    Profile Admin
@endsection
@section('addJs')
    <script>
        function highlightLabel(label) {
            // Menghapus kelas 'highlight' dari semua label
            var allLabels = document.querySelectorAll('label');
            allLabels.forEach(function(l) {
                l.classList.remove('bg-[#FFC1C166]/40');
            });

            // Menambahkan kelas 'highlight' pada label yang dipilih
            label.classList.add('bg-[#FFC1C166]/40');
        }
    </script>
@endsection
@section('menu-booking')
    activemenu
@endsection
@section('content')
    <div class="inline-block">
        <div class="flex gap-9 items-center justify-between px-10 mb-5">
            <img src="{{ asset('asset/img/dokter.png') }}" alt="dokter">
            <div class="text-center">
                <h2 class="font-bold text-xl">{{ $dokter->nama }}</h2>
                <p class="text-sm text-[#FF0000]">{{ $dokter->keahlian }}</p>
            </div>
        </div>
    </div>
    <hr class=" border-[#FFF5F5] mb-10">
    <section>
        <div class="w-[90%] mx-auto">
            <h2 class="font-medium text-center text-2xl mb-6">Jadwal Tersedia</h2>
            <form action="{{ route('admin.jadwal.dokter', ['id' => $dokter->id]) }}" method="get">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-28 mb-28">
                    @foreach ($groupedJadwalDokters as $tanggal => $jadwalDokters)
                        <div class="font-medium text-lg">
                            <p>{{ \Carbon\Carbon::parse($tanggal)->isoFormat('YYYY MMM DD') }}</p>
                            <div class="grid grid-cols-3 justify-between gap-8 font-medium">
                                @foreach ($jadwalDokters as $jadwalDokter)
                                    <label onclick="highlightLabel(this)"
                                        class="px-3 py-2 bg-[#E5E5E5] cursor-pointer hover:bg-[#FFC1C166]/40 font-bold rounded-md text-center">
                                        <input class="hidden" type="radio" name="idwaktu"
                                            id="idwaktu{{ $jadwalDokter->id }}" value="{{ $jadwalDokter->id }}">
                                        <p>{{ \Carbon\Carbon::parse($jadwalDokter->waktu)->format('H:i') }}</p>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="flex gap-8 items-center mb-5">
                    <div>

                        <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal"
                            class="text-[#FF0000] font-semibold">Kalender</button>
                    </div>
                    <div><button type="submit"
                            class="px-3 py-2 bg-[#FF0000] text-white hover:bg-[#FF0000]/60 duration-700 rounded transition ease-in-out">Ubah Jadwal</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Input Tanggal
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('admin.jadwal.dokter', ['id' => $dokter->id]) }}" method="GET">
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="mb-5">
                            <label for="startDate"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Awal</label>
                            <input type="date" id="startDate" name="startDate"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Input Tanggal" required value="{{ $startDate }}" />
                        </div>
                        <div class="mb-5">
                            <label for="endDate"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Akhir</label>
                            <input type="date" id="endDate" name="endDate"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Input Tanggal" required value="{{ $endDate }}" />
                        </div>
                    </div>
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        <button data-modal-hide="default-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (!is_null($detailJadwal))
        <div x-data="{ open: true }" x-show="open"
            class="absolute z-2 h-screen top-0 w-full bg-slate-600/80 flex items-center justify-center">
            <div class="bg-white w-[70%] mx-auto rounded-md">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Input Tanggal
                    </h3>
                    <button type="button" @click="open = ! open"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('admin.update.jadwal.dokter', ['id' => $detailJadwal->id]) }}" method="post"
                    class="p-4 md:p-5">
                    @csrf
                    @method('post')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-4 ">
                        <label for="tanggal"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ date('Y-m-d', strtotime($detailJadwal->tanggal)) }}" required />
                    </div>
                    <div class="mb-4">
                        <label for="waktu"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu</label>
                        <input type="time" id="waktu" name="waktu"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $detailJadwal->waktu }}" required />
                    </div>
                    <button type="submit"
                        class="px-3 py-2 bg-[#FF0000] text-white hover:bg-[#FF0000]/60 duration-700 rounded transition ease-in-out">Submit</button>
                </form>
            </div>
        </div>
    @endif
@endsection
