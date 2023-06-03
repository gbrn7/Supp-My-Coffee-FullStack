<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //this line is import db function 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Crypt;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
        [
            'nama' => 'Admin',
            'role' => 'admin',
            'email' => 'admin123@gmail.com',
            'password' => Crypt::encryptString('mantapjiwa'),
            'alamat' => 'Jl.Merpati No.07',
            'no_telp' => '085236987456',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'nama' => 'Firza',
            'role' => 'customer',
            'email' => 'member123@gmail.com',
            'password' => Hash::make('mantapjiwa'),
            'alamat' => 'Jl.Merpati No.07',
            'no_telp' => '014523697456',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'nama' => 'Super',
            'role' => 'superAdmin',
            'email' => 'super123@gmail.com',
            'password' => Crypt::encryptString('super123'),
            'alamat' => 'Jl.Merpati No.07',
            'no_telp' => '014523697456',
            'created_at' => now(),
            'updated_at' => now()
        ]
    ]);
    }
}
