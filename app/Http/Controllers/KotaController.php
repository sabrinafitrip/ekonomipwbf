<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kota;


class KotaController extends Controller
{
    public function index(){
        //ambil data dari table kota
        $kota = DB::table('kota')->where('DELETED_AT',null)->paginate(5);

        //mengirim data ke view kota
        return view('kota', [
            'data' => $kota
        ]);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table supplier sesuai pencarian data
		$kota = DB::table('kota')
		->where('KOTA','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data supplier ke view index
		return view('kota',['data' => $kota]);
 
	}

    public function add(){
        return view('addkota');

    }

    public function store(Request $request){
        $kota = new kota; 
        $kota->ID_KOTA = $request->id_kota;
        $kota->KOTA = $request->Kota;

        if($kota->save()){
            echo "
            <script>
                alert('Data kota berhasil ditambahkan');
                document.location.href='/kota'
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Data kota gagal ditambahkan');
                document.location.href='/addkota'
            </script>
            ";
        }
    }
                
    public function edit($id){
        // mengambil data kota berdasarkan id yang dipilih
        $kota = DB::table('kota')->where('ID_KOTA',$id)->get(); 
    
        // passing data kota yang didapat ke view edit.blade.php 
        return view('editkota',['kota' => $kota]);
    } 

    public function update(Request $request){
        // update data kota
        DB::table('kota')->where('ID_KOTA',$request->id)->update([
            'KOTA' => $request->Kota,
        ]);

        // alihkan halaman ke halaman kota
        // return redirect('/kota');
        return redirect('kota')->with('status', 'Data kota berhasil diupdate!');
        }

    // public function delete($id){
    //     // menghapus data kota berdasarkan id yang dipilih
    //     DB::table('kota')->where('ID_KOTA',$id)->delete();
    
    //     // alihkan halaman ke halaman kota
    //     // return redirect('/kota');
    //     return redirect('kota')->with('status', 'Data kota berhasil dihapus!');
    //     }

    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('kota')->where('ID_KOTA',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
        
    	return redirect('/kota');
        
    }

    public function trash(){
        $kota = kota::onlyTrashed()->get();
        return view('trashkota', ['data' => $kota]);
    }

    public function restore($id=null){
        if($id != null){
            $kota = kota::onlyTrashed()->where('ID_KOTA',$id)->restore();
        } else{
            $kota = kota::onlyTrashed()->restore();
        }
        return redirect('/kota/trashkota')->with('status','data kota berhasil di restore');
    }

    public function delete($id=null){
        if($id != null){
            $kota = kota::onlyTrashed()->where('ID_KOTA',$id)->forceDelete();
        } else{
            $kota = kota::onlyTrashed()->forceDelete();
        }
        return redirect('/kota/trashkota')->with('status','data kota berhasil di hapus permanen');
    }
}



?>
