<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(){
        //ambil data dari table role
        $role = DB::table('role')->where('DELETED_AT',null)->get();

        //mengirim data ke view role
        return view('datarole.role', [
            'data' => $role
        ]);
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

}

?>
