<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use App\Services\KelasService;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    protected $kelasService;

    public function __construct(KelasService $kelas)
    {
        $this->kelasService = $kelas;
    }

    public function index()
    {
        $data = [
            'title' => 'SPW | Kelas'
        ];

        return response()->view('kelas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'SPW | Buat Kelas'
        ];

        return response()->view('kelas.create', $data);
    }

    public function store(StoreKelasRequest $request)
    {
        $this->kelasService->store($request->only('kelas', 'jurusan_id'));

        return back()->with('success', 'Berhasil membuat kelas!');
    }

    public function destroy(Request $request)
    {
        $kelas = Kelas::find($request->id);
        $this->kelasService->delete($kelas);
        return back();
    }
}
