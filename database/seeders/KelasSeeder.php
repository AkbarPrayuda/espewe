<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelas')->insert([
            'kelas' => '10',
            'jurusan_id' => '1'
        ]);
        DB::table('kelas')->insert([
            'kelas' => '11',
            'jurusan_id' => '2'
        ]);
    }
}