<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'user_type' => 'admin',
            'password' => Hash::make('12345678'),
            'photo' => 'admin.jpg',
            'phone' => '1234567890',
            'dob' => '2000-01-01',
            'gender' => 'male',
        ]);
    }
}
