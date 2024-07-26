<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function getAllUser()
    {
        return User::with('kelas', 'bootSpw')->get();
    }

    public function store($data)
    {
        return User::create($data);
    }

    public function getUserById($id)
    {
        return User::find($id)->with('kelas', 'bootSpw')->get();
    }

    public function delete(User $user)
    {
        return $user->delete();
    }
}
