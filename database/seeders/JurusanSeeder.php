<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jurusan')->insert([
            'jurusan' => 'RPL 1'
        ]);
        DB::table('jurusan')->insert([
            'jurusan' => 'TKJ 1'
        ]);
    }
}
