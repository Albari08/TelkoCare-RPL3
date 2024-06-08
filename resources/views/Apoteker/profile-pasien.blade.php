@extends('admin/layout/master')
@section('title-page')
    Profile Admin
@endsection
{{-- Activekan Menu --}}
@section('menu-profile')
    activemenu
@endsection
@section('content')
    <section>
        <div class="px-10 mb-4 border-b border-[#FFF5F5] dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                <li class="me-2" role="presentation">
                    <a href="/admin/profile"
                        class="inline-block text-[#FF0000]/50 hover:text-[#FF0000] hover:border-[#FF0000] border-b border-[#FF0000]/30 p-2 rounded-t-lg"
                        id="dokter-styled-tab" data-tabs-target="#styled-dokter" type="button" role="tab"
                        aria-controls="dokter" aria-selected="false">Dokter</a>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-2 rounded-t-lg text-[#FF0000] border-[#FF0000]  border-b-2 hover:text-[#FF0000]"
                        id="pasien-styled-tab" data-tabs-target="#styled-pasien" type="button" role="tab"
                        aria-controls="pasien" aria-selected="false">Pasien</button>
                </li>
            </ul>
        </div>
    </section>
    <section class=" py-6">
        <div class="w-[90%] mx-auto lg:flex justify-between">
            <div class="lg:flex-col lg:w-[20%] mb-6 lg:mb-0">
                <img src="{{ asset('asset/img/admin.png') }}" class="w-full" alt="pasien">
            </div>
            <div class="lg:flex-col lg:w-[70%] text-sm font-medium">
                <div class="flex justify-between mb-5">
                    <div class="w-[20%]">
                        <p>Nama</p>
                    </div>
                    <div class="w-[75%]">
                        <p>:Raflt Dwiputra</p>
                    </div>
                </div>
                <div class="flex justify-between mb-5">
                    <div class="w-[20%]">
                        <p>NIM/NIK</p>
                    </div>
                    <div class="w-[75%]">
                        <p>:210401111</p>
                    </div>
                </div>
                <div class="flex justify-between mb-5">
                    <div class="w-[20%]">
                        <p>Jenis kelamin</p>
                    </div>
                    <div class="w-[75%]">
                        <p>:Laki Laki</p>
                    </div>
                </div>
                <div class="flex justify-between mb-5">
                    <div class="w-[20%]">
                        <p>TTL</p>
                    </div>
                    <div class="w-[75%]">
                        <p>:Bandung, 15 Februari 2001</p>
                    </div>
                </div>
                <div class="flex justify-between mb-5">
                    <div class="w-[20%]">
                        <p>No Hp</p>
                    </div>
                    <div class="flex w-[75%] gap-5 justify-between">
                        <div>
                            <p>:08567854678</p>
                        </div>
                        <div>
                            <button
                                class="p-1 bg-[#FF0000] text-white rounded-md hover:bg-[#FF0000]/50 transition ease-out duration-700"><svg
                                    class="w-4 fill-white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18.9229 5.44135L14.5586 1.0771C14.4497 0.967846 14.3204 0.881162 14.1779 0.822015C14.0355 0.762868 13.8828 0.732422 13.7285 0.732422C13.5743 0.732422 13.4216 0.762868 13.2791 0.822015C13.1367 0.881162 13.0073 0.967846 12.8984 1.0771L0.858398 13.1201C0.638924 13.3398 0.515639 13.6376 0.515625 13.9482V18.3125C0.515625 18.6233 0.63909 18.9213 0.858859 19.1411C1.07863 19.3609 1.3767 19.4843 1.6875 19.4843H6.05176C6.20559 19.4847 6.35797 19.4546 6.5001 19.3958C6.64224 19.3369 6.77131 19.2505 6.87988 19.1416L15.5391 10.4824L16.0986 12.7285L12.3496 16.4785C12.3118 16.5143 12.2815 16.5574 12.2606 16.6052C12.2397 16.653 12.2285 16.7044 12.2278 16.7565C12.2271 16.8087 12.2368 16.8604 12.2564 16.9087C12.276 16.9571 12.3051 17.001 12.342 17.0379C12.3788 17.0748 12.4226 17.1039 12.4709 17.1236C12.5192 17.1433 12.5709 17.1531 12.6231 17.1525C12.6752 17.1519 12.7267 17.1408 12.7745 17.12C12.8223 17.0992 12.8654 17.069 12.9014 17.0312L16.8076 13.1249C16.8555 13.0773 16.8902 13.0181 16.9083 12.9531C16.9264 12.888 16.9274 12.8194 16.9111 12.7539L16.1826 9.8437L18.9229 7.10346C19.0324 6.99456 19.1193 6.86507 19.1786 6.72244C19.238 6.57982 19.2685 6.42688 19.2685 6.27241C19.2685 6.11794 19.238 5.965 19.1786 5.82237C19.1193 5.67975 19.0324 5.55026 18.9229 5.44135ZM1.29688 18.3125V14.5683L5.43262 18.7031H1.6875C1.5839 18.7031 1.48454 18.6619 1.41129 18.5887C1.33803 18.5154 1.29688 18.416 1.29688 18.3125ZM6.375 18.541L1.45898 13.6249L10.2812 4.80268L15.1982 9.7187L6.375 18.541ZM18.3701 6.54585L15.75 9.16596L10.834 4.24995L13.4541 1.62983C13.4904 1.59351 13.5335 1.5647 13.5809 1.54504C13.6283 1.52538 13.6791 1.51527 13.7305 1.51527C13.7818 1.51527 13.8326 1.52538 13.8801 1.54504C13.9275 1.5647 13.9706 1.59351 14.0068 1.62983L18.3701 5.99409C18.4432 6.06732 18.4842 6.16653 18.4842 6.26997C18.4842 6.3734 18.4432 6.47262 18.3701 6.54585Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mb-5">
                    <div class=" w-[20%]">
                        <p>Alamat</p>
                    </div>
                    <div class="flex w-[75%] gap-5 justify-between">
                        <div>
                            <p>:Bandung</p>
                        </div>
                        <div>
                            <button
                                class="p-1 bg-[#FF0000] text-white rounded-md hover:bg-[#FF0000]/50 transition ease-out duration-700"><svg
                                    class="w-4 fill-white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18.9229 5.44135L14.5586 1.0771C14.4497 0.967846 14.3204 0.881162 14.1779 0.822015C14.0355 0.762868 13.8828 0.732422 13.7285 0.732422C13.5743 0.732422 13.4216 0.762868 13.2791 0.822015C13.1367 0.881162 13.0073 0.967846 12.8984 1.0771L0.858398 13.1201C0.638924 13.3398 0.515639 13.6376 0.515625 13.9482V18.3125C0.515625 18.6233 0.63909 18.9213 0.858859 19.1411C1.07863 19.3609 1.3767 19.4843 1.6875 19.4843H6.05176C6.20559 19.4847 6.35797 19.4546 6.5001 19.3958C6.64224 19.3369 6.77131 19.2505 6.87988 19.1416L15.5391 10.4824L16.0986 12.7285L12.3496 16.4785C12.3118 16.5143 12.2815 16.5574 12.2606 16.6052C12.2397 16.653 12.2285 16.7044 12.2278 16.7565C12.2271 16.8087 12.2368 16.8604 12.2564 16.9087C12.276 16.9571 12.3051 17.001 12.342 17.0379C12.3788 17.0748 12.4226 17.1039 12.4709 17.1236C12.5192 17.1433 12.5709 17.1531 12.6231 17.1525C12.6752 17.1519 12.7267 17.1408 12.7745 17.12C12.8223 17.0992 12.8654 17.069 12.9014 17.0312L16.8076 13.1249C16.8555 13.0773 16.8902 13.0181 16.9083 12.9531C16.9264 12.888 16.9274 12.8194 16.9111 12.7539L16.1826 9.8437L18.9229 7.10346C19.0324 6.99456 19.1193 6.86507 19.1786 6.72244C19.238 6.57982 19.2685 6.42688 19.2685 6.27241C19.2685 6.11794 19.238 5.965 19.1786 5.82237C19.1193 5.67975 19.0324 5.55026 18.9229 5.44135ZM1.29688 18.3125V14.5683L5.43262 18.7031H1.6875C1.5839 18.7031 1.48454 18.6619 1.41129 18.5887C1.33803 18.5154 1.29688 18.416 1.29688 18.3125ZM6.375 18.541L1.45898 13.6249L10.2812 4.80268L15.1982 9.7187L6.375 18.541ZM18.3701 6.54585L15.75 9.16596L10.834 4.24995L13.4541 1.62983C13.4904 1.59351 13.5335 1.5647 13.5809 1.54504C13.6283 1.52538 13.6791 1.51527 13.7305 1.51527C13.7818 1.51527 13.8326 1.52538 13.8801 1.54504C13.9275 1.5647 13.9706 1.59351 14.0068 1.62983L18.3701 5.99409C18.4432 6.06732 18.4842 6.16653 18.4842 6.26997C18.4842 6.3734 18.4432 6.47262 18.3701 6.54585Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-6">
        <div class="w-[90%] mx-auto ">
            <div class="mb-5">
                <p class="font-bold">Jumat, 03 Maret 2024</p>
            </div>
            <div class="mb-5 bg-white p-4 border border-gray-200 rounded-md overflow-x-auto max-w-full">
                <table class="w-full text-left ">
                    <thead class="text-[12px] text-[#717375] font-medium">
                        <tr>
                            <th class="px-6 py-2">Dokter</th>
                            <th class="px-6 py-2">Diagnosa</th>
                            <th class="px-6 py-2">Tindakan</th>
                            <th class="px-6 py-2">Obat</th>
                            <th class="px-6 py-2"></th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-medium">
                        <tr>
                            <td class="px-6 py-2 font-bold">Dr. Azka</td>
                            <td class="px-6 py-2">Demam</td>
                            <td class="px-6 py-2">Mengobati Demam</td>
                            <td class="px-6 py-2">Paracetamol</td>
                            <td class="px-6 py-2"><a href="/admin/detail-aktivitas"
                                    class="p-2 inline-block rounded-lg border-[#ff0000] text-[#ff0000] bg-white border hover:bg-[#ff0000] hover:text-white duration-700">Lihat
                                    Detail</a></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 font-bold">Dr. Azka</td>
                            <td class="px-6 py-2">Demam</td>
                            <td class="px-6 py-2">Mengobati Demam</td>
                            <td class="px-6 py-2">Paracetamol</td>
                            <td class="px-6 py-2"><a href="/admin/detail-aktivitas"
                                    class="p-2 inline-block rounded-lg border-[#ff0000] text-[#ff0000] bg-white border hover:bg-[#ff0000] hover:text-white duration-700">Lihat
                                    Detail</a></td>

                        </tr>
                        <tr>
                            <td class="px-6 py-2 font-bold">Dr. Azka</td>
                            <td class="px-6 py-2">Demam</td>
                            <td class="px-6 py-2">Mengobati Demam</td>
                            <td class="px-6 py-2">Paracetamol</td>
                            <td class="px-6 py-2"><a href="/admin/detail-aktivitas"
                                    class="p-2 inline-block rounded-lg border-[#ff0000] text-[#ff0000] bg-white border hover:bg-[#ff0000] hover:text-white duration-700">Lihat
                                    Detail</a></td>

                        </tr>
                        <tr>
                            <td class="px-6 py-2 font-bold">Dr. Azka</td>
                            <td class="px-6 py-2">Demam</td>
                            <td class="px-6 py-2">Mengobati Demam</td>
                            <td class="px-6 py-2">Paracetamol</td>
                            <td class="px-6 py-2"><a href="/admin/detail-aktivitas"
                                    class="p-2 inline-block rounded-lg border-[#ff0000] text-[#ff0000] bg-white border hover:bg-[#ff0000] hover:text-white duration-700">Lihat
                                    Detail</a></td>

                        </tr>
                        <tr>
                            <td class="px-6 py-2 font-bold">Dr. Azka</td>
                            <td class="px-6 py-2">Demam</td>
                            <td class="px-6 py-2">Mengobati Demam</td>
                            <td class="px-6 py-2">Paracetamol</td>
                            <td class="px-6 py-2"><a href="/admin/detail-aktivitas"
                                    class="p-2 inline-block rounded-lg border-[#ff0000] text-[#ff0000] bg-white border hover:bg-[#ff0000] hover:text-white duration-700">Lihat
                                    Detail</a></td>

                        </tr>
                        <tr>
                            <td class="px-6 py-2 font-bold">Dr. Azka</td>
                            <td class="px-6 py-2">Demam</td>
                            <td class="px-6 py-2">Mengobati Demam</td>
                            <td class="px-6 py-2">Paracetamol</td>
                            <td class="px-6 py-2"><a href="/admin/detail-aktivitas"
                                    class="p-2 inline-block rounded-lg border-[#ff0000] text-[#ff0000] bg-white border hover:bg-[#ff0000] hover:text-white duration-700">Lihat
                                    Detail</a></td>

                        </tr>
                        <tr>
                            <td class="px-6 py-2 font-bold">Dr. Azka</td>
                            <td class="px-6 py-2">Demam</td>
                            <td class="px-6 py-2">Mengobati Demam</td>
                            <td class="px-6 py-2">Paracetamol</td>
                            <td class="px-6 py-2"><a href="/admin/detail-aktivitas"
                                    class="p-2 inline-block rounded-lg border-[#ff0000] text-[#ff0000] bg-white border hover:bg-[#ff0000] hover:text-white duration-700">Lihat
                                    Detail</a></td>
                        </tr>
                </table>
            </div>
            <button class="px-3 py-2 bg-[#FF0000] text-white text-sm rounded-md">Simpan</button>
        </div>
    </section>
@endsection
