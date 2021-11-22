<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(){
        //ambil data dari table role
        $role = DB::table('role')->where('DELETED_AT',null)->paginate(5);

        //mengirim data ke view role
        return view('datarole.role', [
            'data' => $role
        ]);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table supplier sesuai pencarian data
		$role = DB::table('role')
		->where('JENIS_ROLE','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data supplier ke view index
		return view('datarole.',['datarole.role' => $role]);
 
	}

    public function add(){
        return view('datarole.addrole');
    }


    public function store(Request $request){
        $role = new role; 
        $role->ID_ROLE = $request->id_role;
        $role->JENIS_ROLE = $request->jenis_role;

        if($role->save()){
            echo "
            <script>
                alert('Data role berhasil ditambahkan');
                document.location.href='/role'
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Data role gagal ditambahkan');
                document.location.href='/addrole'
            </script>
            ";
        }
    }

    public function edit($id){
        // mengambil data role berdasarkan id yang dipilih
        $role = DB::table('role')->where('ID_ROLE',$id)->get(); 
    
        // passing data role yang didapat ke view edit.blade.php 
        return view('datarole.editrole',['role' => $role]);
    } 

    public function update(Request $request){
        // update data role
        DB::table('role')->where('ID_ROLE',$request->id)->update([
            'JENIS_ROLE' => $request->jenis_role,
        ]);

        // alihkan halaman ke halaman role
        // return redirect('/role');
        return redirect('role')->with('status', 'Data role berhasil diupdate!');
        }

    // public function delete($id){
    //     // menghapus data role berdasarkan id yang dipilih
    //     DB::table('role')->where('ID_ROLE',$id)->delete();
    
    //     // alihkan halaman ke halaman role
    //     // return redirect('/role');
    //     return redirect('role')->with('status', 'Data role berhasil dihapus!');
    //     }
    

    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('role')->where('ID_ROLE',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
        
    	return redirect('/role');
        
    }

    public function trash(){
        $role = Role::onlyTrashed()->get();
        return view('datarole.trashrole', ['data' => $role]);
    }

    public function restore($id=null){
        if($id != null){
            $role = Role::onlyTrashed()->where('ID_ROLE',$id)->restore();
        } else{
            $role = Role::onlyTrashed()->restore();
        }
        return redirect('/role/trashrole')->with('status','data role berhasil di restore');
    }

    public function delete($id=null){
        if($id != null){
            $role = Role::onlyTrashed()->where('ID_ROLE',$id)->forceDelete();
        } else{
            $role = Role::onlyTrashed()->forceDelete();
        }
        return redirect('/role/trashrole')->with('status','data role berhasil di hapus permanen');
    }

}

?>
