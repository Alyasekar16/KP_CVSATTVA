<?php

namespace Database\Seeders;

use App\Models\penghargaan;
use Illuminate\Database\Seeder;

class PenghargaanSeeder extends Seeder
{
    public function run(): void
    {
        penghargaan::create([
            'nama' => 'Penghargaan Terbaik',
            'tahun' => '2023',
            'deskripsi' => 'Penghargaan untuk proyek terbaik tahun 2023.',
        ]);

        penghargaan::create([
            'nama' => 'Inovasi Terdepan',
            'tahun' => '2022',
            'deskripsi' => 'Penghargaan untuk inovasi terdepan dalam arsitektur.',
        ]);
    }
}