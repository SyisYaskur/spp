@extends('layouts.app') <!-- kalau belum ada, bisa pakai layout biasa -->

@section('content')
<div class="container mt-4">
    <h4>Data Kelas</h4>
    <a href="{{ route('kelas.create') }}" class="btn btn-success mb-3">+ Tambah Kelas</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Kompetensi Keahlian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $kelas)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kelas->nama_kelas }}</td>
                    <td>{{ $kelas->kompetensi_keahlian }}</td>
                    <td>
                        <a href="{{ route('kelas.edit', $kelas->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kelas.destroy', $kelas->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
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
