<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penerimaan;
use App\Models\detailPenerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class detailPenerimaanController extends Controller
{
    public function index(){

        //ambil data dari table penerimaan
        $detail_penerimaan = DB::table('detail_penerimaan')->where('DELETED_AT',null)->paginate(5);

        //mengirim data ke view penerimaan
        return view('detailPenerimaan.index', [
            'data' => $detail_penerimaan
        ]);
    }

    public function create(){

        $barangs= Barang::all();
        $penerimaans= Penerimaan::all();
        return view('detailPenerimaan.create', compact('barangs','penerimaans'));
    }

    public function store(Request $request){
        $detail_penerimaan = new detailPenerimaan;
        $detail_penerimaan->ID_TERIMA = $request->id_terima;
        $detail_penerimaan->KODE_BARANG = $request->kode_barang;
        $detail_penerimaan->HARGA_HIS = $request->harga_his;
        $detail_penerimaan->JUMLAH_HIS = $request->jumlah_his;
        $detail_penerimaan->SUBTOTAL = $request->subtotal;


        if($detail_penerimaan->save()){
            echo "
            <script>
                alert('Data detail penerimaan berhasil ditambahkan');
                document.location.href='/detailPenerimaan/index/{ID_TERIMA}'
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Data detail penerimaan gagal ditambahkan');
                document.location.href='/detailPenerimaan/index/create/{ID_TERIMA}'
            </script>
            ";
            }
       }


    public function show($ID_TERIMA)
    {
        //
    }

    public function edit($id){
        // mengambil data detail pemesanan berdasarkan id yang dipilih
        $detail_penerimaan = DB::table('detail_penerimaan')->where('ID_TERIMA',$id)->get(); 

        // passing data detail pemesanan yang didapat ke view edit.blade.php 
        return view('detailPenerimaan.edit', ['detail_pemesanan' => $detail_penerimaan]);


    }      

    public function update(Request $request){
        // update data detail penerimaan
        DB::table('detail_penerimaan')->where('ID_TERIMA',$request->id)->update([
            'ID_TERIMA' => $request->id_terima,
            'KODE_BARANG' => $request->kode_barang,
            'HARGA_HIS' => $request->harga_his,
            'JUMLAH_HIS' => $request->jumlah_his,
            'SUBTOTAL' => $request->subtotal,
        ]);

        // alihkan halaman ke halaman detail penerimaan
        // return redirect('/penerimaan');
        return redirect('detail_penerimaan')->with('status', 'Data detail penerimaan berhasil diupdate!');
        }


    public function delete($id){
        // menghapus data barang berdasarkan id yang dipilih
        DB::table('detail_penerimaan')->where('ID_TERIMA',$id)->delete();
        
        // alihkan halaman ke halaman detail penerimaan
        // return redirect('/penerimaan');
        return redirect('detailPenerimaan/index/{ID_TERIMA}')->with('status', 'Data detail penerimaan berhasil dihapus!');
        }


}
