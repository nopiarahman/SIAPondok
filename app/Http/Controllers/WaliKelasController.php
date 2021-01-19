<?php

namespace App\Http\Controllers;
use \App\waliKelas;
use \App\santriwustha;
use Illuminate\Http\Request;

class WaliKelasController extends Controller
{
    public function index(){
        $cekuser = auth()->user();
        $cekwaliKelas=waliKelas::where('user_id',$cekuser->id)->first();
        // dd($cekwaliKelas->kelas->id);
        $santriKelas= santriwustha::where('kelas_id',$cekwaliKelas->kelas->id)->orderBy('namaLengkap')->paginate(10);
        // dd($santriKelas);
        return view ('waliKelas/index',compact('santriKelas'));

    }
}
