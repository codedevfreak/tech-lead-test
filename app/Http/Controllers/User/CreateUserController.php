<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class CreateUserController extends Controller
{
    /**
     * Membuat pengguna baru.
     *
     * Endpoint: POST /api/users
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'name' => 'required|string|min:3|max:50',
        ]);

        // Membuat pengguna baru
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
        ]);

        // Mengembalikan respons JSON
        return response()->json([
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->name,
            'created_at' => $user->created_at,
        ], 201);
    }
}
