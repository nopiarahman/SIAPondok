<?php

namespace App\Http\Controllers;
use \App\waliKelas;
use \App\kelas;
use \App\santriwustha;
use Illuminate\Http\Request;

class WaliKelasController extends Controller
{
    public function index(){
        $cekuser = auth()->user();
        $cekwaliKelas=waliKelas::where('user_id',$cekuser->id)->first();
        // dd($cekwaliKelas->kelas->namaKelas);
        $santriKelas= santriwustha::where('kelas_id',$cekwaliKelas->kelas->id)->orderBy('namaLengkap')->get();
        // dd($santriKelas);
        return view ('waliKelas/index',compact('santriKelas','cekwaliKelas'));
        
    }
    public function absensi(){
        // dd(cekwaliKelas()->kelas);
        $daftarSantri = cekwaliKelas()->kelas->santriwustha;
        return view ('waliKelas/absensi',compact('daftarSantri'));
    }
    public function absensiSimpan(Request $request){
        dd($request->santriwustha_id);
    }
}
