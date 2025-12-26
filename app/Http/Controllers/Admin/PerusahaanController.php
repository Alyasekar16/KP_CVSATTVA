<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\perusahaan;


class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = perusahaan::all();
        return view('admin.tentang.perusahaan.index', compact('perusahaan'));
    }

    public function create()
    {
        return view('admin.tentang.perusahaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'visimisi' => 'required',
            'sejarah' => 'required',
            'maknalogo' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('perusahaan', 'public');
        }

        perusahaan::create([
            'visimisi' => $request->visimisi,
            'sejarah' => $request->sejarah,
            'maknalogo' => $request->maknalogo,
            'foto' => $foto ?? null,
        ]);

        return redirect()->route('admin.tentang.perusahaan.index')
            ->with('success', 'Perusahaan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $perusahaan = perusahaan::find($id);
        return view('admin.tentang.perusahaan.edit', compact('perusahaan'));
    }

    public function update(Request $request, $id)
    {
        $perusahaan = perusahaan::find($id);

        $validated = $request->validate([
            'visimisi' => 'required',
            'sejarah' => 'required',
            'maknalogo' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($perusahaan->foto && Storage::disk('public')->exists($perusahaan->foto)) {
                Storage::disk('public')->delete($perusahaan->foto);
            }

            $validated['foto'] = $request->file('foto')->store('perusahaan', 'public');
        }

        $perusahaan->update($validated);

        return redirect()->route('admin.tentang.perusahaan.index')
            ->with('success', 'Perusahaan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $perusahaan = perusahaan::find($id);

        if ($perusahaan->foto && Storage::disk('public')->exists($perusahaan->foto)) {
            Storage::disk('public')->delete($perusahaan->foto);
        }

        $perusahaan->update();

        return redirect()->route('admin.tentang.perusahaan.index')
            ->with('success', 'Perusahaan berhasil diperbarui!');
    }
}
