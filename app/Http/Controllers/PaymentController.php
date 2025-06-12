<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong. Silakan tambahkan produk sebelum checkout.');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('payment.index', compact('cart', 'total'));
    }

    public function processPayment(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong. Pembayaran tidak dapat diproses.');
        }

        DB::beginTransaction();
        try {
            $totalAmount = 0;
            foreach ($cart as $item) {
                $totalAmount += $item['price'] * $item['quantity'];
            }

            $order = Order::create([
                'user_id' => Auth::id(), // Akan null jika tidak ada user yang login
                'total_amount' => $totalAmount,
                'status' => 'completed',
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            session()->forget('cart'); // Kosongkan keranjang setelah pembayaran

            DB::commit();
            return redirect()->route('payment.success')->with('success', 'Pembayaran berhasil! Pesanan Anda sedang diproses.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses pembayaran: ' . $e->getMessage());
        }
    }

    public function success()
    {
        return view('payment.success');
    }
}
