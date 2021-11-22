<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ukuran;

class UkuranController extends Controller
{
    public function index(){
        //ambil data dari table ukuran
        $ukuran = DB::table('ukuran')->where('DELETED_AT',null)->paginate(5);

        //mengirim data ke view ukuran
        return view('dataukuran.ukuran', [
            'data' => $ukuran
        ]);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table supplier sesuai pencarian data
		$ukuran = DB::table('ukuran')
		->where('UKURAN','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data supplier ke view index
		return view('dataukuran.ukuran',['data' => $ukuran]);
 
	}

    public function add(){
        return view('dataukuran.addukuran');
    }


    public function store(Request $request){
        $ukuran = new ukuran; 
        $ukuran->ID_UKURAN = $request->id_ukuran;
        $ukuran->UKURAN = $request->Ukuran;

        if($ukuran->save()){
            echo "
            <script>
                alert('Data ukuran berhasil ditambahkan');
                document.location.href='/ukuran'
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Data ukuran gagal ditambahkan');
                document.location.href='/addukuran'
            </script>
            ";
        }
    }

    public function edit($id){
        // mengambil data ukuran berdasarkan id yang dipilih
        $ukuran = DB::table('ukuran')->where('ID_UKURAN',$id)->get(); 
    
        // passing data ukuran yang didapat ke view edit.blade.php 
        return view('dataukuran.editukuran',['ukuran' => $ukuran]);
    } 

    public function update(Request $request){
        // update data ukuran
        DB::table('ukuran')->where('ID_UKURAN',$request->id)->update([
            'UKURAN' => $request->ukuran,
        ]);

        // alihkan halaman ke halaman ukuran
        // return redirect('/ukuran');
        return redirect('ukuran')->with('status', 'Data ukuran berhasil diupdate!');
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
    	DB::table('ukuran')->where('ID_UKURAN',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
        
    	return redirect('/ukuran');
        
    }

    public function trash(){
        $ukuran = Ukuran::onlyTrashed()->get();
        return view('dataukuran.trashukuran', ['data' => $ukuran]);
    }

    public function restore($id=null){
        if($id != null){
            $ukuran = Ukuran::onlyTrashed()->where('ID_UKURAN',$id)->restore();
        } else{
            $ukuran = Ukuran::onlyTrashed()->restore();
        }
        return redirect('/ukuran/trashukuran')->with('status','data ukuran berhasil di restore');
    }

    public function delete($id=null){
        if($id != null){
            $ukuran = Ukuran::onlyTrashed()->where('ID_UKURAN',$id)->forceDelete();
        } else{
            $ukuran = Ukuran::onlyTrashed()->forceDelete();
        }
        return redirect('/ukuran/trashukuran')->with('status','data ukuran berhasil di hapus permanen');
    }

}

?>
