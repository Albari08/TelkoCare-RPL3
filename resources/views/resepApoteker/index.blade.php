<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Telko Care - Apoteker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-white font-family-karla flex">
    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6 text-center">
            <a href="index.html" class="text-gray-500 text-3xl font-semibold border-b-2 block hover:text-gray-300">TelkoCare</a>
        </div>
        <nav class="text-gray-500 text-base font-semibold pt-3 p-3">
            <a href="#" class="flex items-center opacity-75 hover:text-red-500 hover:rounded-md hover:bg-red-100 py-4 pl-6 nav-item active">
                <i class="fas fa-dashboard mr-3"></i>
                Dashboard
            </a>
            <a href="{{ route('resep.index')}}" class="flex items-center opacity-75 hover:text-red-500 hover:rounded-md hover:bg-red-100 py-4 pl-6 nav-item">
                <i class="fa-solid fa-receipt mr-3 "></i>
                Resep Dokter
            </a>
            <a href="{{ route('resepApoteker.index')}}" class="flex items-center opacity-75 hover:text-red-500 hover:rounded-md hover:bg-red-100 py-4 pl-6 nav-item">
                <i class="fa-solid fa-receipt mr-3 "></i>
                Resep Dokter (Apoteker)
            </a>
        </nav>
    </aside>

    <div class="flex-1 p-5">
        @if(session('status'))
            <div class="bg-green-500 text-white px-4 py-2 mt-4 rounded-md">
                {{ session('status') }}
            </div>
        @endif
        <h1 class="font-bold text-4xl text-gray-600">Resep Dokter (Apoteker)</h1>
        <h3 class="font-bold text-red-500">Rekap Obat</h3>

        <form action="{{ route('resepApoteker.index') }}" method="GET" class="mt-5">
            <input class="w-50 border border-gray-400 rounded-md p-2 text-sm" type="text" name="search" required placeholder="Masukkan Nama Apoteker"/>
            <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded-md ml-2">Search</button>
        </form>

        <div class="overflow-x-auto mt-5">
            <table class="table-auto w-full border-separate border-spacing-y-2">
              <thead>
                <tr>
                  <th class="px-4 py-2 border-b-2 border-red-500">No. Order</th>
                  <th class="px-4 py-2 border-b-2 border-red-500">Tanggal Order</th>
                  <th class="px-4 py-2 border-b-2 border-red-500">Nama Apoteker</th>
                  <th class="px-4 py-2 border-b-2 border-red-500">Status</th>
                  <th class="px-4 py-2 border-b-2 border-red-500">Konfirmasi Ketersediaan</th>
                  <th class="px-4 py-2 border-b-2 border-red-500">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($reseps as $row)
                <tr>
                    <td class="px-4 py-2 border border-gray-700 border-r-0 rounded-tl-lg rounded-bl-lg text-center">{{ $row->kode_resep }}</td>
                    <td class="px-4 py-2 border border-gray-700 border-x-0 text-center">{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                    <td class="px-4 py-2 border border-gray-700 border-x-0 text-center">{{ $row->nama_apoteker }}</td>
                    <td class="px-4 py-2 border border-gray-700 border-x-0 text-center">{{ $row->status }}</td>
                    <td class="px-4 py-2 border border-gray-700 border-x-0 text-center">
                        <form action="{{ route('resepApoteker.confirm', $row->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="bg-green-500 text-white px-4 py-1 rounded-md">Konfirmasi</button>
                        </form>
                    </td>
                    <td class="px-4 py-2 border border-gray-700 border-l-0 rounded-tr-lg rounded-br-lg text-center">
                      <a href="{{ route('resepApoteker.show', $row->id )}}" class="bg-red-500 text-white px-4 py-1 rounded-xl text-sm text-center">Rincian</a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</body>
</html>
