<?php

namespace Database\Seeders;
use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            ##type kamar 3
            [
               'nama' => 'user',
               'email' => 'user@gmail.com',
               'password' => Hash::make('susah123')

            ],
            [
               'nama' => 'admin',
               'email' => 'admin@gmail.com',
               'is_admin' => '2',
               'password' => Hash::make('susah123')

            ],
            [
               'nama' => 'resep',
               'email' => 'resep@gmail.com',
               'is_admin' => '1',
               'password' => Hash::make('susah123')

            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
