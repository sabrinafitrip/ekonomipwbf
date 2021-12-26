<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Historystock;
use App\Models\Barang;

class HistorystockController extends Controller
{
  
    public function index(){
        //ambil data dari table history stock
        $history_stock = DB::table('history_stock')->where('DELETED_AT',null)->paginate(5);

        //mengirim data ke view history stock
        return view('datastock.historystock', [
            'data' => $history_stock
        ]);

    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table history stock sesuai pencarian data
		$history_stock = DB::table('history_stock')
		->where('KODE_BARANG','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data history stock ke view index
		return view('datastock.historystock',['data' => $history_stock]);
 
	}

    public function add(){
        $barangs= Barang::all();
        return view('datastock.addstock', compact('barangs'));
    }

    public function store(Request $request){
        $history_stock = new Historystock; 
        // $history_stock->ID_HS = $request->id_hs;
        $history_stock->KODE_BARANG = $request->kode_barang;
        $history_stock->TGL_HS = $request->tgl_hs;
        $history_stock->UPDATE_STOCK_HS = $request->update_stock_hs;
        $history_stock->STATUS = $request->status;

        if($history_stock->save()){
            echo "
            <script>
                alert('History stock berhasil ditambahkan');
                document.location.href='/historystock'
            </script>
            ";
        }else{
            echo "
            <script>
                alert('History stock gagal ditambahkan');
                document.location.href='/addstock'
            </script>
            ";
            }
       }

    public function edit($id){
        // mengambil data historystock berdasarkan id yang dipilih
        $history_stock = DB::table('history_stock')->where('ID_HS',$id)->get(); 
    
        // passing data history stock yang didapat ke view edit.blade.php 
        return view('datastock.editstock', ['history_stock' => $history_stock]);
    }    

    public function update(Request $request){
        // update data history stock
        DB::table('history_stock')->where('ID_HS',$request->id)->update([
            'TGL_HS' => $request->tgl_hs,
            // 'KODE_BARANG' => $request->kode_barang,
            'UPDATE_STOCK_HS' => $request->update_stock_hs,
            'STATUS' => $request->status,
        ]);

        // alihkan halaman ke halaman history stock
        // return redirect('/historystock');
        return redirect('historystock')->with('status', 'Data Stock berhasil diupdate!');
        }

    // public function delete($id){
    //     // menghapus data stock berdasarkan id yang dipilih
    //     DB::table('history_stock')->where('ID_HS',$id)->delete();
        
    //     // alihkan halaman ke halaman history stock
    //     // return redirect('/historystock');
    //     return redirect('historystock')->with('status', 'Data stock berhasil dihapus!');
    //     }

    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('history_stock')->where('ID_HS',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
        
    	return redirect('/historystock');
        
    }

    public function trash(){
        $history_stock = Historystock::onlyTrashed()->get();
        return view('datastock.trashstock', ['data' => $history_stock]);
    }

    public function restore($id=null){
        if($id != null){
            $history_stock = Historystock::onlyTrashed()->where('ID_HS',$id)->restore();
        } else{
            $history_stock = Historystock::onlyTrashed()->restore();
        }
        return redirect('/historystock/trashstock')->with('status','data stock berhasil di restore');
    }

    public function delete($id=null){
        if($id != null){
            $history_stock = Historystock::onlyTrashed()->where('ID_HS',$id)->forceDelete();
        } else{
            $history_stock = Historystock::onlyTrashed()->forceDelete();
        }
        return redirect('/historystock/trashstock')->with('status','data stock berhasil di hapus permanen');
    }

}
?>
