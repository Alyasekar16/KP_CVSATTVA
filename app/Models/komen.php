<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class komen extends Model
{
    protected $table = 'komen';
    protected $primaryKey = 'komen_id';

    protected $fillable = [
        'nama',
        'email',
        'isi',
        'rating',
        'proyek_id'
    ];

    public function balasan()
    {
        return $this->hasOne(komen_admin::class, 'komen_id');
    }
}
