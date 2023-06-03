<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = ([
        'user_id',
        'alamat',
        'total',
        'ekspedisi',
        'transaction_code',
        'status_pembayaran'
    ]);

    public function user(){
        return $this->belongsTo(User::class);
    }
}
