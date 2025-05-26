@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
<div class="container mt-4">
    <h4>Data Siswa</h4>
    <a href="{{ route('siswa.create') }}" class="btn btn-success mb-3">+ Tambah Siswa</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NISN</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>spp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->kelas->nama_kelas }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->no_telepon }}</td>
                <td>{{ $item->spp->tahun }}</td>
                <td>
                    <a href="{{ route('siswa.edit', $item->nisn) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('siswa.destroy', $item->nisn) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
