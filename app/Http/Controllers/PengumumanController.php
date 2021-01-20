<?php

namespace App\Http\Controllers;

use App\pengumuman;
use App\user;
use App\santriwustha;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index(){

        $pengumuman=pengumuman::paginate(10);
        return view('pengumuman/pengumumanindex',compact('pengumuman'));
    }
    public function create(){
        $pengumuman = new pengumuman;
        $cariWaliSantri = santriwustha::where('jenjang',jenjang())->get();
        return view('pengumuman/pengumumantambah',compact('pengumuman','cariWaliSantri'));
    }
    public function store(Request $request){
        $cekuser= user::where('email',$request->emailWali)->first();
        // $requestData=$request->all();
        $requestData['tanggalPengumuman']=$request->tanggalPengumuman;
        $requestData['jenisPengumuman']=$request->jenisPengumuman;
        $requestData['judul']=$request->judul;
        $requestData['isiPengumuman']=$request->isiPengumuman;

        if($request->tujuanKelompok !=null){
            $requestData['tujuanKelompok']=$request->tujuanKelompok;
        }else{
            $requestData['tujuanPengumuman']=$cekuser->id;

        }
        // dd($requestData);
        pengumuman::create($requestData);
        return redirect('pengumuman')->with('status', 'Pengumuman berhasil ditambahkan');

    }
    public function destroy($request){
        pengumuman::destroy($request);
        return redirect('/pengumuman')->with('status', 'Data Berhasil dihapus');
    }

}
