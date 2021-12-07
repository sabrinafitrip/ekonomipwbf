<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pembayaran;

class BayarController extends Controller
{
    public function index(){
        //ambil data dari table pembayaran
        $pembayaran = DB::table('pembayaran')->get();

        //mengirim data ke view pembayaran
        return view('databayar.pembayaran', [
            'data' => $pembayaran
        ]);
    }

    public function add(){
        return view('databayar.addbayar');
    }

    public function store(Request $request){
        $pembayaran = new Pembayaran; 
        $pembayaran->ID_BAYAR = $request->id_bayar;
        $pembayaran->ID_TERIMA = $request->id_terima;
        $pembayaran->TGL_BAYAR = $request->tgl_bayar;
        $pembayaran->TOTAL_BAYAR = $request->total_bayar;

        if($pembayaran->save()){
            echo "
            <script>
                alert('Data pembayaran berhasil ditambahkan');
                document.location.href='/pembayaran'
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Data pembayaran gagal ditambahkan');
                document.location.href='/addterima'
            </script>
            ";
        }
    }
}
