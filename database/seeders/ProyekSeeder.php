<?php

namespace Database\Seeders;

use App\Models\proyek;
use Illuminate\Database\Seeder;

class ProyekSeeder extends Seeder
{
    public function run(): void
    {
        proyek::create([
            'namaproyek' => 'Pembangunan Gedung Perkantoran',
            'kategoriproyek'=> 'Kontruksi',
            'jenisproyek'=> 'Kantor',
            'lokasi'=> 'Jakarta Selatan',
            'klien'=> 'PT. Maju Jaya',
            'tanggalmulai'=> '2023-01-15',
            'tanggalselesai'=> '2023-12-15',
            'status'=> 'sedang berjalan',
            'deskripsi'=> 'Proyek pembangunan gedung perkantoran 10 lantai di pusat bisnis Jakarta Selatan.',
            'gambarproyek'=> null,
        ]);

        proyek::create([
            'namaproyek' => 'Desain Rumah Tinggal Modern',
            'kategoriproyek'=> 'Desain Arsitektur',
            'jenisproyek'=> 'Rumah',
            'lokasi'=> 'Bandung',
            'klien'=> 'Bapak Andi',
            'tanggalmulai'=> '2023-03-01',
            'tanggalselesai'=> '2023-08-30',
            'status'=> 'selesai',
            'deskripsi'=> 'Desain arsitektur rumah tinggal modern dengan konsep terbuka dan ramah lingkungan.',
            'gambarproyek'=> null,
        ]);
    }
}