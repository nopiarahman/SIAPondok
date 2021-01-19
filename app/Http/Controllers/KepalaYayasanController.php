<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;

class KepalaYayasanController extends Controller
{
    public function editAdmin(){
        
        $admin = user::where('role','admin')->get();    
        return view('kepalaYayasan/editAdmin',compact('admin'));
    }
    public function admintambah(Request $request){
        $adminBaru = new user();
        $adminBaru->name = $request->name;
        $adminBaru->email = $request->email;
        $adminBaru->password = bcrypt($request->password);
        $adminBaru->jenjang = $request->jenjang;
        $adminBaru->role="admin";
        $adminBaru->save();
        return redirect('/editadmin')->with('status', 'Admin Berhasil Ditambahkan');
    }
    public function adminhapus($admin){
        user::destroy($admin);
        return redirect('/editadmin')->with('status', 'Data Berhasil dihapus');
    }

}
