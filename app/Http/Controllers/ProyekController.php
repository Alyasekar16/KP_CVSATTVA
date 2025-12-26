<?php

namespace App\Http\Controllers;

use App\Models\proyek;
use App\Models\komen;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function userIndex()
    {
        $proyek = proyek::select(
            'proyek_id',
            'namaproyek',
            'kategoriproyek',
            'lokasi',
            'status',
            'gambarproyek'
        )

            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('kategoriproyek');

        return view('user.proyek', compact('proyek'));
    }

    public function show($id)
    {
        $proyek = proyek::with(['komen.balasan'])
            ->findOrFail($id);

        return view('user.proyek_detail', compact('proyek'));
    }

    public function komentar()
    {
        return $this->hasMany(komen::class, 'proyek_id');
    }
}
