<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'email',
        'notelepon',
        'kategori',
        'jenis',
        'status'
    ];
}
