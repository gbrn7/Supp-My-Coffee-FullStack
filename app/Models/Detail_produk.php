<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_produk extends Model
{
    use HasFactory;

    protected $table = 'detail_produk';

    protected $fillable = ([
        'id_pengiriman',
        'id_produk',
        'qty',
    ]);

    public function pengiriman(){
        return $this->belongsTo(Pengiriman::class);
    }
    
    public function produk(){
        return $this->belongsTo(Produk::class);
    }

}
