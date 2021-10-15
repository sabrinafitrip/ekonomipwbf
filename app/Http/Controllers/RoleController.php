<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(){
        //ambil data dari table role
        $role = DB::table('role')->get();

        //mengirim data ke view role
        return view('datarole.role', [
            'data' => $role
        ]);
    }

    public function add(){
        return view('datarole.addrole');
    }

}
