<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detailBarang extends Model
{
    // use HasFactory;
    // protected $table = 'detail_barang';
    // protected $fillable = ['kode_barang','id_warna','id_ukuran'];

    // public function Barang()
    // {
	// return $this->belongsTo('App\Models\Barang','kode_barang','id');
    // }

    // public function Warna()
    // {
	// return $this->belongsTo('App\Models\Warna','id_warna','id');
    // }
    
    // public function Ukuran()
    // {
	// return $this->belongsTo('App\Models\Barang','id_ukuran','id');
    // }


    protected $table='detail_barang';
    use SoftDeletes;

    public function add(){
        
    }

    // public function pemesanan(){
    //     return $this->belongsTo('App\Models\Pemesanan');
    // } 

    public function warna(){
        return $this->belongsTo(warna::class, 'ID_WARNA');
    }

    public function ukuran(){
        return $this->belongsTo(ukuran::class, 'ID_UKURAN');
    }

    public function barang(){
        return $this->belongsTo(barang::class, 'KODE_BARANG');
    }

}
