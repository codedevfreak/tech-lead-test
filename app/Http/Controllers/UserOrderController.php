<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    /**
     * Mengambil dan menghitung pesanan pengguna.
     *
     * Endpoint: GET /api/users/{id}/orders
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserOrders($id)
    {
        // Ambil pengguna dan pesanan terkait
        $user = User::with('orders')->find($id);

        // Jika pengguna tidak ditemukan
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Hitung jumlah pesanan dan total nilai
        $totalOrders = $user->orders->count();
        $totalAmount = $user->orders->sum('total');

        // Kembalikan respons JSON
        return response()->json([
            'user' => $user->name,
            'email' => $user->email,
            'total_orders' => $totalOrders,
            'total_amount' => $totalAmount,
            'orders' => $user->orders, // Daftar pesanan
        ]);
    }
}
