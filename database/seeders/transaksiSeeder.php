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
                'ekspedisi' => 'tiki Rp.26000',
                'transaction_code' => 'FGYT56',
                'status_pembayaran' => 'success',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => '2',
                'alamat' => 'Madiun',
                'ekspedisi' => 'jne Rp.36000',
                'transaction_code' => 'GHJTU9',
                'status_pembayaran' => 'success',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
