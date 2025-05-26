
@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
        <tbody>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
            <div class="container mt-5">
                <h2>Selamat datang, {{ auth()->user()->username }}!</h2>
                <p>Ini adalah halaman dashboard admin.</p>
            
                <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm border border-primary bg-light card-highlight">
                                <div class="card-body">
                                    <h5 class="card-title">Siswa</h5>
                                    <p class="card-text">Kelola siswa</p>
                                    <a href="{{ route('siswa.index') }}" class="btn btn-primary">Lihat</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm border border-primary bg-light card-highlight">
                                <div class="card-body">
                                    <h5 class="card-title">Kelas</h5>
                                    <p class="card-text">Kelola kelas</p>
                                    <a href="{{ route('kelas.index') }}" class="btn btn-primary">Lihat</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm border border-primary bg-light card-highlight">
                                <div class="card-body">
                                    <h5 class="card-title">SPP</h5>
                                    <p class="card-text">Kelola SPP</p>
                                    <a href="{{ route('spp.index') }}" class="btn btn-primary">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm border border-primary bg-light card-highlight">
                                <div class="card-body">
                                    <h5 class="card-title">Pembayaran</h5>
                                    <p class="card-text">Kelola pembayaran</p>
                                    <a href="{{ route('pembayaran.index') }}" class="btn btn-primary">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tambah card lain di sini kalau mau -->
                </div>
            </div>
        </tbody>
    </table>
</div>

<style>
.card-highlight {
    transition: transform 0.3s ease-in-out;
}
.card-highlight:hover {
    transform: scale(1.03);
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
}
</style>
@endsection
