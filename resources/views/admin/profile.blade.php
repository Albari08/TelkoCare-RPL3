@extends('admin/layout/master')
@section('title-page')
    Profile Admin
@endsection
@section('menu-profile')
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
                    <button class="inline-block p-2 rounded-t-lg" id="dokter-styled-tab" data-tabs-target="#styled-dokter"
                        type="button" role="tab" aria-controls="dokter" aria-selected="false">Dokter</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-2 rounded-t-lg" id="pasien-styled-tab" data-tabs-target="#styled-pasien"
                        type="button" role="tab" aria-controls="pasien" aria-selected="false">Pasien</button>
                </li>
            </ul>
        </div>
        <div id="default-styled-tab-content">
            <div class="hidden" id="styled-dokter" role="tabpanel" aria-labelledby="dokter-tab">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-5 md:gap-x-24 md:gap-y-14 ">
                    <div class="flex gap-3 items-center justify-between px-10 py-5 border-b border-[#FF0000] bg-white">
                        <img src="{{ asset('asset/img/dokter.png') }}" alt="dokter">
                        <div class="text-center">
                            <h2 class="font-bold text-xl">Dr. Rafly</h2>
                            <p class="text-sm text-[#FF0000]">Spesialis Kandungan</p>
                        </div>
                        <div>
                            <svg width="8" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="rotate-180">
                                <path class="fill-[#FF0000] "
                                    d="M7.72404 15.6093L0.114709 7.99996L7.72404 0.390625L9.60938 2.27596L3.88537 7.99996L9.60938 13.724L7.72404 15.6093Z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex gap-3 items-center justify-between px-10 py-5 border-b border-[#FF0000] bg-white">
                        <img src="{{ asset('asset/img/dokter.png') }}" alt="dokter">
                        <div class="text-center">
                            <h2 class="font-bold text-xl">Dr. Akbar</h2>
                            <p class="text-sm text-[#FF0000]">Spesialis Bedah</p>
                        </div>
                        <div>
                            <svg width="8" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="rotate-180">
                                <path class="fill-[#FF0000] "
                                    d="M7.72404 15.6093L0.114709 7.99996L7.72404 0.390625L9.60938 2.27596L3.88537 7.99996L9.60938 13.724L7.72404 15.6093Z" />
                            </svg>
                        </div>
                    </div>
                    <div class=" flex gap-3 items-center justify-between px-10 py-5 border-b border-[#FF0000] bg-white">
                        <img src="{{ asset('asset/img/dokter.png') }}" alt="dokter">
                        <div class="text-center">
                            <h2 class="font-bold text-xl">Dr. Aisyah</h2>
                            <p class="text-sm text-[#FF0000]">Spesialis Jantung</p>
                        </div>
                        <div>
                            <svg width="8" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="rotate-180">
                                <path class="fill-[#FF0000] "
                                    d="M7.72404 15.6093L0.114709 7.99996L7.72404 0.390625L9.60938 2.27596L3.88537 7.99996L9.60938 13.724L7.72404 15.6093Z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex gap-3 items-center justify-between px-10 py-5 border-b border-[#FF0000] bg-white">
                        <img src="{{ asset('asset/img/dokter.png') }}" alt="dokter">
                        <div class="text-center">
                            <h2 class="font-bold text-xl">Dr. Azka</h2>
                            <p class="text-sm text-[#FF0000]">Dokter Umu</p>
                        </div>
                        <div>
                            <svg width="8" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="rotate-180">
                                <path class="fill-[#FF0000] "
                                    d="M7.72404 15.6093L0.114709 7.99996L7.72404 0.390625L9.60938 2.27596L3.88537 7.99996L9.60938 13.724L7.72404 15.6093Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden" id="styled-pasien" role="tabpanel" aria-labelledby="pasien-tab">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-x-24 md:gap-y-14">
                    <a href="/admin/profile-pasien">
                        <div class="flex gap-3 items-center justify-between px-10 py-5 border-b border-[#FF0000] h-full bg-white">
                            <img src="{{ asset('asset/img/dokter.png') }}" alt="dokter">
                            <div class="text-center">
                                <h2 class="font-bold text-xl">Rafly Dwiputra</h2>
                                <p class="text-sm">Jumat, 10 Oktober 2024</p>
                            </div>
                            <div>
                                <svg width="8" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="rotate-180">
                                    <path class="fill-[#FF0000] "
                                        d="M7.72404 15.6093L0.114709 7.99996L7.72404 0.390625L9.60938 2.27596L3.88537 7.99996L9.60938 13.724L7.72404 15.6093Z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="/admin/profile-pasien">
                        <div class="flex gap-3 items-center justify-between px-10 py-5 border-b border-[#FF0000] h-full bg-white">
                            <img src="{{ asset('asset/img/dokter.png') }}" alt="dokter">
                            <div class="text-center">
                                <h2 class="font-bold text-xl">Azka Noor Hafizh</h2>
                                <p class="text-sm">Jumat, 10 Oktober 2024</p>
                            </div>
                            <div>
                                <svg width="8" viewBox="0 0 10 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="rotate-180">
                                    <path class="fill-[#FF0000] "
                                        d="M7.72404 15.6093L0.114709 7.99996L7.72404 0.390625L9.60938 2.27596L3.88537 7.99996L9.60938 13.724L7.72404 15.6093Z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="/admin/profile-pasien">
                        <div class="flex gap-3 items-center justify-between px-10 py-5 border-b border-[#FF0000] h-full bg-white">
                            <img src="{{ asset('asset/img/dokter.png') }}" alt="dokter">
                            <div class="text-center">
                                <h2 class="font-bold text-xl">Akbar Dwi Putra</h2>
                                <p class="text-sm">Jumat, 10 Oktober 2024</p>
                            </div>
                            <div>
                                <svg width="8" viewBox="0 0 10 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="rotate-180">
                                    <path class="fill-[#FF0000] "
                                        d="M7.72404 15.6093L0.114709 7.99996L7.72404 0.390625L9.60938 2.27596L3.88537 7.99996L9.60938 13.724L7.72404 15.6093Z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="/admin/profile-pasien">
                        <div class="flex gap-3 items-center justify-between px-10 py-5 border-b border-[#FF0000] h-full bg-white">
                            <img src="{{ asset('asset/img/dokter.png') }}" alt="dokter">
                            <div class="text-center">
                                <h2 class="font-bold text-xl">Reihan</h2>
                                <p class="text-sm">Jumat, 10 Oktober 2024</p>
                            </div>
                            <div>
                                <svg width="8" viewBox="0 0 10 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="rotate-180">
                                    <path class="fill-[#FF0000] "
                                        d="M7.72404 15.6093L0.114709 7.99996L7.72404 0.390625L9.60938 2.27596L3.88537 7.99996L9.60938 13.724L7.72404 15.6093Z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="/admin/profile-pasien">
                        <div class="flex gap-3 items-center justify-between px-10 py-5 border-b border-[#FF0000] h-full bg-white">
                            <img src="{{ asset('asset/img/dokter.png') }}" alt="dokter">
                            <div class="text-center">
                                <h2 class="font-bold text-xl">Akbar Dwi Putra</h2>
                                <p class="text-sm">Jumat, 10 Oktober 2024</p>
                            </div>
                            <div>
                                <svg width="8" viewBox="0 0 10 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="rotate-180">
                                    <path class="fill-[#FF0000] "
                                        d="M7.72404 15.6093L0.114709 7.99996L7.72404 0.390625L9.60938 2.27596L3.88537 7.99996L9.60938 13.724L7.72404 15.6093Z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
