<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Penerimaan extends Model
{
    protected $table='penerimaan';
    use SoftDeletes;

    public function add(){
        
    }

    // public function penerimaan(){
    //     return $this->belongsTo('App\Models\Penerimaan');
    // } 

    public function supplier(){
        return $this->belongsTo(supplier::class, 'ID_SUP');
    }

    public function userr(){
        return $this->belongsTo(userr::class, 'ID_USER');
    }
}
