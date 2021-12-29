<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pemesanan;
use App\Models\detailPemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class detailPemesananController extends Controller
{
    public function index(){

        // $pemesanan = DB::table('pemesanan')
        // ->where('pemesanan.DELETED_AT',null);

        // return view('detailPemesanan.index', [
        //     'title' => 'Detail Pemesanan',
        //     'detail_pemesanan' => detailPemesanan::where('ID_PESAN', $pemesanan->ID_PESAN)->with('Pemesanan')->get(),
        //     'pemesanan' => $pemesanan,
        // ]);

        //ambil data dari table pemesanan
        $detail_pemesanan = DB::table('detail_pemesanan')->where('DELETED_AT',null)->paginate(5);

        //mengirim data ke view pemesanan
        return view('detailPemesanan.index', [
            'data' => $detail_pemesanan
        ]);
    }

    public function create(){
        // return view('detailPemesanan.create', [
        //     'title' => 'Tambah Detail Pemesanan',
        //     'pemesanan' => Pemesanan::find($ID_PESAN),
        //     'barang' => Barang::all(),
        // ]);

        $barangs= Barang::all();
        $pemesanans= Pemesanan::all();
        return view('detailPemesanan.create', compact('barangs','pemesanans'));
    }

    public function store(Request $request){
        $detail_pemesanan = new detailPemesanan;
        $detail_pemesanan->ID_PESAN = $request->id_pesan;
        $detail_pemesanan->KODE_BARANG = $request->kode_barang;
        $detail_pemesanan->JUMLAH_UP = $request->jumlah_up;
        $detail_pemesanan->HARGA_UP = $request->harga_up;


        if($detail_pemesanan->save()){
            echo "
            <script>
                alert('Data detail pemesanan berhasil ditambahkan');
                document.location.href='/detailPemesanan/index/{ID_PESAN}'
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Data detail pemesanan gagal ditambahkan');
                document.location.href='/detailPemesanan/index/create/{ID_PESAN}'
            </script>
            ";
            }
       }


    public function show($ID_PESAN)
    {
        //
    }

    public function edit($id){
        // mengambil data detail pemesanan berdasarkan id yang dipilih
        $detail_pemesanan = DB::table('detail_pemesanan')->where('ID_PESAN',$id)->get(); 

        // passing data detail pemesanan yang didapat ke view edit.blade.php 
        return view('detailPemesanan.edit', ['detail_pemesanan' => $detail_pemesanan]);


    }      

    public function update(Request $request){
        // update data detail pemesanan
        DB::table('detail_pemesanan')->where('ID_PESAN',$request->id)->update([
            'ID_PESAN' => $request->id_pesan,
            'KODE_BARANG' => $request->kode_barang,
            'JUMLAH_UP' => $request->jumlah_up,
            'HARGA_UP' => $request->harga_up,
        ]);

        // alihkan halaman ke halaman barang
        // return redirect('/barang');
        return redirect('detail_pemesanan')->with('status', 'Data detail pemesanan berhasil diupdate!');
        }


    public function delete($id){
        // menghapus data barang berdasarkan id yang dipilih
        DB::table('detail_pemesanan')->where('ID_PESAN',$id)->delete();
        
        // alihkan halaman ke halaman barang
        // return redirect('/pemesanan');
        return redirect('detailPemesanan/index/{ID_PESAN}')->with('status', 'Data detail barang berhasil dihapus!');
        }

}
