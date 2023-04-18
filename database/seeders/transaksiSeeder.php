<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class transaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaksi')->insert([
            [
                'user_id' => '2',
                'alamat' => 'kepanjen',
                'transaction_code' => 'FGYT56',
                'status_pembayaran' => 'SUCCESS',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => '2',
                'alamat' => 'Madiun',
                'transaction_code' => 'GHJTU9',
                'status_pembayaran' => 'SUCCESS',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
