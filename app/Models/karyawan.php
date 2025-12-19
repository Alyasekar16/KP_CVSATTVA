<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'jabatan', 'tim', 'foto', 'email', 'notelepon', 'deskripsi'
    ];
}