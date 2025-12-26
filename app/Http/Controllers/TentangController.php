<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\perusahaan;
use App\Models\karyawan;
use App\Models\penghargaan;

class TentangController extends Controller
{
    // untuk USER
    public function perusahaan()
    {

        $data = perusahaan::first();
        return view('user.tentang.perusahaan', compact('data'));
    }

    public function tim()
    {

        $ceo = karyawan::where('jabatan', 'CEO')->first();  // ambil satu data CEO
        $karyawan = karyawan::where('jabatan', '!=', 'CEO')->get();
        return view('user.tentang.tim', compact('ceo', 'karyawan'));
    }

    public function penghargaan()
    {

        $penghargaan = penghargaan::orderBy('tahun', 'ASC')->get();
        return view('user.tentang.penghargaan', compact('penghargaan'));
    }
}
