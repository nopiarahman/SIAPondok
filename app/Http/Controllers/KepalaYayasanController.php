<?php

namespace App\Http\Controllers;

use App\user;
use App\santriwustha;
use App\asatidzah;
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
    public function datasantriuulaa(Request  $request){
        if ($request->get('cari')) {
            $santriwustha = santriwustha::where('namaLengkap', 'LIKE', '%' . $request->cari . '%')
            ->where('jenjang','sd')
            ->paginate(10);
        } else {
            $santriwustha = santriwustha::orderBy('namaLengkap')
            ->where('jenjang','sd')
            ->paginate(10);
        }   
        $jenjang='sd';
        $menu='menuuulaa';
        return view('santri/santriwustha',compact('santriwustha','jenjang','menu'));
    }
    public function datasantriwustha(Request  $request){
        if ($request->get('cari')) {
            $santriwustha = santriwustha::where('namaLengkap', 'LIKE', '%' . $request->cari . '%')
            ->where('jenjang','smpPutra')
            ->paginate(20);
        } else {
            $santriwustha = santriwustha::orderBy('namaLengkap')
            ->where('jenjang','smpPutra')
            ->paginate(20);
        }   
        $jenjang='sd';
        $menu='menuwustha';
        return view('santri/santriwustha',compact('santriwustha','jenjang','menu'));
    }
    public function datasantribanaat(Request  $request){
        if ($request->get('cari')) {
            $santriwustha = santriwustha::where('namaLengkap', 'LIKE', '%' . $request->cari . '%')
            ->where('jenjang','smpPutri')
            ->paginate(20);
        } else {
            $santriwustha = santriwustha::orderBy('namaLengkap')
            ->where('jenjang','smpPutri')
            ->paginate(20);
        }   
        $jenjang='sd';
        $menu='menubanaat';
        return view('santri/santriwustha',compact('santriwustha','jenjang','menu'));
    }
    public function datasantriulyaa(Request  $request){
        if ($request->get('cari')) {
            $santriwustha = santriwustha::where('namaLengkap', 'LIKE', '%' . $request->cari . '%')
            ->where('jenjang','smaPutra')
            ->paginate(20);
        } else {
            $santriwustha = santriwustha::orderBy('namaLengkap')
            ->where('jenjang','smaPutra')
            ->paginate(20);
        }   
        $jenjang='sd';
        $menu='menuulyaa';
        return view('santri/santriwustha',compact('santriwustha','jenjang','menu'));
    }
    public function dataasatidzah(Request $request){
        if ($request ->get('cari')){
            $asatidzah = asatidzah::where('namaLengkap','LIKE','%'. $request->cari.'%')
                                    ->paginate(10); 
        }else{
            
            $asatidzah = asatidzah::orderBy('namaLengkap')
                                    ->paginate(10);
        }
        return view ('asatidzah/asatidzah',['asatidzah'=>$asatidzah]);
    }
    public function dataasatidzahshow(Asatidzah $asatidzah){
        return view('asatidzah/asatidzahshow',compact('asatidzah'));
    }
}
