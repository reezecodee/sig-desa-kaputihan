<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        User::create([
            'nama' => 'Admin Desa Kaputihan',
            'email' => 'admindesa@gmail.com',
            'telepon' => '0812345678910',
            'alamat' => 'Jl. Kaputihan, Desa Kaputihan',
            'password' => bcrypt('12345678'),
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
    }
}
