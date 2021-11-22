<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Warna;

class WarnaController extends Controller
{
    public function index(){
        //ambil data dari table warna
        $warna = DB::table('warna')->where('DELETED_AT',null)->paginate(5);

        //mengirim data ke view warna
        return view('datawarna.warna', [
            'data' => $warna
        ]);
    }

    public function cetak(){
        //ambil data dari table warna
        $cetakWarna = DB::table('warna')->where('DELETED_AT',null)->get();

        //mengirim data ke view warna
        return view('datawarna.cetakwarna', [
            'data' => $cetakWarna
        ]);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table supplier sesuai pencarian data
		$warna = DB::table('warna')
		->where('WARNA','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data supplier ke view index
		return view('datawarna.warna',['data' => $warna]);
 
	}

    public function add(){
        return view('datawarna.addwarna');
    }


    public function store(Request $request){
        $warna = new warna; 
        $warna->ID_WARNA = $request->id_warna;
        $warna->WARNA = $request->Warna;

        if($warna->save()){
            echo "
            <script>
                alert('Data warna berhasil ditambahkan');
                document.location.href='/warna'
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Data warna gagal ditambahkan');
                document.location.href='/addwarna'
            </script>
            ";
        }
    }

    public function edit($id){
        // mengambil data warna berdasarkan id yang dipilih
        $warna = DB::table('warna')->where('ID_WARNA',$id)->get(); 
    
        // passing data warna yang didapat ke view edit.blade.php 
        return view('datawarna.editwarna',['warna' => $warna]);
    } 

    public function update(Request $request){
        // update data warna
        DB::table('warna')->where('ID_WARNA',$request->id)->update([
            'WARNA' => $request->warna,
        ]);

        // alihkan halaman ke halaman warna
        // return redirect('/warna');
        return redirect('warna')->with('status', 'Data warna berhasil diupdate!');
        }

    // public function delete($id){
    //     // menghapus data warna berdasarkan id yang dipilih
    //     DB::table('warna')->where('ID_WARNA',$id)->delete();
    
    //     // alihkan halaman ke halaman warna
    //     // return redirect('/warna');
    //     return redirect('warna')->with('status', 'Data warna berhasil dihapus!');
    //     }
    

    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('warna')->where('ID_WARNA',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
        
    	return redirect('/warna');
        
    }

    public function trash(){
        $warna = Warna::onlyTrashed()->get();
        return view('datawarna.trashwarna', ['data' => $warna]);
    }

    public function restore($id=null){
        if($id != null){
            $warna = Warna::onlyTrashed()->where('ID_WARNA',$id)->restore();
        } else{
            $warna = Warna::onlyTrashed()->restore();
        }
        return redirect('/warna/trashwarna')->with('status','data warna berhasil di restore');
    }

    public function delete($id=null){
        if($id != null){
            $warna = Warna::onlyTrashed()->where('ID_WARNA',$id)->forceDelete();
        } else{
            $warna = Warna::onlyTrashed()->forceDelete();
        }
        return redirect('/warna/trashwarna')->with('status','data warna berhasil di hapus permanen');
    }

}

?>
