<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailPenerimaan extends Model
{
    protected $table='detail_penerimaan';
    // use SoftDeletes;

    public function add(){
        
    }

    public function penerimaan(){
        return $this->belongsTo(Penerimaan::class, 'ID_TERIMA');
    }

    public function barang(){
        return $this->belongsTo(Barang::class, 'KODE_BARANG');
    }
}
