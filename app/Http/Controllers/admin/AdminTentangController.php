<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;

class AdminTentangController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('admin.tentang.karyawan.index', compact('karyawan'));
    }

    public function create()
    {
        return view('admin.tentang.karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'tim' => 'required',
            'email' => 'required',
            'notelepon' => 'required',
            'deskripsi' => 'required|date',
        ]);

        $data = $request->only([
            'nama',
            'jabatan',
            'tim',
            'email',
            'notelepon',
            'deskripsi',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')
                ->store('karyawan', 'public');
        }

        Karyawan::create($data);

        return redirect()->route('admin.tentang.karyawan.index')
            ->with('success', 'Karyawan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('admin.tentang.karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);

        $karyawan->update([
            'nama' => $requst->nama,
            'jabatan' => $request->jabatan,
            'tim' => $request->tim,
            'email' => $request->email,
            'notelepon' => $request->notelepon,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('karyawan', 'public');
        }

        $karyawan->update($data);

        return redirect()->route('admin.tentang.karyawan.index')
            ->with('success', 'Karyawan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();

        return redirect()->route('admin.tentang.karyawan.index')
            ->with('success', 'Karyawan berhasil dihapus!');
    }
}
