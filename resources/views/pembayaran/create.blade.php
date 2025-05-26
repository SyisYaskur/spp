@extends('layouts.app')

@section('title', 'Tambah Pembayaran')

@section('content')
<div class="container mt-4">
    <h4>Tambah Data Pembayaran</h4>
    <form action="{{ route('pembayaran.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>NISN</label>
            <select name="nisn" class="form-select" required>
                @foreach($siswa as $item)
                    <option value="{{ $item->nisn }}">{{ $item->nisn }} - {{ $item->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>SPP</label>
            <select name="id_spp" class="form-select" required>
                @foreach($spp as $item)
                    <option value="{{ $item->id }}">{{ $item->tahun }} - Rp{{ number_format($item->nominal, 0, ',', '.') }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Status Pembayaran</label>
            <select name="status_pembayaran" class="form-select">
                <option value="belum_lunas">Belum Lunas</option>
                <option value="lunas">Lunas</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal Pembayaran</label>
            <input type="date" name="tanggal_pembayaran" class="form-control">
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection