<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table = 'proyek';
    protected $primaryKey = 'proyek_id';
    
    protected $fillable = [
        'namaproyek',
        'kategoriproyek',
        'jenisproyek',
        'lokasi',
        'klien',
        'tanggalmulai',
        'tanggalselesai',
        'status',
        'deskripsi',
        'gambarproyek',
    ];
}
