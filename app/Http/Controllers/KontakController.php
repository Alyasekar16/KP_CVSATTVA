<?php

namespace App\Http\Controllers;

use App\Models\kontak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KontakController extends Controller
{
    public function kontak()
    {
        $kontak = kontak::all();
        return view('user.kontak', compact('kontak'));
    }
}
