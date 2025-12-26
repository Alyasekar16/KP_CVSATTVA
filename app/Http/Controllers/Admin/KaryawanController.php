<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = karyawan::all();
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
            'alamat' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('karyawan', 'public');
        }

        karyawan::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tim' => $request->tim,
            'email' => $request->email,
            'notelepon' => $request->notelepon,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto ?? null,
        ]);

        return redirect()->route('admin.tentang.karyawan.index')
            ->with('success', 'Karyawan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $karyawan = karyawan::findOrFail($id);
        return view('admin.tentang.karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $karyawan = karyawan::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'tim' => 'required',
            'email' => 'required',
            'notelepon' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($karyawan->foto && Storage::disk('public')->exists($karyawan->foto)) {
                Storage::disk('public')->delete($karyawan->foto);
            }

            $validated['foto'] = $request->file('foto')->store('karyawan', 'public');
        }
        $karyawan->update($validated);

        return redirect()->route('admin.tentang.karyawan.index')
            ->with('success', 'Karyawan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $karyawan = karyawan::find($id);

        if ($karyawan->foto && Storage::disk('public')->exists($karyawan->foto)) {
            Storage::disk('public')->delete($karyawan->foto);
        }

        $karyawan->delete();

        karyawan::destroy($id);
        return redirect()->route('admin.tentang.karyawan.index');
    }
}
