<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Services\MenuService;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menu)
    {
        $this->menuService = $menu;
    }

    public function index()
    {
        $data = [
            'title' => 'SPW | Menu',
            'menu' => Menu::with('bootSpw')->get(),
        ];

        return response()->view('menu.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'SPW | Buat Menu Baru',
        ];

        return response()->view('menu.create', $data);
    }

    public function store(StoreMenuRequest $request)
    {
        $this->menuService->store($request->only('nama_menu', 'deskripsi', 'boot_id', 'harga'));
    }

    public function show(Menu $menu)
    {
        $data = [
            'title' => 'SPW | Detail Menu',
            'menu' => $menu,
        ];

        return response()->view('menu.show', $data);
    }

    public function destroy(Menu $menu)
    {
        $this->menuService->delete($menu);
    }
}
