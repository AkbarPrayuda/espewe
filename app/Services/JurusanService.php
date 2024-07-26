<?php

namespace App\Services;

use App\Models\Jurusan;

class JurusanService
{
    public function store($data)
    {
        return Jurusan::create($data);
    }

    public function delete(Jurusan $jurusan)
    {
        // dd($jurusan);
        return $jurusan->delete();
    }
}
