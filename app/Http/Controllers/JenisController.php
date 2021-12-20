<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jenis;


class JenisController extends Controller
{
    public function index(){
        //ambil data dari table jenisbarang
        $jenis_barang = DB::table('jenis_barang')->where('DELETED_AT',null)->paginate(5);

        //mengirim data ke view jenisbarang
        return view('jenisbarang.jenis', [
            'data' => $jenis_barang
        ]);
    }

    public function cetak(){
        //ambil data dari table jenis barang
        $cetakJenis = DB::table('jenis_barang')->where('DELETED_AT',null)->get();

        //mengirim data ke view jenis barang
        return view('jenisbarang.cetakjenis', [
            'data' => $cetakJenis
        ]);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table supplier sesuai pencarian data
		$jenis_barang = DB::table('jenis_barang')
		->where('JENIS_BARANG','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data supplier ke view index
		return view('jenisbarang.jenis',['data' => $jenis_barang]);
 
	}

    public function add(){
        return view('jenisbarang.addjenis');
    }

    public function store(Request $request){
        $jenis_barang = new Jenis; 
        $jenis_barang->ID_JB = $request->id_jb;
        $jenis_barang->JENIS_BARANG = $request->jenis_barang;

        if($jenis_barang->save()){
            echo "
            <script>
                alert('Jenis barang berhasil ditambahkan');
                document.location.href='/jenisbarang'
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Jenis barang gagal ditambahkan');
                document.location.href='/addjenis'
            </script>
            ";
        }
    }

    public function edit($id){
        // mengambil data jenis barang berdasarkan id yang dipilih
        $jenis_barang = DB::table('jenis_barang')->where('ID_JB',$id)->get(); 
    
        // passing data jenis barang yang didapat ke view edit.blade.php 
        return view('jenisbarang.editjenis',['jenis_barang' => $jenis_barang]);
    } 

    public function update(Request $request){
        // update data jenis barang
        DB::table('jenis_barang')->where('ID_JB',$request->id)->update([
            'JENIS_BARANG' => $request->jenis_barang,
        ]);

        // alihkan halaman ke halaman jenis barang
        // return redirect('/jenisbarang');
        return redirect('jenisbarang')->with('status', 'Jenis barang berhasil diupdate!');
        }

    // public function delete($id){
    //     // menghapus data jenis barang berdasarkan id yang dipilih
    //     DB::table('jenis_barang')->where('ID_JB',$id)->delete();
        
    //     // alihkan halaman ke halaman jenis barang
    //     // return redirect('/jenisbarang');
    //     return redirect('jenisbarang')->with('status', 'Jenis barang berhasil dihapus!');
    //     }    

    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('jenis_barang')->where('ID_JB',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
        
    	return redirect('/jenisbarang');
        
    }

    public function trash(){
        $jenis_barang = Jenis::onlyTrashed()->get();
        return view('jenisbarang.trashjenis', ['data' => $jenis_barang]);
    }

    public function restore($id=null){
        if($id != null){
            $jenis_barang = Jenis::onlyTrashed()->where('ID_JB',$id)->restore();
        } else{
            $jenis_barang = Jenis::onlyTrashed()->restore();
        }
        return redirect('/jenisbarang/trashjenis')->with('status','jenis barang berhasil di restore');
    }

    public function delete($id=null){
        if($id != null){
            $jenis_barang = Jenis::onlyTrashed()->where('ID_JB',$id)->forceDelete();
        } else{
            $jenis_barang = Jenis::onlyTrashed()->forceDelete();
        }
        return redirect('/jenisbarang/trashjenis')->with('status','jenis barang berhasil di hapus permanen');
    }
    
    
}
