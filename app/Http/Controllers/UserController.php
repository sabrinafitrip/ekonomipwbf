<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\kota;
use App\Models\userr;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        //ambil data dari table user
        $user = DB::table('user')->where('DELETED_AT',null)->get();

        //mengirim data ke view user
        return view('datauser.user', [
            'data' => $user
        ]);
    }

    public function add(){
        $kotas= kota::all();
        $roles= Role::all();
        return view('datauser.adduser', compact('kotas','roles'));
    }

    public function store(Request $request){
        //insert ke table users
        $user = new User;
        $user->level = 'pegawai';
        $user->name = $request->nama_user;
        $user->email = $request->email;
        $user->password = bcrypt('pegawai');
        $user->remember_token = Str::random(60);
        $user->save();

        // insert ke table user
        $request->request->add(['users_id' => $user->id]);
        $user = new userr; 
        $user->ID_USER = $request->id_user;
        $user->users_id = $request->users_id;
        $user->NAMA_USER = $request->nama_user;
        $user->ID_KOTA = $request->id_kota;
        $user->ID_ROLE = $request->id_role;
        $user->ALAMAT_USER = $request->alamat_user;
        $user->TELP_USER = $request->telp_user;
        $user->USERNAME = $request->username;
        $user->EMAIL = $request->email;
        $user->PASSWORD = $request->password;
        

        if($user->save()){
            echo "
            <script>
                alert('Data user berhasil ditambahkan');
                document.location.href='/user'
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Data user gagal ditambahkan');
                document.location.href='/adduser'
            </script>
            ";
            }
        }

        public function edit($id){
            // mengambil data user berdasarkan id yang dipilih
            $user = DB::table('user')->where('ID_USER',$id)->get(); 
    
            // passing data user yang didapat ke view edit.blade.php 
            return view('datauser.edituser', ['user' => $user]);
    
    
        }      
    
        public function update(Request $request){
            // update data user
            DB::table('user')->where('ID_USER',$request->id)->update([
                'NAMA_USER' => $request->nama_user,
                // 'ID_KOTA' => $request->id_kota,
                // 'ID_ROLE' => $request->id_role,
                'ALAMAT_USER' => $request->alamat_user,
                'TELP_USER' => $request->telp_user,
                'USERNAME' => $request->username,
                'EMAIL' => $request->email,
                'PASSWORD' => $request->password,
            ]);
    
            // alihkan halaman ke halaman user
            // return redirect('/');
            return redirect('user')->with('status', 'Data user berhasil diupdate!');
            }
    
        public function delete($id){
            // menghapus data user berdasarkan id yang dipilih
            DB::table('user')->where('ID_USER',$id)->delete();
            
            // alihkan halaman ke halaman user
            // return redirect('/user');
            return redirect('user')->with('status', 'Data user berhasil dihapus!');
            }
    
        // public function hapus($id){
        //     date_default_timezone_set('Asia/Jakarta');
        //     DB::table('user')->where('ID_USER',$id)->update([
        //         'DELETED_AT' => date('Y-m-d H:i:s')
        //         ]);
                
        //     return redirect('/user');
                
        //     }
    
}
