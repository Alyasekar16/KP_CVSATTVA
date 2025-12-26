<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'jabatan',
        'tim',
        'alamat',
        'foto',
        'email',
        'notelepon',
        'deskripsi'
    ];
}
