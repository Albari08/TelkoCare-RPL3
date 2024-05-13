<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $items = JadwalDokter::where('dokter_id', auth()->guard('dokter')->user()->id)->latest()->get();
        return view('dokter.pages.jadwal.index', [
            'title' => 'Jadwal Dokter',
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('dokter.pages.jadwal.create', [
            'title' => 'Tambah Jadwal'
        ]);
    }

    public function store()
    {
        request()->validate([
            'hari' => ['required'],
            'jam_buka' => ['required'],
            'jam_tutup' => ['required'],
        ]);

        $data = request()->all();
        $data['dokter_id'] = auth()->guard('dokter')->user()->id;
        JadwalDokter::create($data);

        return redirect()->route('dokter.jadwal.index')->with('success', 'Jadwal Dokter berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $item = JadwalDokter::findOrFail($id);
        return view('dokter.pages.jadwal.edit', [
            'title' => 'Edit Jadwal',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'hari' => ['required'],
            'jam_buka' => ['required'],
            'jam_tutup' => ['required'],
        ]);

        $data = request()->all();
        $item = JadwalDokter::findOrFail($id);
        $item->update($data);

        return redirect()->route('dokter.jadwal.index')->with('success', 'Jadwal Dokter berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = JadwalDokter::findOrFail($id);
        $item->delete();
        return redirect()->route('dokter.jadwal.index')->with('success', 'Jadwal Dokter berhasil diupdate.');
    }
}
