<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::where('status', 'completed')
                        ->with('orderItems.product')
                        ->latest()
                        ->get();

        $totalSalesAmount = $orders->sum('total_amount');

        // Anda bisa menambahkan filter tanggal di sini jika diperlukan
        // Contoh: if ($request->has('start_date') && $request->has('end_date')) {
        //     $orders = $orders->whereBetween('created_at', [$request->start_date, $request->end_date]);
        // }

        return view('sales.index', compact('orders', 'totalSalesAmount'));
    }
}
