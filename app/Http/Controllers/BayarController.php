<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pembayaran;
use App\Models\Penerimaan;

class BayarController extends Controller
{
    public function index(){
        //ambil data dari table pembayaran
        $pembayaran = DB::table('pembayaran')->where('DELETED_AT',null)->paginate(5);;

        //mengirim data ke view pembayaran
        return view('databayar.pembayaran', [
            'data' => $pembayaran
        ]);
    }

    public function cetak(){
        //ambil data dari table pembayaran
        $cetakBayar = DB::table('pembayaran')->where('DELETED_AT',null)->get();

        //mengirim data ke view pembayaran
        return view('databayar.cetakbayar', [
            'data' => $cetakBayar
        ]);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pembayaran sesuai pencarian data
		$pembayaran = DB::table('pembayaran')
		->where('TGL_BAYAR','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pembayaran ke view index
		return view('databayar.',['databayar.pembayaran' => $pembayaran]);
 
	}

    public function add(){
        $id_terimas= Penerimaan::all();
        return view('databayar.addbayar',compact('id_terimas'));
    }

    public function store(Request $request){
        $pembayaran = new Pembayaran; 
        $pembayaran->ID_BAYAR = $request->id_bayar;
        $pembayaran->ID_TERIMA = $request->id_terima;
        $pembayaran->TGL_BAYAR = $request->tgl_bayar;
        $pembayaran->TOTAL_BAYAR = $request->total_bayar;

        if($pembayaran->save()){
            echo "
            <script>
                alert('Data pembayaran berhasil ditambahkan');
                document.location.href='/pembayaran'
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Data pembayaran gagal ditambahkan');
                document.location.href='/addterima'
            </script>
            ";
            }
        }
    

        public function edit($id){
            // mengambil data bayar berdasarkan id yang dipilih
            $pembayaran = DB::table('pembayaran')->where('ID_BAYAR',$id)->get(); 
    
            // passing data bayar yang didapat ke view edit.blade.php 
            return view('databayar.editbayar', ['pembayaran' => $pembayaran]); 
        }      
    
        public function update(Request $request){
            // update data bayar
            DB::table('pembayaran')->where('ID_BAYAR',$request->id)->update([
                'TGL_BAYAR' => $request->tgl_bayar,
                'TOTAL_BAYAR' => $request->total_bayar,
            ]);
    
            // alihkan halaman ke halaman bayar
            // return redirect('/pembayaran');
            return redirect('pembayaran')->with('status', 'Data pembayaran berhasil diupdate!');
            }
    
    
        public function hapus($id){
            date_default_timezone_set('Asia/Jakarta');
            DB::table('pembayaran')->where('ID_BAYAR',$id)->update([
                'DELETED_AT' => date('Y-m-d H:i:s')
                ]);
                
            return redirect('/pembayaran');
                
            }
    
            public function trash(){
                $pembayaran = Pembayaran::onlyTrashed()->get();
                return view('databayar.trashbayar', ['data' => $pembayaran]);
            }
        
            public function restore($id=null){
                if($id != null){
                    $pembayaran = Pembayaran::onlyTrashed()->where('ID_BAYAR',$id)->restore();
                } else{
                    $pembayaran = Pembayaran::onlyTrashed()->restore();
                }
                return redirect('/pembayaran/trashbayar')->with('status','data pembayaran berhasil di restore');
            }
        
            public function delete($id=null){
                if($id != null){
                    $pembayaran = Pembayaran::onlyTrashed()->where('ID_BAYAR',$id)->forceDelete();
                } else{
                    $pembayaran = Pembayaran::onlyTrashed()->forceDelete();
                }
                return redirect('/pembayaran/trashbayar')->with('status','data pembayaran berhasil di hapus permanen');
            }
    
}
