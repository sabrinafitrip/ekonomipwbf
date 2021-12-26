<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userr extends Model
{
    protected $table = 'user';
    protected $fillable = ['ID_USER','ID_KOTA','ID_ROLE','NAMA_USER','ALAMAT_USER','TELP_USER',
    'USERNAME','EMAIL','PASSWORD','users_id'];

    public function add(){
        
    }

    // public function userr(){
    //     return $this->belongsTo('App\Userr');
    // }

    public function kota(){
        return $this->belongsTo(kota::class, 'ID_KOTA');
    }

    public function role(){
        return $this->belongsTo(Role::class, 'ID_ROLE');
    }


}
