@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h4>Edit Pengguna</h4>
    <form action="{{ route('pengguna.update', $pengguna->id_pengguna) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" value="{{ $pengguna->username }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password (kosongkan jika tidak diganti)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="admin" {{ $pengguna->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="petugas" {{ $pengguna->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                <option value="tamu" {{ $pengguna->role == 'tamu' ? 'selected' : '' }}>Tamu</option>
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
