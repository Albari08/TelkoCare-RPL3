@extends('layout.admin.master')
@section('title-page')
    Antrian
@endsection
@section('menu-antrian')
    activemenu
@endsection
@section('content')
    <section>
        <div class="px-10 mb-4 border-b border-[#FFF5F5] dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab">
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-2 rounded-t-lg text-[#FF0000] border-b-2 hover:text-[#FF0000] border-[#FF0000]"
                        id="antrian-styled-tab" data-tabs-target="#styled-antrian" type="button" role="tab"
                        aria-controls="antrian" aria-selected="false">Antrian Aktif</button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="cursor-default inline-block p-2 rounded-t-lg text-[#FF0000]/50 border-b border-[#FFF5F5]">Detail</button>
                </li>
            </ul>
        </div>
        <div class=" w-[90%] mx-auto">
            @if ($groupedAntrians->isEmpty())
                Tidak Ada Antrian
            @endif
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
                                    <a href="{{ route('admin.antrian.detail', ["id" => $antrian->id]) }}">
                                        <svg class="w-8 fill-[#FF2020] hover:fill-[#FF2020]/50 duration-300"
                                            viewBox="0 0 34 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14.8957 0.222656L12.7777 4.75631C12.3541 4.87061 11.9728 5.0611 11.5916 5.25159L6.55077 3.34669L3.50086 6.08974L5.61885 10.6234C5.40705 11.0044 5.23761 11.3092 5.06817 11.6901L0.0273438 13.595V17.4048L5.06817 19.3097C5.23761 19.6907 5.40705 19.9955 5.61885 20.3765L3.50086 24.9101L6.55077 27.6532L11.5916 25.7483C11.9728 25.9007 12.3541 26.0912 12.7777 26.2436L14.8957 30.7772H19.1317L21.2497 26.2436C21.6309 26.0912 22.0545 25.9388 22.4357 25.7483L27.4766 27.6532L30.5265 24.9101L28.4085 20.3765C28.5779 20.0336 28.7897 19.6526 28.9592 19.3097L34 17.4048V13.595L28.9592 11.6901C28.8321 11.3473 28.6203 10.9663 28.4085 10.6234L30.5265 6.08974L27.4766 3.34669L22.4357 5.25159C22.0545 5.0992 21.6309 4.90871 21.2497 4.75631L19.1317 0.222656L14.8957 0.222656ZM17.0137 9.74715C20.5295 9.74715 23.3677 12.2997 23.3677 15.4618C23.3677 18.624 20.5295 21.1765 17.0137 21.1765C13.4978 21.1765 10.6597 18.624 10.6597 15.4618C10.6597 12.2997 13.4978 9.74715 17.0137 9.74715Z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            @endforeach
        </div>
    </section>
@endsection
