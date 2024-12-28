<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Namespace yang benar
use App\Models\User;
use App\Models\Order;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk menambahkan data dummy ke database.
     *
     * @return void
     */
    public function run()
    {
        // Nonaktifkan foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Kosongkan tabel orders dan users
        DB::table('orders')->truncate();
        DB::table('users')->truncate();

        // Tambahkan pengguna pertama
        $user1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Tambahkan pesanan untuk pengguna pertama
        Order::create(['user_id' => $user1->id, 'total' => 50.00]);
        Order::create(['user_id' => $user1->id, 'total' => 70.00]);
        Order::create(['user_id' => $user1->id, 'total' => 30.50]);

        // Aktifkan kembali foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
