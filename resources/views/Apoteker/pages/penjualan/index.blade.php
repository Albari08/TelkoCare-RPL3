@extends('apoteker/layout/master')
@section('title-page')
    Riwayat Penjualan
@endsection
@section('menu-profile')
    activemenu
@endsection
@section('content')
    <section>
        <div class="px-10 mb-4 border-b border-[#FFF5F5] dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" role="tablist">
                <li class="me-2" role="presentation">
                    <a href="{{ route('apoteker.profile.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000] dark:text-purple-500 hover:text-[#FF0000] dark:hover:text-purple-500  dark:border-purple-500 "
                        role="tab" aria-controls="sunting" aria-selected="false">Sunting</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('apoteker.ubah-password.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000]/50 hover:text-[#FF0000]/30 dark:text-gray-400 hover:border-[#FF0000]/50 dark:hover:text-gray-300"
                        role="tab" aria-controls="faq" aria-selected="false">Ubah Kata Sandi</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('apoteker.penjualan.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000]/50 hover:text-[#FF0000]/30 dark:text-gray-400 hover:border-[#FF0000]/50 dark:hover:text-gray-300 border-b-2 border-[#FF0000]"
                        role="tab" aria-controls="riwayat">Riwayat Penjualan</a>
                </li>
            </ul>
        </div>
        <div class="mx-10">
            @foreach ($items as $item)
                <div
                    class="grid grid-cols-1 md:grid-cols-4 py-4 px-4 gap-4 bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <div class="md:col-span-1">
                        <div class="text-sm">Obat</div>
                        <div>
                            @foreach ($item->details as $detail)
                                <span class="font-bold">{{ $detail->obat->nama }},</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="md:col-span-1">
                        <div class="text-sm">Tangal Penjualan</div>
                        <div class="font-bold">{{ $item->created_at->translatedFormat('d F Y') }}</div>
                    </div>
                    <div class="md:col-span-1">
                        <div class="text-sm">Jam Penjualan</div>
                        <div class="font-bold">{{ $item->created_at->translatedFormat('H.i') }}</div>
                    </div>
                    <div class="md:col-span-1">
                        <div class="text-sm">Jenis Penjualan</div>
                        <div class="font-bold">{{ $item->jenis_pembayaran }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
