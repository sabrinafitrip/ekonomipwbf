<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\supplier;
use App\Models\kota;

class SupplierController extends Controller
{
    public function index(){
        //ambil data dari table supplier
        $supplier = DB::table('supplier')->where('DELETED_AT',null)->paginate(5);

        //mengirim data ke view supplier
        return view('supplier', [
            'data' => $supplier
        ]);

    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table supplier sesuai pencarian data
		$supplier = DB::table('supplier')
		->where('NAMA_SUP','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data supplier ke view index
		return view('supplier',['data' => $supplier]);
 
	}

    public function add(){
        $kotas= kota::all();
        return view('addsupp', compact('kotas'));
    }

    public function store(Request $request){
        $supplier = new supplier; 
        $supplier->ID_SUP = $request->id_sup;
        $supplier->NAMA_SUP = $request->nama_sup;
        $supplier->ID_KOTA = $request->id_kota;
        $supplier->ALAMAT_SUP = $request->alamat_sup;
        $supplier->TELP_SUP = $request->telp_sup;

        if($supplier->save()){
            echo "
            <script>
                alert('Data supplier berhasil ditambahkan');
                document.location.href='/supplier'
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Data supplier gagal ditambahkan');
                document.location.href='/addsupplier'
            </script>
            ";
            }
       }

    public function edit($id){
        // mengambil data supplier berdasarkan id yang dipilih
        $supplier = DB::table('supplier')->where('ID_SUP',$id)->get(); 
    
        // passing data supplier yang didapat ke view edit.blade.php 
        return view('editsupp', ['supplier' => $supplier]);
    }    

    public function update(Request $request){
        // update data supplier
        DB::table('supplier')->where('ID_SUP',$request->id)->update([
            'NAMA_SUP' => $request->nama_sup,
            // 'ID_KOTA' => $request->id_kota,
            'ALAMAT_SUP' => $request->alamat_sup,
            'TELP_SUP' => $request->telp_sup,
        ]);

        // alihkan halaman ke halaman supplier
        // return redirect('/supplier');
        return redirect('supplier')->with('status', 'Data supplier berhasil diupdate!');
        }

    // public function delete($id){
    //     // menghapus data supplier berdasarkan id yang dipilih
    //     DB::table('supplier')->where('ID_SUP',$id)->delete();
        
    //     // alihkan halaman ke halaman supplier
    //     // return redirect('/supplier');
    //     return redirect('supplier')->with('status', 'Data supplier berhasil dihapus!');
    //     }

    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('supplier')->where('ID_SUP',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
        
    	return redirect('/supplier');
        
    }

    public function trash(){
        $supplier = supplier::onlyTrashed()->get();
        return view('trashsupp', ['data' => $supplier]);
    }

    public function restore($id=null){
        if($id != null){
            $supplier = supplier::onlyTrashed()->where('ID_SUP',$id)->restore();
        } else{
            $supplier = supplier::onlyTrashed()->restore();
        }
        return redirect('/supplier/trashsup')->with('status','data supplier berhasil di restore');
    }

    public function delete($id=null){
        if($id != null){
            $supplier = supplier::onlyTrashed()->where('ID_SUP',$id)->forceDelete();
        } else{
            $supplier = supplier::onlyTrashed()->forceDelete();
        }
        return redirect('/supplier/trashsup')->with('status','data supplier berhasil di hapus permanen');
    }

}

?>
