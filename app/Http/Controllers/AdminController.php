<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyek;

class AdminController extends Controller
{
    public function beranda()
    {
        return view('admin.beranda');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function proyek()
    {
        $proyek = Proyek::all();
        return view('admin.proyek', compact('proyek'));
    }
    
    public function ulasan()
    {
        return view('admin.ulasan');
    }

    public function klien()
    {
        return view('admin.klien');
    }

    public function pengaturan()
    {
        return view('admin.pengaturan');
    }

    public function logout()
    {
        return view('admin.logout');
    }
}
