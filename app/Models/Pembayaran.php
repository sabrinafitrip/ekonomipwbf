<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembayaran extends Model
{
    protected $table='pembayaran';
    use SoftDeletes;

    public function add(){
        
    }

    // public function pembayaran(){
    //     return $this->belongsTo('App\Models\Pembayaran');
    // } 

    public function penerimaan(){
        return $this->belongsTo(Penerimaan::class, 'ID_TERIMA');
    }

    
}
