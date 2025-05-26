@extends('layouts.app')

@section('title', 'Data Pembayaran')

@section('content')
<div class="container mt-4">
    <h4>Data Pembayaran SPP</h4>
    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary mb-3">Tambah Pembayaran</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Tahun SPP</th>
                <th>Status</th>
                <th>Tanggal Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembayaran as $item)
            <tr>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->siswa->nama }}</td>
                <td>{{ $item->spp->tahun }}</td>
                <td>
                    <span class="badge bg-{{ $item->status_pembayaran == 'lunas' ? 'success' : 'danger' }}">
                        {{ $item->status_pembayaran == 'lunas' ? 'Lunas' : 'Belum Lunas' }}
                    </span>
                </td>
                <td>{{ $item->tanggal_pembayaran ? \Carbon\Carbon::parse($item->tanggal_pembayaran)->format('d M Y') : '-' }}</td>
                <td>
                    <a href="{{ route('pembayaran.edit', $item->id_pembayaran) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('pembayaran.destroy', $item->id_pembayaran) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pembayaran->links() }}
</div>
@endsection