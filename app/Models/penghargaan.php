<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penghargaan extends Model
{
    protected $table = 'penghargaan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'tahun',
        'deskripsi',
        'foto'
    ];
}
