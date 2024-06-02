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
                    <a href="{{ route('admin.antrian') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000]/50 border-[#FFF5F5] hover:text-[#FF0000] hover:border-[#FF0000] border-b-2">Antrian
                        Aktif</a>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-2 rounded-t-lg text-[#FF0000] border-b-2 hover:text-[#FF0000] border-[#FF0000]">Detail</button>
                </li>
            </ul>`
        </div>
        <div class=" w-[80%] mx-auto">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-danger">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('admin-antrian.store', ['id' => $antriandetail->id]) }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mb-5" hidden>
                    <label for="id" class="block mb-2 text-2xl font-bold">ID</label>
                    <input type="text" name="id" id="id"
                        class="text-sm p-2 rounded-xl border-[#FF0000] w-full block" value="{{ $antriandetail->id }}"
                        placeholder="Silahkan Masukkan Id">
                </div>
                <div class="mb-5">
                    <label for="nama" class="block mb-2 text-2xl font-bold">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama"
                        class="text-sm p-2 rounded-xl border-[#FF0000] w-full block"
                        value="{{ $antriandetail->user->nama }}" placeholder="Silahkan Masukkan Nama" disabled>
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-2xl font-bold">Email</label>
                    <input type="email" name="email" id="email"
                        class="text-sm p-2 rounded-xl border-[#FF0000] w-full block"
                        value="{{ $antriandetail->user->email }}" placeholder="Silahkan Masukkan Email" disabled>
                </div>
                <div class="mb-5">
                    <label for="tanggal" class="block mb-2 text-2xl font-bold">Tanggal Antrian</label>
                    <input type="date" name="tanggal" id="tanggal"
                        class="text-sm p-2 rounded-xl border-[#FF0000] w-full block"
                        value="{{ \Carbon\Carbon::parse($antriandetail->waktu_antrian)->isoFormat('YYYY-MM-DD') }}">
                </div>
                <div class="mb-5">
                    <label for="waktu" class="block mb-2 text-2xl font-bold">Waktu Antrian</label>
                    <input type="time" name="waktu" id="waktu"
                        class="text-sm p-2 rounded-xl border-[#FF0000] w-full block"
                        value="{{ \Carbon\Carbon::parse($antriandetail->waktu_antrian)->isoFormat('HH:mm') }}">
                </div>
                <div class="mb-5">
                    <label for="ruang" class="block mb-2 text-2xl font-bold">Ruang Antrian</label>
                    <input type="text" name="ruang" id="ruang"
                        class="text-sm p-2 rounded-xl border-[#FF0000] w-full block"
                        value="{{ $antriandetail->ruang_antrian }}" placeholder="Silahkan Masukkan Ruangan">
                </div>
                <div class="mb-5">
                    <label for="nomor" class="block mb-2 text-2xl font-bold">Nomor Antrian</label>
                    <input type="number" name="nomor" id="nomor"
                        class="text-sm p-2 rounded-xl border-[#FF0000] w-full block"
                        value="{{ $antriandetail->nomor_antrian }}" placeholder="Silahkan Masukkan Nomor">
                </div>
                <div class="mb-5">
                    <label for="loket" class="block mb-2 text-2xl font-bold">Loket</label>
                    <input type="number" name="loket" id="loket"
                        class="text-sm p-2 rounded-xl border-[#FF0000] w-full block"
                        value="{{ $antriandetail->loket }}" placeholder="Silahkan Masukkan Loket">
                </div>
                <div class="mb-5">
                    <button type="submit"
                        class="px-4 py-2 rounded-md bg-[#FF0000] text-white text-sm hover:bg-[#FF0000]/50 duration-500">Simpan</button>
                </div>
            </form>
        </div>
    </section>
@endsection
