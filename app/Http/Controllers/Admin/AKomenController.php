<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\komen;
use App\Models\komen_admin;

class AKomenController extends Controller
{
    public function index()
    {
        $komen = komen::with('balasan')
            ->latest()
            ->get();

        return view('admin.komen.index', compact('komen'));
    }

    public function balas($id)
    {
        $komen = komen::findOrFail($id);
        $komen_admin = komen_admin::where('komen_id', $id)->first();

        return view('admin.komen.edit', compact('komen', 'komen_admin'));
    }

    public function storeBalasan(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'balasan' => 'required',
        ]);

        komen_admin::updateOrCreate(
            ['komen_id' => $id],
            [
                'nama' => $request->nama,
                'balasan' => $request->balasan,
            ]
        );

        return redirect()->route('komen.index')
            ->with('success', 'Balasan berhasil disimpan!');
    }

    public function destroy($id)
    {
        komen_admin::where('komen_id', $id)->delete();
        komen::destroy($id);

        return redirect()->route('komen.index')
            ->with('success', 'Komentar berhasil dihapus!');
    }
}
