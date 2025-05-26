@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')
<div class="container mt-4">
    <h4>Edit Data Siswa</h4>
    <form action="{{ route('siswa.update', $siswa->nisn) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>NISN</label>
            <input type="text" class="form-control" value="{{ $siswa->nisn }}" disabled>
        </div>

        <div class="mb-3">
            <label>NIS</label>
            <input type="text" name="nis" class="form-control" value="{{ $siswa->nis }}" required>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <select name="id_kelas" class="form-select" required>
                @foreach($kelas as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $siswa->id_kelas ? 'selected' : '' }}>
                        {{ $item->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ $siswa->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label>Nomor Telepon</label>
            <input type="text" name="no_telepon" class="form-control" value="{{ $siswa->no_telepon }}" required>
        </div>

        <div class="mb-3">
            <label>spp</label>
            <select name="id_spp" class="form-select" required>
                @foreach($spp as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $siswa->id_spp ? 'selected' : '' }}>
                        {{ $item->tahun }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
