<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index()
    {
        $proyek = Proyek::all();
        return view('admin.proyek.index', compact('proyek'));
    }

    public function create()
    {
        return view('admin.proyek.create');
    }

    public function store(Request $request)
{
    $data = $request->only([
        'namaproyek',
        'kategoriproyek',
        'jenisproyek',
        'lokasi',
        'klien',
        'tanggalmulai',
        'tanggalselesai',
        'status',
        'deskripsi',
    ]);

    if ($request->hasFile('gambarproyek')) {
        $file = $request->file('gambarproyek');
        $nama = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('gambarproyek'), $nama);
        $data['gambarproyek'] = $nama;
    }

    Proyek::create($data);

    return redirect()->route('proyek.index')
        ->with('success', 'Proyek berhasil ditambahkan!');
}


    public function userIndex()
    {
        $proyek = Proyek::all()->groupBy('kategoriproyek');
        return view('user.proyek', compact('proyek'));
    }

    public function edit($id)
    {
        $proyek = Proyek::find($id);
        return view('admin.proyek.edit', compact('proyek'));
    }

    public function update(Request $request, $id)
{
    $proyek = Proyek::findOrFail($id);

    $data = $request->only([
        'namaproyek',
        'kategoriproyek',
        'jenisproyek',
        'lokasi',
        'klien',
        'tanggalmulai',
        'tanggalselesai',
        'status',
        'deskripsi',
    ]);

    if ($request->hasFile('gambarproyek')) {
        $file = $request->file('gambarproyek');
        $nama = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('gambarproyek'), $nama);
        $data['gambarproyek'] = $nama;
    }

    $proyek->update($data);

    return redirect()->route('proyek.index')
        ->with('success', 'Proyek berhasil diperbarui!');
}


    public function destroy($id)
    {
        $proyek = Proyek::find($id);
        $proyek->delete();

        return redirect()->route('proyek.index')
            ->with('success', 'Proyek berhasil dihapus!');
    }
}
