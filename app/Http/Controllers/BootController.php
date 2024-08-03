<?php

namespace App\Http\Controllers;

use App\Models\Boot;
use App\Http\Requests\StoreBootRequest;
use App\Http\Requests\UpdateBootRequest;
use App\Services\BootService;

class BootController extends Controller
{
    protected $bootService;

    public function __construct(BootService $boot)
    {
        $this->bootService = $boot;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boots = $this->bootService->getAllBoot()->where('status', 'accept');

        $data = [
            'title' => 'SPW | Boot',
            'boots' => $boots,
        ];

        return response()->view('boot.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'SPW | Buat Boot',
        ];

        return response()->view('boot.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBootRequest $request)
    {
        $this->bootService->store($request->only('boot', 'user_id', 'status'));
        return back()->with('success', 'Terimakasih sudah membuat boot, mohon tunggu sampai boot di setujui admin ya!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Boot $boot)
    {
        $data = [
            'title' => 'SPW | Detail Boot',
            'boot' => $boot,
        ];

        return response()->view('boot.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boot $boot)
    {
        $data = [
            'title' => 'SPW Edit Boot',
            'boot' => $boot,
        ];

        return response()->view('boot.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBootRequest $request, Boot $boot)
    {
        $this->bootService->update($request->all(), $boot);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boot $boot)
    {
        $this->bootService->delete($boot);
    }

    public function accept(Boot $boot)
    {
        $boot->status = 'accept';
        $boot->save();
        return back();
    }
}
