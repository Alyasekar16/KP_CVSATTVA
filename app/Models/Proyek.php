<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyek extends Model
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

    public function komen()
    {
        return $this->hasMany(komen::class, 'proyek_id', 'proyek_id');
    }
}
