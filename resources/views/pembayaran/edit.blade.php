@extends('layouts.app')

@section('title', 'Edit Pembayaran')

@section('content')
<div class="container mt-4">
    <h4>Edit Data Pembayaran</h4>
    <form action="{{ route('pembayaran.update', $pembayaran->id_pembayaran) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>NISN</label>
            <select name="nisn" class="form-select" required>
                @foreach($siswa as $item)
                    <option value="{{ $item->nisn }}" {{ $item->nisn == $pembayaran->nisn ? 'selected' : '' }}>
                        {{ $item->nisn }} - {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>SPP</label>
            <select name="id_spp" class="form-select" required>
                @foreach($spp as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $pembayaran->id_spp ? 'selected' : '' }}>
                        {{ $item->tahun }} - Rp{{ number_format($item->nominal, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Status Pembayaran</label>
            <select name="status_pembayaran" class="form-select">
                <option value="belum_lunas" {{ $pembayaran->status_pembayaran == 'belum_lunas' ? 'selected' : '' }}>Belum Lunas</option>
                <option value="lunas" {{ $pembayaran->status_pembayaran == 'lunas' ? 'selected' : '' }}>Lunas</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal Pembayaran</label>
            <input type="date" name="tanggal_pembayaran" class="form-control" value="{{ $pembayaran->tanggal_pembayaran }}">
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection