@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h4>Data Pengguna</h4>
    <a href="{{ route('pengguna.create') }}" class="btn btn-primary mb-3">Tambah Pengguna</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $p)
                <tr>
                    <td>{{ $p->id_pengguna }}</td>
                    <td>{{ $p->username }}</td>
                    <td>{{ $p->role }}</td>
                    <td>
                        <a href="{{ route('pengguna.edit', $p->id_pengguna) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('pengguna.destroy', $p->id_pengguna) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
