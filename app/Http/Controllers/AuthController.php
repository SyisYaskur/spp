<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            auth()->login($admin);
            return redirect()->intended(route('dashboard'));
        }


        return back()->withErrors(['username' => 'Username atau password salah']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
