<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //this line is import db function 


class detailProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_produk')->insert([
            [
                'id_pengiriman' => 1,
                'id_produk' => 1,
                'qty' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_pengiriman' => 1,
                'id_produk' => 2,
                'qty' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_pengiriman' => 2,
                'id_produk' => 1,
                'qty' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_pengiriman' => 2,
                'id_produk' => 2,
                'qty' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_pengiriman' => 3,
                'id_produk' => 1,
                'qty' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
