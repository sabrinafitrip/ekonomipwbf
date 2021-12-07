<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pemesanan;


class PesanController extends Controller
{
    public function index(){
        //ambil data dari table pemesanan
        $pemesanan = DB::table('pemesanan')->get();

        //mengirim data ke view pemesanan
        return view('datapesan.pemesanan', [
            'data' => $pemesanan
        ]);
    }

    public function add(){
        return view('datapesan.addpesan');
    }

    public function store(Request $request){
        $pemesanan = new Pemesanan; 
        $pemesanan->ID_PESAN = $request->id_pesan;
        $pemesanan->ID_SUP = $request->id_sup;
        // $pemesanan->ID_USER = $request->id_user;
        $pemesanan->TGL_PESAN = $request->tgl_pesan;
        $pemesanan->STATUS_PESAN = $request->status_pesan;

        if($pemesanan->save()){
            echo "
            <script>
                alert('Data pemesanan berhasil ditambahkan');
                document.location.href='/pemesanan'
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Data pemesanan gagal ditambahkan');
                document.location.href='/addpesan'
            </script>
            ";
        }
    }
}
