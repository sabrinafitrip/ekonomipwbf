<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Penerimaan;


class TerimaController extends Controller
{
    public function index(){
        //ambil data dari table penerimaan
        $penerimaan = DB::table('penerimaan')->where('DELETED_AT',null)->paginate(5);

        //mengirim data ke view penerimaan
        return view('dataterima.penerimaan', [
            'data' => $penerimaan
        ]);
    }

    public function cetak(){
        //ambil data dari table penerimaan
        $cetakTerima = DB::table('penerimaan')->where('DELETED_AT',null)->get();

        //mengirim data ke view penerimaan
        return view('dataterima.cetakterima', [
            'data' => $cetakTerima
        ]);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table penerimaan sesuai pencarian data
		$penerimaan = DB::table('penerimaan')
		->where('TGL_TERIMA','like',"%".$cari."%")
		->paginate();

    		// mengirim data penerimaan ke view index
		return view('dataterima.',['dataterima.penerimaan' => $penerimaan]);
 
	}

    public function add(){
        return view('dataterima.addterima');
    }

    public function store(Request $request){
        $penerimaan = new Penerimaan; 
        $penerimaan->ID_TERIMA = $request->id_terima;
        // $penerimaan->ID_USER = $request->id_user;
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
        // mengambil data terima berdasarkan id yang dipilih
        $penerimaan = DB::table('penerimaan')->where('ID_TERIMA',$id)->get(); 

        // passing data terima yang didapat ke view edit.blade.php 
        return view('dataterima.editterima', ['penerimaan' => $penerimaan]); 
    }      

    public function update(Request $request){
        // update data terima
        DB::table('penerimaan')->where('ID_TERIMA',$request->id)->update([
            'TGL_TERIMA' => $request->tgl_terima,
            'TOTAL_HARGA' => $request->total_harga,
            'STATUS_TERIMA' => $request->status_terima,
        ]);

        // alihkan halaman ke halaman penerimaan
        // return redirect('/penerimaan');
        return redirect('penerimaan')->with('status', 'Data penerimaan berhasil diupdate!');
        }


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
