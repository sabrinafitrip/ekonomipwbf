<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    protected $table='barang';
    use SoftDeletes;

    public function add(){
        
    }

    public function barang(){
        return $this->belongsTo('App\Models\Barang');
    } 
}
