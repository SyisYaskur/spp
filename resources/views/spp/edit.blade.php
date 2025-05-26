@extends('layouts.app')

@section('title', 'Edit SPP')

@section('content')
<div class="container mt-4">
    <h4>Edit Data SPP</h4>
    <form action="{{ route('spp.update', $spp->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>tahun</label>
            <input type="number" name="tahun" value="{{ $spp->tahun }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nominal</label>
            <input type="number" name="nominal" value="{{ $spp->nominal }}" class="form-control" required>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('spp.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
