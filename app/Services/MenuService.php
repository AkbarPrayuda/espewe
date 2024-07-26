<?php

namespace App\Services;

use App\Models\Menu;

class MenuService
{
    public function getAllMenu()
    {
        return Menu::with('bootSpw')->get();
    }

    public function store($data)
    {
        return Menu::create($data);
    }

    public function getMenuById($id)
    {
        return Menu::find($id);
    }

    public function delete(Menu $menu)
    {
        return $menu->delete();
    }
}
