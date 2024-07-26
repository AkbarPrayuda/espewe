<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Http\Requests\StoreJurusanRequest;
use App\Http\Requests\UpdateJurusanRequest;
use App\Services\JurusanService;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    protected $jurusanService;

    public function __construct(JurusanService $jurusan)
    {
        $this->jurusanService = $jurusan;
    }

    public function index()
    {
        $data = [
            'title' => 'SPW | Jurusan'
        ];

        return response()->view('jurusan.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'SPW | Buat Jurusan',
        ];

        return response()->view('jurusan.create', $data);
    }

    public function store(StoreJurusanRequest $request)
    {
        if ($this->jurusanService->store($request->only('jurusan'))) {
            return redirect()->back()->with('success', 'Berhasil membuat jurusan!');
        }
    }

    public function destroy(Request $request)
    {
        // dd($request->id);
        $jurusan = Jurusan::find($request->id);
        $this->jurusanService->delete($jurusan);
        return back();
    }
}
