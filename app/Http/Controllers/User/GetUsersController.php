<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetUsersController extends Controller
{
    /**
     * Mengambil daftar pengguna.
     *
     * Endpoint: GET /api/users
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $query = User::query();

        // Filter berdasarkan nama atau email
        if ($search = $request->get('search')) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        }

        // Sorting (default: created_at)
        $sortBy = $request->get('sortBy', 'created_at');
        $query->orderBy($sortBy);

        // Pagination (10 data per halaman)
        $users = $query->paginate(10);

        // Mengembalikan respons JSON
        return response()->json($users);
    }
}
