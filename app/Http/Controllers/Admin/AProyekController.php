<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\proyek;

class AProyekController extends Controller
{
    public function index() // ADMIN
    {
        $proyek = proyek::all();
        return view('admin.proyek.index', compact('proyek'));
    }

    public function create()
    {
        return view('admin.proyek.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaproyek' => 'required',
            'kategoriproyek' => 'required',
            'jenisproyek' => 'required',
            'lokasi' => 'required',
            'klien' => 'required',
            'tanggalmulai' => 'required|date',
            'tanggalselesai' => 'required|date',
            'status' => 'required',
            'deskripsi' => 'required',
            'gambarproyek' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->hasFile('gambarproyek')) {
            $gambarproyek = $request->file('gambarproyek')->store('gambarproyek', 'public');
        }

        proyek::create([
            'namaproyek' => $request->namaproyek,
            'kategoriproyek' => $request->kategoriproyek,
            'jenisproyek' => $request->jenisproyek,
            'lokasi' => $request->lokasi,
            'klien' => $request->klien,
            'tanggalmulai' => $request->tanggalmulai,
            'tanggalselesai' => $request->tanggalselesai,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
            'gambarproyek' => $gambarproyek ?? null,
        ]);

        return redirect()->route('proyek.index')
            ->with('success', 'proyek berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $proyek = proyek::find($id);
        return view('admin.proyek.edit', compact('proyek'));
    }

    public function update(Request $request, $id)
    {
        $proyek = proyek::findOrFail($id);

        $validated = $request->validate([
            'namaproyek' => 'required',
            'kategoriproyek' => 'required',
            'jenisproyek' => 'required',
            'lokasi' => 'required',
            'klien' => 'required',
            'tanggalmulai' => 'required|date',
            'tanggalselesai' => 'required|date',
            'status' => 'required',
            'deskripsi' => 'required',
            'gambarproyek' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->hasFile('gambarproyek')) {
            if ($proyek->gambarproyek && Storage::disk('public')->exists($proyek->gambarproyek)) {
                Storage::disk('public')->delete($proyek->gambarproyek);
            }

            $validated['gambarproyek'] = $request->file('gambarproyek')->store('gambarproyek', 'public');
        }

        $proyek->update($validated);

        return redirect()->route('proyek.index')
            ->with('success', 'proyek berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $proyek = proyek::find($id);

        if ($proyek->gambarproyek && Storage::disk('public')->exists($proyek->gambarproyek)) {
            Storage::disk('public')->delete($proyek->gambarproyek);
        }

        $proyek->delete();

        return redirect()->route('proyek.index')
            ->with('success', 'proyek berhasil dihapus!');
    }

    public function grafik()
    {
        $proyek = proyek::select(
            'kategoriproyek',
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('kategoriproyek')
            ->get();

        return view('proyek.grafik', compact('data'));
    }
}
