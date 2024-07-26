<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register()
    {
        $data = [
            'title' => 'SPW | Daftar',
            'kelas' => Kelas::with('jurusan')->get(),
        ];

        return response()->view('auth.register', $data);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:8',
            'kelas_id' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Masukan email yang valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        if (!$validator) {
            return response()->redirectTo('register')->with('error', 'Gagal Membuat Akun!');
        }

        $data = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'kelas_id' => $request->input('kelas_id'),
        ];

        $this->userService->store($data);
        return response()->redirectTo('login')->with('success', 'Berhasil membuat Akun! Silahkan login untuk masuk!');
    }


    public function login()
    {
        $data = [
            'title' => 'SPW | Masuk'
        ];

        return response()->view('auth.login', $data);
    }

    public function authLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->with('error', 'Gagal masuk, silahkan coba kembali');
        }

        $request->session()->regenerate();

        if ($request->email == 'admin21@gmail.com') {
            return response()->redirectTo('admin')->with('success', 'Login berhasil!');
        } else {
            return response()->redirectTo(route('menu.index'))->with('success', 'Login berhasil!');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
