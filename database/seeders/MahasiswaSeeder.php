<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            'name' => "Widodo",
            'nim' => 876789876,
            'prodi' => "Ilmu Kayu",
            'email' => "Wdd@email.com",
            'nohp' => 6277678,
        ]);
        }
}