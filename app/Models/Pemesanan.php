<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    use SoftDeletes;
    
    public function add(){
        
    }

    public function pemesanan(){
        return $this->belongsTo('App\Models\Pemesanan');
    } 
}
