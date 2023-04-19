<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //this line is import db function 

class produkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produk')->insert([
            [
            'nama_produk' => 'Kopi Robusta Gayo Monero Robusta Coffee 250g - Biji Kopi',
            'harga' => 40000,
            'desc' => 'kopi robusta cek 2345',
            'status' => 'draft',
            'berat'  => 250,
            'produk_thumbnail' => 'y8VPGIz1jYp-1.jpg',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
            'nama_produk' => 'Kopi Robusta Gayo Monero Robusta Coffee 500g - Biji Kopi',
            'harga' => 50000,
            'desc' => 'kopi robusta cek 222222',
            'status' => 'publish',
            'berat'  => 250,
            'produk_thumbnail' => 'Gz9rCZYjPgp-2.jpg',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
            'nama_produk' => 'Kopi Arabika Gayo Monero Robusta Coffee 250g - Biji Kopi',
            'harga' => 56000,
            'desc' => 'kopi robusta cek 333365656',
            'status' => 'publish',
            'berat'  => 500,
            'produk_thumbnail' => 'h8vwjIDGqSp-3.jpg',
            'created_at' => now(),
            'updated_at' => now()
            ],
        ]);
    }
}
