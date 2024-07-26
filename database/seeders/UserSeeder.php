<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user')->insert([
            'nama' => 'admin',
            'email' => 'admin21@gmail.com',
            'password' => Hash::make('admin212'),
            'kelas_id' => 1,
        ]);
    }
}
