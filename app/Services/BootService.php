<?php

namespace App\Services;

use App\Models\Boot;

class BootService
{
    public function getAllBoot()
    {
        return Boot::with('menu', 'user')->get();
    }

    public function store($data)
    {
        return Boot::create($data);
    }

    public function delete(Boot $boot)
    {
        return $boot->delete();
    }

    public function update($data, Boot $boot)
    {
        return $boot->update($data);
    }
}
