<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class supplier extends Model
{
    // use HasFactory;
    protected $table = 'supplier';
    use SoftDeletes;

    public function add(){
        
    }

    // public function supplier(){
    //     return $this->belongsTo('App\Supplier');
    // }

    public function kota(){
        return $this->belongsTo(kota::class);
    }

    
}
