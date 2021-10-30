<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Jenis;

class BarangController extends Controller
{
    public function index(){
        //ambil data dari table barang
        $barang = DB::table('barang')->where('DELETED_AT',null)->get();

        //mengirim data ke view barang
        return view('databarang.barang', [
            'data' => $barang
        ]);

    }

    public function add(){
        $jenis_barangs= Jenis::all();
        return view('databarang.addbarang', compact('jenis_barangs'));
    }

    public function store(Request $request){
        $barang = new Barang;
        $barang->KODE_BARANG = $request->kode_barang;
        $barang->NAMA_BARANG = $request->nama_barang;
        $barang->ID_JB = $request->id_jb;
        $barang->STOCK_BARANG = $request->stock_barang;
        $barang->HARGA_BELI_BARANG = $request->harga_beli_barang;
        $barang->HARGA_JUAL_BARANG = $request->harga_jual_barang;

        if($barang->save()){
            echo "
            <script>
                alert('Data barang berhasil ditambahkan');
                document.location.href='/barang'
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Data barang gagal ditambahkan');
                document.location.href='/addbarang'
            </script>
            ";
            }
       }

       public function edit($id){
        // mengambil data barang berdasarkan id yang dipilih
        $barang = DB::table('barang')->where('KODE_BARANG',$id)->get(); 

        // $jenis_barangs= Jenis::all();
        // return view('databarang.editbarang', compact('jenis_barangs'));

        // passing data barang yang didapat ke view edit.blade.php 
        // return view('databarang.editbarang',compact('jenis_barangs'), ['barang' => $barang]);
        return view('databarang.editbarang', ['barang' => $barang]);


    }      

    public function update(Request $request){
        // update data barang
        DB::table('barang')->where('KODE_BARANG',$request->id)->update([
            'NAMA_BARANG' => $request->nama_barang,
            // 'ID_JB' => $request->id_jb,
            'STOCK_BARANG' => $request->stock_barang,
            'HARGA_BELI_BARANG' => $request->harga_beli_barang,
            'HARGA_JUAL_BARANG' => $request->harga_jual_barang,
        ]);

        // alihkan halaman ke halaman barang
        // return redirect('/barang');
        return redirect('barang')->with('status', 'Data barang berhasil diupdate!');
        }

    public function delete($id){
        // menghapus data barang berdasarkan id yang dipilih
        DB::table('barang')->where('KODE_BARANG',$id)->delete();
        
        // alihkan halaman ke halaman barang
        // return redirect('/barang');
        return redirect('barang')->with('status', 'Data barang berhasil dihapus!');
        }

    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('barang')->where('KODE_BARANG',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
            ]);
            
        return redirect('/barang');
            
        }

}
