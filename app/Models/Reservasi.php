<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasi';

    protected $fillable = [
        'tamu_id',
        'kamar_id',
        'tanggal_check_in',
        'tanggal_check_out',
        'total_harga',
        'status',
    ];

    public function tamu()
    {
        return $this->belongsTo(Tamu::class, 'tamu_id');
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'reservasi_id');
    }
}
