<?php
namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Spp;

class HomeController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')->get(); // kalau siswa punya relasi ke kelas
        $spp = Spp::all();

            $query = Siswa::with('kelas', 'pembayaran'); // Load relasi kelas dan pembayaran
    
            if (request('search')) {
                $query->where('nisn', 'like', '%' . request('search') . '%');
            }

            $siswa = $query->paginate(10);
            
            return view('welcome', compact('siswa'));
    }
}
