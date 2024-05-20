@extends('dokter/layout/master')
@section('title-page')
    Jadwal Dokter
@endsection
@section('menu-profile')
    activemenu
@endsection
@section('content')
    <section>
        <div class="px-10 mb-4 border-b border-[#FFF5F5] dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" role="tablist">
                <li class="me-2" role="presentation">
                    <a href="{{ route('dokter.profile.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000] dark:text-purple-500 hover:text-[#FF0000] dark:hover:text-purple-500  dark:border-purple-500 "
                        role="tab" aria-controls="sunting" aria-selected="false">Sunting</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('dokter.jadwal.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000] dark:text-purple-500 hover:text-[#FF0000] dark:hover:text-purple-500  dark:border-purple-500 border-b-2 border-[#FF0000]"
                        role="tab" aria-controls="sunting" aria-selected="false">Jadwal Dokter</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('dokter.pemeriksaan.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000]/50 hover:text-[#FF0000]/30 dark:text-gray-400 hover:border-[#FF0000]/50 dark:hover:text-gray-300"
                        role="tab" aria-controls="faq" aria-selected="false">Riwayat Pemeriksaan</a>
                </li>
                <li class="me-2" role="presentation">
                    <a href="{{ route('dokter.help.index') }}"
                        class="inline-block p-2 rounded-t-lg text-[#FF0000]/50 hover:text-[#FF0000]/30 dark:text-gray-400 hover:border-[#FF0000]/50 dark:hover:text-gray-300 "
                        role="tab" aria-controls="riwayat">Help</a>
                </li>
            </ul>
        </div>
        <div class="mx-10">
            <div class="px-6 py-4">
                <a href="{{ route('dokter.jadwal.create') }}"
                    class="bg-green-500 hover:bg-green-600 text-black font-bold py-2 rounded inline-block">
                    Tambah Jadwal
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Hari
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jam Buka
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jam Tutup
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($items as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $item->hari }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $item->jam_buka }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $item->jam_tutup }}

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <a href="{{ route('dokter.jadwal.edit', $item->id) }}"
                                        class="bg-blue-500 text-black hover:bg-blue-600 px-3 py-1 rounded-md mr-3">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('dokter.jadwal.destroy', $item->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this item?')"
                                            class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
