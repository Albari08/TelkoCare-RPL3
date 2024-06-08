@extends('layout.pasien.master')
@section('title-page')
    Jadwal Dokter
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
            <form action="{{ route('pasien.booking.store') }}" method="post">
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
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
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
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif
                @error('jadwal_dokter_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                @csrf
                @method('POST')
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-28 mb-28">
                    @foreach ($groupedJadwalDokters as $tanggal => $jadwalDokters)
                        <div class="font-medium text-lg">
                            <p>{{ \Carbon\Carbon::parse($tanggal)->isoFormat('YYYY MMM DD') }}</p>
                            <div class="grid grid-cols-3 justify-between gap-8 font-medium">
                                @foreach ($jadwalDokters as $jadwalDokter)
                                    <label onclick="highlightLabel(this)"
                                        class="px-3 py-2 bg-[#E5E5E5] cursor-pointer hover:bg-[#FFC1C166]/40 font-bold rounded-md text-center">
                                        <input class="hidden" type="radio" name="jadwal_dokter_id"
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
                            class="px-3 py-2 bg-[#FF0000] text-white hover:bg-[#FF0000]/60 duration-700 rounded transition ease-in-out">Simpan</button>
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
                <form action="{{ route('pasien.jadwal.dokter', ['id' => $dokter->id]) }}" method="GET">
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
@endsection
