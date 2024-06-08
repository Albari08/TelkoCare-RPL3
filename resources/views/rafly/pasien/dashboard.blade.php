@extends('layout.pasien.master')
@section('title-page')
    Dashboard
@endsection
@section('addJs')
    <script src='https://cdn.plot.ly/plotly-2.32.0.min.js'></script>
    <script>
        //chart//
        var dates = @json($dates);
        var dataLoket1 = @json($dataLoket1);
        var dataLoket2 = @json($dataLoket2);

        var trace1 = {
            x: dates,
            y: dataLoket1,
            name: 'Loket 1',
            type: 'bar',
            marker: {
                color: '#FF0000'
            }
        };

        var trace2 = {
            x: dates,
            y: dataLoket2,
            name: 'Loket 2',
            type: 'bar',
            marker: {
                color: '#DCDCDC'
            }
        };

        var data = [trace1, trace2];

        var layout = {
            barmode: 'stack'
        };

        Plotly.newPlot('myDiv', data, layout);
    </script>
@endsection
@section('menu-dashboard')
    activemenu
@endsection
@section('content')
    <hr>
    {{ Auth::user()->id }}
    <div id='myDiv' class="max-w-[900px] w-[100%] overflow-auto"><!-- Plotly chart will be drawn inside this DIV --></div>
    <div class="w-[90%] mx-auto">
        @foreach ($groupedAntrians as $tanggal => $antrians)
            <div class="mb-5" x-data="{ open: true }">
                <div class="mb-3 flex justify-between items-center">
                    <p class="text-base font-bold">
                        {{ \Carbon\Carbon::parse($tanggal)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}
                    </p>
                    <button @click="open = ! open">
                        <svg :class="open ? 'rotate-180' : ''"
                            class="fill-[#0F0833] hover:fill-[#0F0833]/50 duration-500 w-4" viewBox="0 0 16 9" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.0615 6.43901L10.4755 1.85401C9.80885 1.21718 8.92241 0.861816 8.00048 0.861816C7.07856 0.861816 6.19211 1.21718 5.52548 1.85401L0.939481 6.43901C0.658086 6.72041 0.5 7.10206 0.5 7.50001C0.5 7.89796 0.658086 8.27962 0.939481 8.56101C1.22088 8.84241 1.60253 9.00049 2.00048 9.00049C2.39843 9.00049 2.78009 8.84241 3.06148 8.56101L7.64748 3.97501C7.74124 3.88128 7.8684 3.82862 8.00098 3.82862C8.13356 3.82862 8.26072 3.88128 8.35448 3.97501L12.9395 8.56101C13.2209 8.84241 13.6025 9.00049 14.0005 9.00049C14.3984 9.00049 14.7801 8.84241 15.0615 8.56101C15.3429 8.27962 15.501 7.89796 15.501 7.50001C15.501 7.10206 15.3429 6.72041 15.0615 6.43901Z" />
                        </svg>
                    </button>
                </div>
                @foreach ($antrians as $antrian)
                    <div x-show="open" class="lg:flex flex-row justify-between gap-4 p-6 mb-5 bg-white border rounded-lg">
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
@endsection
