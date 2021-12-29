<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class detailPemesanan extends Model
{
    protected $table='detail_pemesanan';
    // use SoftDeletes;

    public function add(){
        
    }

    public function pemesanan(){
        return $this->belongsTo(Pemesanan::class, 'ID_PESAN');
    }

    public function barang(){
        return $this->belongsTo(Barang::class, 'KODE_BARANG');
    }


}
