<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table='barang';

    public function add(){
        
    }

    public function barang(){
        return $this->belongsTo('App\Models\Barang');
    } 
}
