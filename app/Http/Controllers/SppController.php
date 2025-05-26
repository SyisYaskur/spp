<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        $data = Spp::all();
        return view('spp.index', compact('data'));
    }

    public function create()
    {
        return view('spp.create');
    }

    public function store(Request $request)
    {
        Spp::create([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]);
    
        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil disimpan.');
    }
    

    public function edit(Spp $spp)
    {
        return view('spp.edit', compact('spp'));
    }

    public function update(Request $request, Spp $spp)
    {
        $request->validate([
            'tahun' => 'required|numeric',
            'nominal' => 'required|numeric',
        ]);

        $spp->update($request->all());

        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil diupdate!');
    }

    public function destroy(Spp $spp)
    {
        $spp->delete();

        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil dihapus!');
    }
}

