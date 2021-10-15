<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        //ambil data dari table user
        $user = DB::table('user')->get();

        //mengirim data ke view user
        return view('datauser.user', [
            'data' => $user
        ]);
    }

    public function add(){
        return view('datauser.adduser');
    }
}
