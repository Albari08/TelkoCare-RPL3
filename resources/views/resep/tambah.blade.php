<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <nav class="text-gray-500 text-base font-semibold pt-3 p-3">
                <a href="#" class="flex items-center opacity-75 hover:text-red-500 hover:rounded-md hover:bg-red-100 py-4 pl-6 nav-item active">
                    <i class="fas fa-dashboard mr-3"></i>
                    Dashboard
                </a>
                <a href="{{ route('resep.index')}}" class="flex items-center opacity-75 hover:text-red-500 hover:rounded-md hover:bg-red-100 py-4 pl-6 nav-item">
                    <i class="fa-solid fa-receipt mr-3 "></i>
                    Resep Dokter
                </a>
            </nav>
        </nav>
    </aside>

    <div class="flex-1 p-5">
        <h1 class="font-bold text-4xl text-gray-600">Tambah Resep</h1>
        <div class="flex mt-5">
            <div class="w-1/2 bg-red-400 p-3 rounded-md text-white">
                <form action="">
                    <div class="flex justify-between gap-2 mb-4 items-center">
                        <p for="" class="font-bold flex items-center"><i class="fa-solid fa-user-injured mr-3"></i> Pasien </p>
                        <input type="text" id="nama_pasien" class="rounded-md w-full p-2 border border-white bg-red-400" placeholder="Masukan Nama Pasien" required>
                    </div>
                    <div class="">
                        <label for="" class="font-bold flex items-center"><i class="fa-solid fa-user-doctor mr-3"></i> Dokter : dr. Kirana</label>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-5">
            <hr class="border border-b-red-400"/>

            <div class="shadow-xl flex flex-wrap">
                <div class="w-full flex mt-5 px-10 py-10 gap-10">
                    <div class="w-1/2">
                        <form action="" id="myForm">
                            <input type="hidden" id="id">
                            <div class="flex flex-wrap mb-4">
                                <label for="" class="font-bold text-sm">Nama Obat</label>
                                <input type="text" id="nama_obat" class="w-full border border-gray-400 rounded-md p-2 text-sm" placeholder="Masukan Nama Obat">
                            </div>

                            <div class="flex flex-wrap mb-4">
                                <label for="" class="font-bold text-sm">Nama Alias Obat</label>
                                <input type="text" id="nama_alias" class="w-full border border-gray-400 rounded-md p-2 text-sm" placeholder="Masukan Nama Alias Obat">
                            </div>

                            <div class="flex justify-between gap-2 mb-4">
                                <div class="flex flex-wrap w-1/2">
                                    <label for="" class="font-bold text-sm">Rute</label>
                                    <input type="text" id="rute" class="w-full border border-gray-400 rounded-md p-2 text-sm" placeholder="Masukan rute">
                                </div>
                                <div class="flex flex-wrap w-1/2">
                                    <label for="" class="font-bold text-sm">Qty</label>
                                    <input type="number" id="qty" class="w-full border border-gray-400 rounded-md p-2 text-sm" placeholder="Masukan qty">
                                </div>
                            </div>

                            <div class="flex flex-wrap mb-5">
                                <label for="" class="font-bold text-sm">Aturan Pakai</label>
                                <input type="text" id="aturan_pakai" class="w-full border border-gray-400 rounded-md p-2 text-sm" placeholder="Masukan Aturan Pakai">
                            </div>

                            <div class="flex">
                                <button id="btn_add" class="border border-red-500 px-4 rounded-full py-3 font-bold text-sm flex items-center"><i class="fa-solid fa-circle-plus text-red-500 text-xl px-1"></i> Tambahkan</button>
                            </div>
                        </form>
                    </div>
                    <div class="w-1/2 border border-black">
                        <table class="text-sm w-full" id="list">
                            <thead>
                                <tr>
                                    <th class="px-5 py-2 text-left">No</th>
                                    <th class="px-5 py-2 text-left">Nama Obat</th>
                                    <th class="px-5 py-2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- append from ajax -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-full mt-10 mb-5 pr-8">
                    <a href="{{ route('resep.index') }}" class="right-0 float-right mx-2 px-8 bg-gray-400 text-white text-sm py-2  justify-center items-center rounded-xl cursor-pointer z-10">
                        Close
                    </a>
                    <a href="#" id="cetak" class="right-0 float-right mx-2 px-8 bg-green-500 text-white text-sm py-2  justify-center items-center rounded-xl cursor-pointer z-10">
                        Cetak
                    </a>
                    <a href="{{ route('resep.index') }}" class="right-0 float-right mx-2 px-8 bg-red-600 text-white text-sm py-2  justify-center items-center rounded-xl cursor-pointer z-10">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            getList();

            $('#myForm').submit(async function(e) {
                e.preventDefault();
                try {
                    if (await validateForm()) {
                        let id = $('#id').val();
                        if (id) {
                            await updateResep(id);
                        } else {
                            await addResep();
                        }

                        await clearForm()
                        await getList();
                    }
                } catch (error) {
                    console.log(error);
                }
            });

            $(document).on('click', '.edit', async function(e) {
                try {
                    e.preventDefault();
                    // Get the parent <tr> element of the clicked trash icon
                    let id = $(this).data('id');
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');

                    let resep = await $.ajax({
                        method:'GET',
                        url: `{{ url('/resep')}}/${id}/edit`,
                        headers: {
                            'Content-Type' : 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });

                    $('#id').val(resep.id);
                    $('#nama_obat').val(resep.nama_obat);
                    $('#nama_alias').val(resep.nama_alias_obat);
                    $('#rute').val(resep.rute);
                    $('#qty').val(resep.qty);
                    $('#aturan_pakai').val(resep.aturan_pakai);

                } catch (error) {
                    console.log(error);
                }
            });

            $(document).on('click', '.remove', async function(e) {
                try {
                    e.preventDefault();
                    // Get the parent <tr> element of the clicked trash icon
                    let id = $(this).data('id');
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');

                    let response = await $.ajax({
                        method:'DELETE',
                        url: `{{ url('/removeobat')}}/${id}`,
                        headers: {
                            'Content-Type' : 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });

                    await getList();

                } catch (error) {
                    console.log(error);
                }
            });

            $('#cetak').click( async function(e){
                try {
                    e.preventDefault();

                    let nama_pasien = $('#nama_pasien').val();

                    if(!nama_pasien) {
                        alert('Nama Tidak Boleh Kosong');
                    }

                    let data = {
                        nama_pasien
                    }

                    var csrfToken = $('meta[name="csrf-token"]').attr('content');

                    let response = await $.ajax({
                        method:'POST',
                        url: `{{ route ('resep.store') }}`,
                        data: JSON.stringify(data),
                        headers: {
                            'Content-Type' : 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });

                    if(response.status){
                        await getList();
                        window.location.href = "/resep"
                    } else {
                        alert("Belum Ada Resep. Silahkan tambahkan Obat")
                    }

                } catch (error) {
                    console.log(error);
                }
            })

            async function validateForm() {
                return new Promise((resolve, reject) => {
                    var isEmpty = false;
                    $(this).find('input[type="text"]').each(function() {
                        if ($(this).val().trim() === '' && $(this).attr('id') !== 'id') {
                            isEmpty = true;
                            return false; // Exit loop early if any input is empty
                        }
                    });
                    if (isEmpty) {
                        alert('Please fill in all the fields.');
                        reject('Form validation failed.');
                    } else {
                        resolve(true);
                    }
                });
            }

            async function addResep() {
                let nama_obat = $('#nama_obat').val();
                let nama_alias = $('#nama_alias').val();
                let rute = $('#rute').val();
                let qty = $('#qty').val();
                let aturan_pakai = $('#aturan_pakai').val();

                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                let data = {
                    nama_obat,
                    nama_alias,
                    rute,
                    qty,
                    aturan_pakai
                };

                let response = await $.ajax({
                    method:'POST',
                    url: `{{ route ('resep.addobat') }}`,
                    data: JSON.stringify(data),
                    headers: {
                        'Content-Type' : 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
            }

            async function updateResep(id){
                try {

                    let nama_obat = $('#nama_obat').val();
                    let nama_alias = $('#nama_alias').val();
                    let rute = $('#rute').val();
                    let qty = $('#qty').val();
                    let aturan_pakai = $('#aturan_pakai').val();

                    var csrfToken = $('meta[name="csrf-token"]').attr('content');

                    let data = {
                        nama_obat,
                        nama_alias,
                        rute,
                        qty,
                        aturan_pakai
                    }

                    let response = await $.ajax({
                        method:'PUT',
                        url: `{{ route('resep.update', '') }}/${id}`,
                        data: JSON.stringify(data),
                        headers: {
                            'Content-Type' : 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });
                } catch (error) {
                    console.log(error);
                }
            }

            async function getList() {
                try {

                    let response = await $.ajax({
                        method: 'GET',
                        url: `{{ route('resep.getobat') }}`,
                        headers: {
                            'Content-Type': 'application/json',
                        }
                    });
                    // Do something with the response if needed

                    let row = '<tr>';

                    for(let i = 0; i < response.length; i ++) {
                        row += `<tr>
                            <td class="px-5 py-2 border-y border-black">${i+1}</td>
                            <td class="px-5 py-2 border-y border-black">${response[i].nama_obat}</td>
                            <td class="px-5 py-2 border-y border-black">
                                <a href="#" data-id="${response[i].id}" class="edit"><i class="fa fa-pencil px-2"></i></a>
                                <a href="#" data-id="${response[i].id}" class="remove"><i class="fa fa-trash  px-2"></i></a>
                            </td>
                        </tr>`
                    }

                    let table = $('#list > tbody');

                    table.html(row)

                } catch (error) {
                    console.log(error);
                }
            }

            async function clearForm() {
                $('#id').val("");
                $('#nama_obat').val("");
                $('#nama_alias').val("");
                $('#rute').val("");
                $('#qty').val("");
                $('#aturan_pakai').val("");
            }
        })
    </script>
</body>
</html>
