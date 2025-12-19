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
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ];
        return view('kontak', $data);
    }

    public function proyek()
    {
        return view('user.proyek');
    }
}