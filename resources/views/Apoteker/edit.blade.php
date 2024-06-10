<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Telko Care</title>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <a href="{{ route('resepPasien.index')}}" class="flex items-center opacity-75 hover:text-red-500 hover:rounded-md hover:bg-red-100 py-4 pl-6 nav-item">
                <i class="fa-solid fa-receipt mr-3 "></i>
                Resep Dokter (Pasien)
            </a>
            <a href="{{ route('apoteker.index')}}" class="flex items-center opacity-75 hover:text-red-500 hover:rounded-md hover:bg-red-100 py-4 pl-6 nav-item">
                <i class="fa-solid fa-receipt mr-3 "></i>
                Apoteker
            </a>
        </nav>
    </aside>

    <div class="flex-1 p-5">
        <h1 class="font-bold text-4xl text-gray-600">Tambah Resep</h1>
        <div class="flex mt-5">
            <div class="w-1/2 bg-red-400 p-3 rounded-md text-white">
                <form action="">
                    <div class="flex justify-between gap-2 mb-4 items-center">
                        <label for="" class="font-bold flex items-center"><i class="fa-solid fa-user-injured mr-3"></i> Pasien : {{ $resep->nama_pasien}}</label>
                    </div>
                    <div class="">
                        <label for="" class="font-bold flex items-center"><i class="fa-solid fa-user-doctor mr-3"></i> Dokter : dr. Kirana</label>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-5">
            <hr class="border border-b-red-400"/>

            <div class="shadow-xl mt-5 min-h-96">
                <form action="{{ route('apoteker.update', $resep->id) }}" method="POST">
                    <table class="text-sm w-full">
                        <thead>
                            <tr>
                                <th class="px-5 py-5 text-left">No</th>
                                <th class="px-5 py-5 text-left">Nama Obat</th>
                                <th class="px-5 py-5 text-left">Aturan Pakai</th>
                                <th class="px-5 py-5 text-left">Rute</th>
                                <th class="px-5 py-5 text-left">Qty</th>
                                <th class="px-5 py-5 text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resepDetails as $item)
                            <tr>
                                <td class="px-5 py-5 border-y border-black">{{ $loop->iteration}}</td>
                                <td class="px-5 py-5 border-y border-black">{{ $item->nama_obat}}</td>
                                <td class="px-5 py-5 border-y border-black">{{ $item->aturan_pakai}}</td>
                                <td class="px-5 py-5 border-y border-black">{{ $item->rute }}</td>
                                <td class="px-5 py-5 border-y border-black">{{ $item->qty}}</td>
                                <td class="px-5 py-5 border-y border-black">
                                    <input type="hidden" name="detail_id[]" value="{{ $item->id }}">
                                    <select required class="w-50 mr-3 border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-1 focus:ring-blue-500" name="status[]">
                                        <option {{ $item->status == "Undefined" ? "selected" : "" }} disabled>Select Status</option>
                                        <option {{ $item->status == "Available" ? "selected" : "" }} value="Available">Available</option>
                                        <option {{ $item->status == "Not Available" ? "selected" : "" }} value="Not Available">Not Available</option>
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @csrf
                    @method('PUT')
                    <div class="w-full mt-16 flex justify-end">
                        <input type="text" value="{{ $resep->store }}" readonly>
                    </div>
    
                    <div class="w-full mt-5">
                        <button type="submit" class="right-0 float-right mx-5 px-8 bg-green-500 text-white text-sm py-2 justify-center items-center rounded-xl cursor-pointer z-10">
                            Send
                        </button>
                        <a href="{{ route('apoteker.index') }}" class="right-0 float-right mx-5 px-8 bg-gray-400 text-white text-sm py-2 justify-center items-center rounded-xl cursor-pointer z-10">
                            Close
                        </a>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>
