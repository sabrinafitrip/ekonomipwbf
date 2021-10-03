<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KotaController extends Controller
{
    public function index(){
        //ambil data dari table kota
        $kota = DB::table('kota')->get();

        //mengirim data ke view kota
        return view('kota', [
            'data' => $kota
        ]);
    }
}
