<?php

use App\Models\Siswa;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PembayaranController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/', function () {
    $search = request('search');
    $siswa = Siswa::with('kelas')
                ->when($search, function ($query, $search) {
                    return $query->where('nisn', 'like', "%{$search}%");
                })
                ->get();

    return view('welcome', compact('siswa'));
});

Route::resource('/kelas', KelasController::class)->middleware('auth');


Route::resource('/spp', SppController::class)->middleware('auth');

Route::resource('/siswa', SiswaController::class)->middleware('auth');


// Halaman Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

// Proses Login
Route::post('/login', function (Request $request) {
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors([
        'username' => 'Username atau password salah.',
    ]);
});

// Logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('pengguna', PenggunaController::class);
});

Route::resource('pembayaran', PembayaranController::class);