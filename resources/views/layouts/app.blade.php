<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard Admin</a>
    
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kelas.index') }}">Kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('spp.index') }}">Spp</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('siswa.index') }}">Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pembayaran.index') }}">Pembayaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pengguna.index') }}">pengguna</a>
                </li>
                <!-- Tambah menu lain di sini -->
            </ul>
    
            <div class="d-flex">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    

    {{-- Content --}}
    <main class="py-4">
        @yield('content')
    </main>

    {{-- Bootstrap JS (optional) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
