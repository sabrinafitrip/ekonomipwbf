<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Penerimaan;


class TerimaController extends Controller
{
    public function index(){
        //ambil data dari table penerimaan
        $penerimaan = DB::table('penerimaan')->get();

        //mengirim data ke view penerimaan
        return view('dataterima.penerimaan', [
            'data' => $penerimaan
        ]);
    }

    public function add(){
        return view('dataterima.addterima');
    }

    public function store(Request $request){
        $penerimaan = new Penerimaan; 
        $penerimaan->ID_TERIMA = $request->id_terima;
        // $penerimaan->ID_USER = $request->id_user;
        $penerimaan->ID_SUP = $request->id_sup;
        $penerimaan->TGL_TERIMA = $request->tgl_terima;
        $penerimaan->TOTAL_HARGA = $request->total_harga;
        $penerimaan->STATUS_TERIMA = $request->status_terima;

        if($penerimaan->save()){
            echo "
            <script>
                alert('Data penerimaan berhasil ditambahkan');
                document.location.href='/penerimaan'
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Data penerimaan gagal ditambahkan');
                document.location.href='/addterima'
            </script>
            ";
        }
    }

}
