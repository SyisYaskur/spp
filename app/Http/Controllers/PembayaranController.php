<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Spp;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // Tampilkan semua pembayaran
    public function index()
    {
        $pembayaran = Pembayaran::with(['siswa', 'spp'])->paginate(10);
        return view('pembayaran.index', compact('pembayaran'));
    }

    // Form tambah pembayaran
    public function create()
    {
        $siswa = Siswa::all();
        $spp = Spp::all();
        return view('pembayaran.create', compact('siswa', 'spp'));
    }

    // Simpan pembayaran
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|exists:siswa,nisn',
            'id_spp' => 'required|exists:spp,id',
            'status_pembayaran' => 'nullable|in:lunas,belum_lunas',
            'tanggal_pembayaran' => 'nullable|date',
        ]);

        Pembayaran::create([
            'nisn' => $request->nisn,
            'id_spp' => $request->id_spp,
            'status_pembayaran' => $request->status_pembayaran ?? 'belum_lunas',
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil disimpan');
    }

    // Detail pembayaran
    public function show(Pembayaran $pembayaran)
    {
        return view('pembayaran.show', compact('pembayaran'));
    }

    // Form edit pembayaran
    public function edit(Pembayaran $pembayaran)
    {
        $siswa = Siswa::all();
        $spp = Spp::all();
        return view('pembayaran.edit', compact('pembayaran', 'siswa', 'spp'));
    }

    // Update pembayaran
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'nisn' => 'required|exists:siswa,nisn',
            'id_spp' => 'required|exists:spp,id',
            'status_pembayaran' => 'nullable|in:lunas,belum_lunas',
            'tanggal_pembayaran' => 'nullable|date',
        ]);

        $pembayaran->update([
            'nisn' => $request->nisn,
            'id_spp' => $request->id_spp,
            'status_pembayaran' => $request->status_pembayaran ?? 'belum_lunas',
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil diupdate');
    }

    // Hapus pembayaran
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil dihapus');
    }
}
