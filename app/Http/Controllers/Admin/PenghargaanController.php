<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\penghargaan;

class PenghargaanController extends Controller
{
    public function index()
    {
        $penghargaan = penghargaan::all();
        return view('admin.tentang.penghargaan.index', compact('penghargaan'));
    }

    public function create()
    {
        return view('admin.tentang.penghargaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tahun' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('penghargaan', 'public');
        }

        penghargaan::create([
            'nama' => $request->nama,
            'tahun' => $request->tahun,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto ?? null,
        ]);

        return redirect()->route('admin.tentang.penghargaan.index')
            ->with('success', 'penghargaan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $penghargaan = penghargaan::find($id);
        return view('admin.tentang.penghargaan.edit', compact('penghargaan'));
    }

    public function update(Request $request, $id)
    {
        $penghargaan = penghargaan::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required',
            'tahun' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($penghargaan->foto && Storage::disk('public')->exists($penghargaan->foto)) {
                Storage::disk('public')->delete($penghargaan->foto);
            }

            $validated['foto'] = $request->file('foto')->store('penghargaan', 'public');
        }


        $penghargaan->update($validated);

        return redirect()->route('admin.tentang.penghargaan.index')
            ->with('success', 'penghargaan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $penghargaan = penghargaan::find($id);

        if ($penghargaan->foto && Storage::disk('public')->exists($penghargaan->foto)) {
            Storage::disk('public')->delete($penghargaan->foto);
        }

        $penghargaan->delete();

        return redirect()->route('admin.tentang.penghargaan.index')
            ->with('success', 'penghargaan berhasil dihapus!');
    }
}
