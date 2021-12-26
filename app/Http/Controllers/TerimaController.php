<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Penerimaan;
use App\Models\supplier;
use App\Models\userr;

class TerimaController extends Controller
{
    public function index(){
        //ambil data dari table pemesanan
        $penerimaan = DB::table('penerimaan')->where('DELETED_AT',null)->paginate(5);

        //mengirim data ke view pemesanan
        return view('dataterima.penerimaan', [
            'data' => $penerimaan
        ]);

    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pemesanan sesuai pencarian data
		$penerimaan = DB::table('penerimaan')
		->where('ID_TERIMA','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data supplier ke view index
		return view('dataterima.penerimaan',['data' => $penerimaan]);
 
	}

    public function cetak(){
        //ambil data dari table pemesanan
        $cetakPenerimaan = DB::table('penerimaan')->where('DELETED_AT',null)->get();

        //mengirim data ke view supplier
        return view('dataterima.cetakterima', [
            'data' => $cetakPenerimaan
        ]);
    }

    public function add(){
        $suppliers= supplier::all();
        $users= userr::all();
        return view('dataterima.addterima', compact('suppliers','users'));
    }

    public function store(Request $request){
        $penerimaan = new Penerimaan;
        $penerimaan->ID_TERIMA = $request->id_terima;
        $penerimaan->ID_USER = $request->id_user;
        $penerimaan->ID_SUP = $request->id_sup;
        $penerimaan->TGL_TERIMA = $request->tgl_terima;
        $penerimaan->TOTAL_HARGA = $request->total_harga;
        $penerimaan->STATUS_TERIMA = $request->status_terima;

        if($penerimaan->save()){
            echo "
            <script>
                alert('Data penerimaan berhasil ditambahkan');
                document.location.href='/penerimaan'
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Data penerimaan gagal ditambahkan');
                document.location.href='/addterima'
            </script>
            ";
            }
       }

       public function edit($id){
        // mengambil data barang berdasarkan id yang dipilih
        $penerimaan = DB::table('penerimaan')->where('ID_TERIMA',$id)->get(); 

        // passing data barang yang didapat ke view edit.blade.php 
        // return view('databarang.editbarang',compact('jenis_barangs'), ['barang' => $barang]);
        return view('dataterima.editterima', ['penerimaan' => $penerimaan]);


    }      

    public function update(Request $request){
        // update data barang
        DB::table('penerimaan')->where('ID_TERIMA',$request->id)->update([
            // 'ID_USER' => $request->id_user,
            // 'ID_SUP' => $request->id_sup,
            'TGL_TERIMA' => $request->tgl_terima,
            'TOTAL_HARGA' => $request->total_harga,
            'STATUS_TERIMA' => $request->status_terima,
            
        ]);

        // alihkan halaman ke halaman barang
        // return redirect('/barang');
        return redirect('penerimaan')->with('status', 'Data penerimaan berhasil diupdate!');
        }

    // public function delete($id){
    //     // menghapus data barang berdasarkan id yang dipilih
    //     DB::table('penerimaan')->where('ID_TERIMA',$id)->delete();
        
    //     // alihkan halaman ke halaman barang
    //     // return redirect('/penerimaan');
    //     return redirect('penerimaan')->with('status', 'Data penerimaan berhasil dihapus!');
    //     }

    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('penerimaan')->where('ID_TERIMA',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
            ]);
            
        return redirect('/penerimaan');
            
        }

        public function trash(){
            $penerimaan = Penerimaan::onlyTrashed()->get();
            return view('dataterima.trashterima', ['data' => $penerimaan]);
        }
    
        public function restore($id=null){
            if($id != null){
                $penerimaan = Penerimaan::onlyTrashed()->where('ID_TERIMA',$id)->restore();
            } else{
                $penerimaan = Penerimaan::onlyTrashed()->restore();
            }
            return redirect('/penerimaan/trashterima')->with('status','data penerimaan berhasil di restore');
        }
    
        public function delete($id=null){
            if($id != null){
                $penerimaan = Penerimaan::onlyTrashed()->where('ID_TERIMA',$id)->forceDelete();
            } else{
                $penerimaan = Penerimaan::onlyTrashed()->forceDelete();
            }
            return redirect('/penerimaan/trashterima')->with('status','data penerimaan berhasil di hapus permanen');
        }
}
