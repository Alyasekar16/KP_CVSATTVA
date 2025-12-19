<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perusahaan extends Model
{
    protected $table = 'perusahaan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'visimisi', 'sejarah', 'maknalogo', 'foto'
    ];
}