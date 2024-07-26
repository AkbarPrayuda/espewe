<?php

namespace App\Http\Controllers;

use App\Models\Boot;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SPW | Admin',
            'boot' => Boot::where('status', 'notAccept')->with('user')->get(),
        ];

        return response()->view('admin.index', $data);
    }

    public function jurusan()
    {
        $data = [
            'title' => 'SPW | Admin Jurusan',
            'jurusan' => Jurusan::paginate(3),
            // 'jurusan' => DB::table('jurusan')->paginate(5),
        ];
        return response()->view('admin.jurusan', $data);
    }

    public function kelas()
    {
        $data = [
            'title' => 'SPW | Admin kelas',
            'kelas' => Kelas::with('jurusan')->paginate(3),
            'jurusan' => Jurusan::all(),
        ];

        return response()->view('admin.kelas', $data);
    }
}
