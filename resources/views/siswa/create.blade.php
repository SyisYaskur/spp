@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')
<div class="container mt-4">
    <h4>Tambah Data Siswa</h4>
    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>NISN</label>
            <input type="text" name="nisn" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>NIS</label>
            <input type="text" name="nis" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kelas</label>
            <select name="id_kelas" class="form-select" required>
                @foreach($kelas as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Nomor Telepon</label>
            <input type="text" name="no_telepon" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>spp</label>
            <select name="id_spp" class="form-select" required>
                @foreach($spp as $item)
                    <option value="{{ $item->id }}">{{ $item->tahun }} - Rp{{ number_format($item->nominal, 0, ',', '.') }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
