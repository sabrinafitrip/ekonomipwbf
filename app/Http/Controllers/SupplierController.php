<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function index(){
        //ambil data dari table supplier
        $supplier = DB::table('supplier')->get();

        //mengirim data ke view supplier
        return view('supplier', [
            'data' => $supplier 
        ]);
    }
}
