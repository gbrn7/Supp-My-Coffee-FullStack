<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //this line is import db function 

class pengirimanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengiriman')->insert([
            [
                'status' => 'On Process',
                'tanggal_pengiriman' => '2023-04-11',
                'id_transaksi' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'status' => 'On Process',
                'tanggal_pengiriman' => '2023-05-05',
                'id_transaksi' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'status' => 'On Process',
                'tanggal_pengiriman' => '2025-05-08',
                'id_transaksi' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
