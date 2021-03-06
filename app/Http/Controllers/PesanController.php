<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pemesanan;
use App\Models\supplier;
use App\Models\userr;

class PesanController extends Controller
{
    public function index(){
        //ambil data dari table pemesanan
        $pemesanan = DB::table('pemesanan')->where('DELETED_AT',null)->paginate(5);

        //mengirim data ke view pemesanan
        return view('datapesan.pemesanan', [
            'data' => $pemesanan
        ]);

    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pemesanan sesuai pencarian data
		$pemesanan = DB::table('pemesanan')
		->where('ID_PESAN','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data supplier ke view index
		return view('datapesan.pemesanan',['data' => $pemesanan]);
 
	}

    public function cetak(){
        //ambil data dari table pemesanan
        $cetakPemesanan = DB::table('pemesanan')->where('DELETED_AT',null)->get();

        //mengirim data ke view supplier
        return view('datapesan.cetakpesan', [
            'data' => $cetakPemesanan
        ]);
    }

    public function add(){
        $suppliers= supplier::all();
        $users= userr::all();
        return view('datapesan.addpesan', compact('suppliers','users'));
    }

    public function store(Request $request){
        $pemesanan = new Pemesanan;
        $pemesanan->ID_PESAN = $request->id_pesan;
        $pemesanan->ID_SUP = $request->id_sup;
        $pemesanan->ID_USER = $request->id_user;
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

       public function edit($id){
        // mengambil data barang berdasarkan id yang dipilih
        $pemesanan = DB::table('pemesanan')->where('ID_PESAN',$id)->get(); 

        // passing data barang yang didapat ke view edit.blade.php 
        // return view('databarang.editbarang',compact('jenis_barangs'), ['barang' => $barang]);
        return view('datapesan.editpesan', ['pemesanan' => $pemesanan]);


    }      

    public function update(Request $request){
        // update data barang
        DB::table('pemesanan')->where('ID_PESAN',$request->id)->update([
            // 'ID_SUP' => $request->id_sup,
            // 'ID_USER' => $request->id_user,
            'TGL_PESAN' => $request->tgl_pesan,
            'STATUS_PESAN' => $request->status_pesan,
            
        ]);

        // alihkan halaman ke halaman barang
        // return redirect('/barang');
        return redirect('pemesanan')->with('status', 'Data pemesanan berhasil diupdate!');
        }

    // public function delete($id){
    //     // menghapus data barang berdasarkan id yang dipilih
    //     DB::table('pemesanan')->where('ID_PESAN',$id)->delete();
        
    //     // alihkan halaman ke halaman barang
    //     // return redirect('/pemesanan');
    //     return redirect('pemesanan')->with('status', 'Data pemesanan berhasil dihapus!');
    //     }

    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('pemesanan')->where('ID_PESAN',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
            ]);
            
        return redirect('/pemesanan');
            
        }

        public function trash(){
            $pemesanan = Pemesanan::onlyTrashed()->get();
            return view('datapesan.trashpesan', ['data' => $pemesanan]);
        }
    
        public function restore($id=null){
            if($id != null){
                $pemesanan = Pemesanan::onlyTrashed()->where('ID_PESAN',$id)->restore();
            } else{
                $pemesanan = Pemesanan::onlyTrashed()->restore();
            }
            return redirect('/pemesanan/trashpesan')->with('status','data pemesanan berhasil di restore');
        }
    
        public function delete($id=null){
            if($id != null){
                $pemesanan = Pemesanan::onlyTrashed()->where('ID_PESAN',$id)->forceDelete();
            } else{
                $pemesanan = Pemesanan::onlyTrashed()->forceDelete();
            }
            return redirect('/pemesanan/trashpesan')->with('status','data pemesanan berhasil di hapus permanen');
        }
}
