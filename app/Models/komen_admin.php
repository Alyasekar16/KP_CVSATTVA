<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komen_admin extends Model
{
    protected $table = 'komen_admin';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'balasan',
        'komen_id',
    ];
    public function komen()
    {
        return $this->belongsTo(komen::class, 'komen_id');
    }
}
