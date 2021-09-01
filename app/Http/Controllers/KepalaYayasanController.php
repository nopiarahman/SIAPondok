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
            ->get();
        } else {
            $santriwustha = santriwustha::orderBy('namaLengkap')
            ->where('jenjang','sd')
            ->get();
        }   
        $jenjang='sd';
        $menu='menuuulaa';
        return view('santri/santriwustha',compact('santriwustha','jenjang','menu'));
    }
    public function datasantriwustha(Request  $request){
        if ($request->get('cari')) {
            $santriwustha = santriwustha::where('namaLengkap', 'LIKE', '%' . $request->cari . '%')
            ->where('jenjang','smpPutra')
            ->get();
        } else {
            $santriwustha = santriwustha::orderBy('namaLengkap')
            ->where('jenjang','smpPutra')
            ->get();
        }   
        $jenjang='smpPutra';
        $menu='menuwustha';
        return view('santri/santriwustha',compact('santriwustha','jenjang','menu'));
    }
    public function datasantribanaat(Request  $request){
        if ($request->get('cari')) {
            $santriwustha = santriwustha::where('namaLengkap', 'LIKE', '%' . $request->cari . '%')
            ->where('jenjang','smpPutri')
            ->get();
        } else {
            $santriwustha = santriwustha::orderBy('namaLengkap')
            ->where('jenjang','smpPutri')
            ->get();
        }   
        $jenjang='smpPutri';
        $menu='menubanaat';
        return view('santri/santriwustha',compact('santriwustha','jenjang','menu'));
    }
    public function datasantriulyaa(Request  $request){
        if ($request->get('cari')) {
            $santriwustha = santriwustha::where('namaLengkap', 'LIKE', '%' . $request->cari . '%')
            ->where('jenjang','smaPutra')
            ->get();
        } else {
            $santriwustha = santriwustha::orderBy('namaLengkap')
            ->where('jenjang','smaPutra')
            ->get();
        }   
        $jenjang='smaPutra';
        $menu='menuulyaa';
        return view('santri/santriwustha',compact('santriwustha','jenjang','menu'));
    }
    public function dataasatidzah(Request $request){
        if ($request ->get('cari')){
            $asatidzah = asatidzah::where('namaLengkap','LIKE','%'. $request->cari.'%')
                                    ->get(); 
        }else{
            
            $asatidzah = asatidzah::orderBy('namaLengkap')
                                    ->get();
        }
        return view ('asatidzah/asatidzah',['asatidzah'=>$asatidzah]);
    }
    public function dataasatidzahshow(Asatidzah $asatidzah){
        return view('asatidzah/asatidzahshow',compact('asatidzah'));
    }
}
