<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Historystock extends Model
{
    protected $table='history_stock';
    use SoftDeletes;

    public function add(){
        
    }

    // public function historystock(){
    //      return $this->belongsTo('App\Historystock');
    // }

    public function barang(){
        return $this->belongsTo(Barang::class, 'KODE_BARANG');
    }
    
}
