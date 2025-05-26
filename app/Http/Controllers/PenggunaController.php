<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $data = Pengguna::all();
        return view('pengguna.index', compact('data'));
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:pengguna',
            'password' => 'required',
            'role'     => 'required|in:admin,petugas,tamu',
        ]);

        Pengguna::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role'     => $request->role
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request, $id)
    {
        $pengguna = Pengguna::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:pengguna,username,' . $id . ',id_pengguna',
            'role'     => 'required|in:admin,petugas,tamu',
        ]);

        $pengguna->update([
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $pengguna->password,
            'role'     => $request->role
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diupdate.');
    }

    public function destroy($id)
    {
        Pengguna::destroy($id);
        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }
}
