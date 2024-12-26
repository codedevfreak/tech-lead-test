<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartialUpdateUserController extends Controller
{
    /**
     * Mengupdate sebagian data pengguna berdasarkan ID.
     *
     * Endpoint: PATCH /api/users/{id}
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'sometimes|min:8',
            'name' => 'sometimes|string|min:3|max:50',
        ]);

        // Cari pengguna berdasarkan ID
        $user = User::find($id);

        // Jika pengguna tidak ditemukan, kembalikan error
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Update data pengguna hanya jika input tersedia
        if ($request->has('email')) {
            $user->email = $request->email;
        }

        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->has('name')) {
            $user->name = $request->name;
        }

        // Simpan perubahan ke database
        $user->save();

        // Kembalikan respons JSON
        return response()->json([
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->name,
            'updated_at' => $user->updated_at,
        ]);
    }
}
