<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function beranda()
    {
        return view('user.beranda');
    }

    public function tentang()
    {
        return view('user.tentang');
    }

    public function kontak()
    {
        return view('user.kontak');
    }

    public function proyek()
    {
        return view('user.proyek');
    }
    public function ulasan()
    {
        return view('user.ulasan');
    }
}
