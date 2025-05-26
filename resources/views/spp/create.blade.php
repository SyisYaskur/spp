@extends('layouts.app')

@section('title', 'Tambah SPP')

@section('content')
<div class="container mt-4">
    <h4>Tambah Data SPP</h4>
    <form action="{{ route('spp.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nominal</label>
            <input type="number" name="nominal" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('spp.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
