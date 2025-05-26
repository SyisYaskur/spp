<?php

// resources/views/welcome.blade.php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 1 Yaskur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .landing {
            padding: 80px 20px 40px 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Project Laravel 12 Simple BY SYIS</a>
            <div class="ms-auto">
                <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary me-2">Dashboard</a>
                <a href="{{ url('/login') }}" class="btn btn-primary">Login</a>
            </div>
        </div>
    </nav>

    <div class="landing">
        <h1>Selamat Datang di Aplikasi Pembayaran SPP</h1>
        <p class="lead">Sederhana, cepat, dan efisien.</p>
    </div>

    <div class="container mb-3">
        <form action="{{ url('/') }}" method="GET" class="row g-2">
            <div class="col-md-4">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari NISN...">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-outline-primary">Cari</button>
            </div>
        </form>

    <div class="container mb-5">
        <h4 class="mb-3">Daftar Siswa</h4>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa as $s)
                <tr>
                    <td>{{ $s->nisn }}</td>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->kelas->nama_kelas ?? '-' }}</td>
                    <td>{{ $s->alamat }}</td>
                    <td>{{ $s->no_telepon }}</td>
                    <td>
                        @if($s->pembayaran->isNotEmpty())
                            @php
                                // Ambil pembayaran terbaru berdasarkan ID
                                $latestPayment = $s->pembayaran->sortByDesc('id_pembayaran')->first();
                            @endphp
                            @if($latestPayment->status_pembayaran === 'lunas')
                                <span class="badge bg-success">Lunas</span>
                            @else
                                <span class="badge bg-danger">Belum Lunas</span>
                            @endif
                        @else
                            <span class="badge bg-danger">Belum Lunas</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>