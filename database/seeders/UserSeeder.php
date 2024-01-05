<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

  

        $user = [
            'email' => 'uydevp@gmail.com',
            'password' => Hash::make('123456'),
            'name' => 'Uğurcan Yaş',
            ];

        DB::table('users')->insert($user);
    }
}
