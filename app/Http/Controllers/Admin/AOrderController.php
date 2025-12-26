<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;

class AOrderController extends Controller
{
    public function index()
    {
        $orders = order::latest()->get();
        return view('admin.order.index', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,selesai'
        ]);

        $order = order::findOrFail($id);
        $order->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status order diperbarui');
    }

    public function destroy($id)
    {
        order::destroy($id);
        return back()->with('success', 'Order dihapus');
    }
}
