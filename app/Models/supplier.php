<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $table = 'supplier';

    public function add(){
        
    }

    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }
}
