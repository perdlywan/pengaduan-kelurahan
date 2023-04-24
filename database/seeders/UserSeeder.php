<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'nik'  => '1111111111111111',
                'nama' => 'imam hidayat',
                'username' => 'imam',
                'email' => 'imam@gmail.com',
                'password' => Hash::make('12345678'),
                'telp' => '02112345678',
                'level' => 'masyarakat',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'nik'  => '2222222222222222',
                'nama' => 'budi',
                'username' => 'budi',
                'email' => 'budi@gmail.com',
                'password' => Hash::make('12345678'),
                'telp' => '02112345678',
                'level' => 'masyarakat',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'nik'  => '3333333333333333',
                'nama' => 'admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'telp' => '02112345678',
                'level' => 'admin',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'nik'  => '4444444444444444',
                'nama' => 'staff',
                'username' => 'staff',
                'email' => 'staff@gmail.com',
                'password' => Hash::make('12345678'),
                'telp' => '02112345678',
                'level' => 'staff',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
        ];

        User::insert($user);
    }
}
