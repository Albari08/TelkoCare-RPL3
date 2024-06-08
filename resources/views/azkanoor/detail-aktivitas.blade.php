@extends('layout.admin.master')
@section('title-page')
    Profile Admin
@endsection
@section('menu-profile')
    activemenu
@endsection
@section('content')
    <section>
         <div class="px-10 mb-4 border-b border-[#FFF5F5] dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                <li class="me-2" role="presentation">
                    <a href="/admin/profile" class="inline-block text-[#FF0000]/50 hover:text-[#FF0000] hover:border-[#FF0000] border-b border-[#FF0000]/30 p-2 rounded-t-lg" id="dokter-styled-tab" data-tabs-target="#styled-dokter"
                        type="button" role="tab" aria-controls="dokter" aria-selected="false">Dokter</a>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-2 rounded-t-lg text-[#FF0000] border-[#FF0000]  border-b-2 hover:text-[#FF0000]" id="pasien-styled-tab" data-tabs-target="#styled-pasien"
                        type="button" role="tab" aria-controls="pasien" aria-selected="false">Pasien</button>
                </li>
            </ul>
        </div>
    </section>
    <section class=" py-6">
        <div class="w-[90%] mx-auto lg:w-full">
            <div class="font-bold text-xl text-center mb-5">
                <h2>{{ $pasien->nama }}</h2>
            </div>
            <div class="overflow-x-auto max-w-full">
                <table class="w-full ">
                    <thead class="font-bold">
                        <tr class="border border-[#FF0000]/40">
                            <th class=" py-2">Jam</th>
                            <th class=" py-2">Tanggal</th>
                            <th class=" py-2">Aktifitas</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-bold text-center">
                        @foreach ($logUsers as $logUser)
                            <tr class="border border-[#FF0000]/40">
                            <td class="px-6 py-2">{{ $logUser->waktu }}</td>
                            <td class="px-6 py-2">{{ date('d F Y', strtotime($logUser->tanggal)) }}</td>
                            <td class="px-6 py-2">{{ $logUser->aktifitas }}</td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
