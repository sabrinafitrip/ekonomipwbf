<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kota extends Model
{
    protected $table = 'kota';
    use SoftDeletes;
    
    public function add(){
        
    }

    public function pegawai(){
        return $this->hasMany(supplier::class);
    } 


}
