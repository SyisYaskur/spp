@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Tambah Kelas</h4>
    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kompetensi Keahlian</label>
            <select name="kompetensi_keahlian" class="form-select" required>
                <option value="">-- Pilih Kompetensi --</option>
                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                <option value="BDP">BDP</option>
                <option value="Akuntansi">Akuntansi</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
