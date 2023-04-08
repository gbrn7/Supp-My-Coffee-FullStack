<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengiriman extends Model
{
    use HasFactory;
    
    protected $table = 'pengiriman';

    protected $fillable = ([
        'status',
        'tanggal_pengiriman',
        'id_transaksi',
    ]);

    public function transaksi(){
        return $this->belongsTo(Transaksi::class);
    }
}
