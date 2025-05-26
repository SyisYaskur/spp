<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::with(['kelas', 'spp'])->get();
        return view('siswa.index', compact('data'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('siswa.create', compact('kelas', 'spp'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:siswa',
            'nis' => 'required',
            'nama' => 'required',
            'id_kelas' => 'required|exists:kelas,id',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'id_spp' => 'required|exists:spp,id',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('siswa.edit', compact('siswa', 'kelas', 'spp'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'id_kelas' => 'required|exists:kelas,id',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'id_spp' => 'required|exists:spp,id',
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diupdate!');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus!');
    }
}
