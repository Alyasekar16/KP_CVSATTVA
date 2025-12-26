<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;

class OrderController extends Controller
{
    // USER KIRIM ORDER
    public function store(Request $request)
    {
        $request->validate([
            'nama'       => 'required|string|max:100',
            'email'      => 'required|email',
            'notelepon' => 'required',
            'kategori'   => 'required',
            'jenis'      => 'required',
        ]);

        order::create([
            'nama'       => $request->nama,
            'email'      => $request->email,
            'notelepon'  => $request->notelepon,
            'kategori'   => $request->kategori,
            'jenis'      => $request->jenis,
        ]);

        return back()->with('success', 'Order berhasil dikirim!');
    }
}
