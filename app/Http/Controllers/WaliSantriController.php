<?php

namespace App\Http\Controllers;
use App\santriwustha;
use App\nilai;
use App\periode;
use App\jadwalbelajar;
use App\pelanggaran;
use Illuminate\Http\Request;

class WaliSantriController extends Controller
{
    public function lihatsantri()
    {
        $cekuser = auth()->user();
        $santriwustha=santriwustha::where('emailWali','=',$cekuser->email)->first();
        return view('waliSantri/lihatsantri',compact('santriwustha'));
    }

    public function lihatnilai()
    {
        $cekuser = auth()->user();
        $santriwustha=santriwustha::where('emailWali','=',$cekuser->email)->first();
        
        
        $periode=periode::where('status','Aktif')->first();
        $cekaktif=['santriwustha_id'=> $santriwustha->id,'periode_id'=>$periode->id];
        $nilaiaktif=nilai::where($cekaktif)->orderBy('mapel_id')->get();
        // dd($nilaiaktif);
        
        $jadwalbelajar = jadwalbelajar::where('kelas_id',$santriwustha->kelas_id)->get();
        // dd($jadwalbelajar);
        return view ('waliSantri/lihatnilai',compact('santriwustha','ceknilai','jadwalbelajar','nilaiaktif','periode'));
    }
    public function lihatpelanggaran()
    {
        $cekuser = auth()->user();
        $santriwustha=santriwustha::where('emailWali','=',$cekuser->email)->first();
        
        $pelanggaran = pelanggaran::where('santriwustha_id','=',$santriwustha->id)->paginate(10);
        return view('waliSantri/lihatpelanggaran',['pelanggaran'=>$pelanggaran]);
    }


}
