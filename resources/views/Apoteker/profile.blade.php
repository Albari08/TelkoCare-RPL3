@extends('layout.admin.master')
@section('title-page', 'Profile Admin')
@section('menu-profile', 'activemenu')
@section('content')
    <section>
        <!-- Konten Profil Apoteker di sini -->
        <div class="px-10 mb-4 border-b border-[#FFF5F5] dark:border-gray-700">
            <h2 class="font-bold text-2xl">Profil Apoteker</h2>
            <div class="mt-4">
                <p>Nama: {{ $apoteker->nama }}</p>
                <p>Email: {{ $apoteker->email }}</p>
                <p>password: {{ $apoteker->password }}</p>
                <!-- Tambahkan informasi profil apoteker lainnya sesuai kebutuhan -->
            </div>
        </div>
    </section>
@endsection
