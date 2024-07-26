<?php

namespace App\Services;

use App\Models\Kelas;

class KelasService
{
    public function store($data)
    {
        return Kelas::create($data);
    }

    public function delete(Kelas $kelas)
    {
        return $kelas->delete();
    }
}
