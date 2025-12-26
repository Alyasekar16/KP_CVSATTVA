<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\komen;

class KomenController extends Controller
{
    public function index()
    {
        $komen = komen::all();
        return view('user.proyek', compact('komen'));
    }

    public function create()
    {
        return view('user.proyek');
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyek_id' => 'required|exists:proyek,proyek_id',
            'nama' => 'required',
            'email' => 'required|email',
            'rating' => 'nullable|integer|min:1|max:5',
            'isi' => 'required|string',
        ]);

        $komen = komen::create([
            'proyek_id' => $request->proyek_id,
            'nama' => $request->nama,
            'email' => $request->email,
            'rating' => $request->rating,
            'isi' => $request->isi,
        ]);

        return redirect()->route('user.proyek.proyek_detail', $request->proyek_id)
            ->with('success', 'Komen berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        komen::destroy($id);

        return redirect()->route('admin.komen.index')
            ->with('success', 'komen berhasil dihapus!');
    }
}
