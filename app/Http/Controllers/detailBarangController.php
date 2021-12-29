<?php

namespace App\Http\Controllers;

use App\Models\Ukuran;
use App\Models\Warna;
use App\Models\Barang;
use App\Models\detailBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class detailBarangController extends Controller
{
    public function index()
    {
        // $detbar = detailBarang::with(['Barang', 'Warna', 'Ukuran'])->get();
    
        // return view('detailBarang.index', [
        //     'title' => 'Detail Barang',
        //     'detbar' => $detbar,
        //     'detailbar' => detailBarang::where('kode_barang', $barang->KODE_BARANG)->with('Barang')->get(),
        //     'barang' => $barang,
        // ]);

        //ambil data dari table pemesanan
        $detail_barang = DB::table('detail_barang')->where('DELETED_AT',null)->paginate(5);

        //mengirim data ke view pemesanan
        return view('detailBarang.index', [
            'data' => $detail_barang
        ]);

    }

    public function create()
    {
        // $ukuran = Ukuran::all();
        // $warna = Warna::all();

        // return view('detailBarang.create', [
        //     'title' => 'Tambah Detail Pemesanan',
        //     'barang' => Barang::find($barang),
        //     'ukuran' => $ukuran,
        //     'warna' => $warna,
        // ]);

        $ukurans= Ukuran::all();
        $warnas= Warna::all();
        $barangs= Barang::all();
        return view('detailBarang.create', compact('ukurans','warnas','barangs'));
    }

    public function store(Request $request){
        $detail_barang = new detailBarang;
        $detail_barang->ID_WARNA = $request->id_warna;
        $detail_barang->ID_UKURAN = $request->id_ukuran;
        $detail_barang->KODE_BARANG = $request->kode_barang;

        if($detail_barang->save()){
            echo "
            <script>
                alert('Data detail barang berhasil ditambahkan');
                document.location.href='/detailBarang/index/{KODE_BARANG}'
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Data detail barang gagal ditambahkan');
                document.location.href='/detailBarang/index/create/{KODE_BARANG}'
            </script>
            ";
            }
       }


    public function show($KODE_BARANG)
    {
        //
    }

    public function edit($id){
        // mengambil data barang berdasarkan id yang dipilih
        $detail_barang = DB::table('detail_barang')->where('KODE_BARANG',$id)->get(); 

        // passing data barang yang didapat ke view edit.blade.php 
        // return view('databarang.editbarang',compact('jenis_barangs'), ['barang' => $barang]);
        return view('detailBarang.edit', ['detail_barang' => $detail_barang]);


    }      

    public function update(Request $request){
        // update data barang
        DB::table('detail_barang')->where('KODE_BARANG',$request->id)->update([
            'ID_WARNA' => $request->id_warna,
            'ID_UKURAN' => $request->id_ukuran,
            'KODE_BARANG' => $request->kode_barang,
            
        ]);

        // alihkan halaman ke halaman barang
        // return redirect('/barang');
        return redirect('detail_barang')->with('status', 'Data detail barang berhasil diupdate!');
        }


    public function delete($id){
        // menghapus data barang berdasarkan id yang dipilih
        DB::table('detail_barang')->where('KODE_BARANG',$id)->delete();
        
        // alihkan halaman ke halaman barang
        // return redirect('/pemesanan');
        return redirect('detailBarang/index/{KODE_BARANG}')->with('status', 'Data detail barang berhasil dihapus!');
        }


    // public function hapus($id){
    //     date_default_timezone_set('Asia/Jakarta');
    //     DB::table('detail_barang')->where('KODE_BARANG',$id)->update([
    //         'DELETED_AT' => date('Y-m-d H:i:s')
    //         ]);
            
    //     return redirect('index');
            
    //     }

        // public function trash(){
        //     $detail_barang = detailBarang::onlyTrashed()->get();
        //     return view('detailBarang.trash', ['data' => $detail_barang]);
        // }
    
        // public function restore($id=null){
        //     if($id != null){
        //         $detail_barang = detailBarang::onlyTrashed()->where('KODE_BARANG',$id)->restore();
        //     } else{
        //         $detail_barang = detailBarang::onlyTrashed()->restore();
        //     }
        //     return redirect('/detailBarang/trashdetbar')->with('status','data detail barang berhasil di restore');
        // }
    
        // public function delete($id=null){
        //     if($id != null){
        //         $detail_barang = detailBarang::onlyTrashed()->where('ID_PESAN',$id)->forceDelete();
        //     } else{
        //         $detail_barang = detailBarang::onlyTrashed()->forceDelete();
        //     }
        //     return redirect('/detailBarang/trashdetbar')->with('status','data detail barang berhasil di hapus permanen');
        // }    


}
