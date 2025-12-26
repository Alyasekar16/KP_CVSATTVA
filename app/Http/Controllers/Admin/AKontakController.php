<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\kontak;

class AKontakController extends Controller
{
    public function index()
    {
        $kontak = kontak::all();
        return view('admin.kontak.index', compact('kontak'));
    }

    public function create()
    {
        return view('kontak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kantor' => 'required',
            'notelepon' => 'required',
            'email' => 'required|email',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('kontak', 'public');
        }

        kontak::create([
            'kantor' => $request->kantor,
            'notelepon' => $request->notelepon,
            'email' => $request->email,
            'foto' => $foto ?? null,
        ]);

        return redirect()->route('kontak.index')
            ->with('success', 'Kontak berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kontak = kontak::findOrFail($id);
        return view('admin.kontak.edit', compact('kontak'));
    }

    public function update(Request $request, $id)
    {
        $kontak = kontak::findOrFail($id);

        $validated = $request->validate([
            'kantor' => 'required',
            'notelepon' => 'required',
            'email' => 'required|email',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($kontak->foto && Storage::disk('public')->exists($kontak->foto)) {
                Storage::disk('public')->delete($kontak->foto);
            }
            $validated['foto'] = $request->file('foto')->store('kontak', 'public');
        }

        $kontak->update($validated);

        return redirect()->route('kontak.index')
            ->with('success', 'Kontak berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kontak = kontak::findOrFail($id);

        if ($kontak->foto && Storage::disk('public')->exists($kontak->foto)) {
            Storage::disk('public')->delete($kontak->foto);
        }

        $kontak->delete();

        return redirect()->route('kontak.index')
            ->with('success', 'Kontak berhasil dihapus!');
    }
}
