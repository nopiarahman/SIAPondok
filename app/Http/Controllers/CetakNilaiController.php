<?php

namespace App\Http\Controllers;

use App\laporan;
use App\kelas;
use App\mapel;
use App\periode;
use App\jadwalbelajar;
use App\santriwustha;
use App\nilai;
use App\waliKelas;
use App\nilaitahfidz;
use Carbon\Carbon;
use PDF;
use SnappyImage;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class CetakNilaiController extends Controller
{

    public function cetaksw(Santriwustha $santriwustha)
    {
        $tanggal=Carbon::now();
        $kelas=kelas::where('id',$santriwustha->kelas_id)->first();
        $nilai=nilai::where('kelas_id',$santriwustha->kelas_id)->first();
        $semuanilai=mapel::all();
        $periode=periode::where('status','Aktif')->first();
        if($nilai!=null){
            $ceknilai = DB::table('nilai')
                    ->where('kelas_id', '=', $nilai->kelas_id)
                    ->get();
            $cekaktif=['santriwustha_id'=> $santriwustha->id,'periode_id'=>$periode->id,'kelas_id'=>$santriwustha->kelas_id];
            $nilaiaktif=nilai::where($cekaktif)->get();
        }else{
            $nilaiaktif==null;
        }
        $jenjang=auth()->user()->jenjang;
        // dd($jenjang);
        $cekuser = auth()->user();
            $walikelas=waliKelas::where('user_id',$cekuser->id)->first();
            $nilaidiniyah=[];
            $nilaiumum=[];
            $nilaibahasa=[];
            $nilaidiniyahsorted=[];
            $nilaiumumsorted=[];
            $nilaiMulokSorted=[];
            $nilaiBahasaSorted=[];
            foreach($nilaiaktif as $nd)
            {
                if($nd->mapel->kategori=='diniyah')
                {
                    $nd['namaMapel']= $nd->mapel->namaMapel;
                    $nilaidiniyah[]=$nd;
                    $nilaidiniyahsorted = array_values(Arr::sort($nilaidiniyah, function ($value) {
                        return $value['namaMapel'];
                    }));
                }
                elseif($nd->mapel->kategori=='umum')
                {
                    // $nilaiumum[]=$nd;
                    $nd['namaMapel']= $nd->mapel->namaMapel;
                    $nilaiumum[]=$nd;
                    $nilaiumumsorted = array_values(Arr::sort($nilaiumum, function ($value) {
                        return $value['namaMapel'];
                    }));
                    
                }elseif($nd->mapel->kategori=='bahasa'){
                    $nd['namaMapel']= $nd->mapel->namaMapel;
                    $nilaibahasa[]=$nd;
                    $nilaiBahasaSorted = array_values(Arr::sort($nilaibahasa, function ($value) {
                        return $value['namaMapel'];
                    }));
                }else{
                    $nd['namaMapel']= $nd->mapel->namaMapel;
                    $nilaimulok[]=$nd;
                    $nilaiMulokSorted = array_values(Arr::sort($nilaimulok, function ($value) {
                        return $value['namaMapel'];
                    }));
                }
            }
        if($jenjang=="sd"){
            if($periode->semester=='Ganjil'){
                $pdf = PDF::loadview('laporan/cetakUASGanjilUula',compact('santriwustha','nilaiaktif','tanggal','kelas','periode','nilaidiniyahsorted','nilaiumumsorted','nilaiMulokSorted','walikelas'));
                $pdf->setPaper('legal');
                return $pdf->stream('raport'.$santriwustha->namaLengkap.'.pdf');
                return view('laporan/cetakUASGanjilUula',compact('santriwustha','nilaiaktif','tanggal','kelas','periode','nilaidiniyahsorted','nilaiumumsorted','nilaiMulokSorted','walikelas'));
            }elseif($periode->semester=='Genap'){
                /* Nilai/variabel yang nanti dikirim lewat form */
                $statusNaik = "naik";
                if($statusNaik=="naik"){
                    if($kelas->namaKelas<=6){
                        $naik = $kelas->namaKelas+1;
                        $tidaknaik=false;
                    }else{
                        $naik = "Lulus";
                        $tidaknaik="Tidak Lulus";
                    }
                }else{
                    if($kelas->namaKelas<=6){
                        $naik=$kelas->namaKelas;
                        $tidaknaik=true;
                    }else{
                        $naik = "Lulus";
                        $tidaknaik="Tidak Lulus";
                    }
                }
                $pdf = PDF::loadview('laporan/cetakUASGenapUula',compact('naik','tidaknaik','santriwustha','nilaiaktif','tanggal','kelas','periode','nilaidiniyahsorted','nilaiumumsorted','nilaiMulokSorted','walikelas'));
                $pdf->setPaper('legal');
                return $pdf->stream('raport'.$santriwustha->namaLengkap.'.pdf');
                return view('laporan/cetakUASGenapUula',compact('santriwustha','nilaiaktif','tanggal','kelas','periode','nilaidiniyahsorted','nilaiumumsorted','nilaiMulokSorted','walikelas'));
                
            }
        }elseif($jenjang=="smpPutra"){
            if($periode->semester=="Ganjil"){
                // $hitungDiniyah=count($nilaidiniyahsorted);
                // dd(count($nilaidiniyahsorted));
                // return view ('laporan/cetakUASGanjilWustha',compact('santriwustha','periode','nilaiaktif','kelas','tanggal','walikelas','nilaidiniyahsorted','nilaiBahasaSorted'));
                $pdf = PDF::loadview('laporan/cetakUASGanjilWustha',compact('santriwustha','periode','nilaiaktif','kelas','tanggal','walikelas','nilaidiniyahsorted','nilaiBahasaSorted'));
                $pdf->setPaper('legal');
                return $pdf->stream('raport'.$santriwustha->namaLengkap.'.pdf');
            }else{
                // dd($jenjang);

            }
            
        }elseif($jenjang=='smpPutri'){
            if($periode->semester=='Ganjil'){

            }else{

            }
            
        }elseif($jenjang=='smaPutra'){
            if($periode->semester=='Ganjil'){

            }else{

            }

        }
        // $pdf = PDF::loadview('laporan/cetaknilaisw',compact('santriwustha','periode','nilaiaktif','kelas','tanggal'));
        // $pdf->setPaper('legal')->setOption('margin-left',20);
        // return $pdf->stream('raport'.$santriwustha->namaLengkap.'.pdf');
    }

    public function cetaknilaitahfidz(Santriwustha $santriwustha){
        
        $tanggal=Carbon::now();
        $kelas=kelas::where('id',$santriwustha->kelas_id)->first();
        $nilaitahfidz = nilaitahfidz::where('santriwustha_id',$santriwustha->id)
                                    ->where('jenjang',jenjang())->get();
        $periode=periode::where('status','Aktif')->first();
        // dd($nilaitahfidz);
        if($nilaitahfidz!=null){
            // $cekaktif=['santriwustha_id'=> $santriwustha->id,'periode_id'=>$periode->id];
            // $nilaiaktif=nilai::where($cekaktif)->get();
            $pdf = PDF::loadview('laporan/cetaknilaitahfidz',compact('santriwustha','periode','kelas','tanggal','nilaitahfidz'));
            $pdf->setPaper('legal')->setOption('margin-left',20);
            return view('lapor
            an/cetaknilaitahfidz',compact('santriwustha','periode','nilaiaktif','kelas','tanggal','nilaitahfidz'));
            return $pdf->stream('raport'.$santriwustha->namaLengkap.'.pdf');
        }else{
            $nilaiaktif==null;
        }
    }
    public function cetakmid(Santriwustha $santriwustha){
        $tanggal=Carbon::now();
        $kelas=kelas::where('id',$santriwustha->kelas_id)->first();
        $nilai=nilai::where('kelas_id',$santriwustha->kelas_id)->first();
        $periode=periode::where('status','Aktif')->first();
        if($nilai!=null){
            $nilaiaktif=nilai::where('santriwustha_id',$santriwustha->id)
                                ->where('kelas_id',$santriwustha->kelas_id)
                                ->where('periode_id',$periode->id)
                                // ->where('mapel_id',$mapelDiniyah->id)
                                ->get();
        }else{
            $nilaiaktif==null;
        }
        /* Membagi kategori nilai */
        $nilaidiniyah=[];
        $nilaiumum=[];
        $nilaidiniyahsorted=[];
        $nilaiumumsorted=[];
        $nilaiMulokSorted=[];
        foreach($nilaiaktif as $nd)
        {
            if($nd->mapel->kategori=='diniyah')
            {
                $nd['namaMapel']= $nd->mapel->namaMapel;
                $nilaidiniyah[]=$nd;
                $nilaidiniyahsorted = array_values(Arr::sort($nilaidiniyah, function ($value) {
                    return $value['namaMapel'];
                }));
            }
            elseif($nd->mapel->kategori=='umum')
            {
                // $nilaiumum[]=$nd;
                $nd['namaMapel']= $nd->mapel->namaMapel;
                $nilaiumum[]=$nd;
                $nilaiumumsorted = array_values(Arr::sort($nilaiumum, function ($value) {
                    return $value['namaMapel'];
                }));
            }else{
                $nd['namaMapel']= $nd->mapel->namaMapel;
                $nilaiMulok[]=$nd;
                $nilaiMulokSorted = array_values(Arr::sort($nilaiMulok, function ($value) {
                    return $value['namaMapel'];
                }));
            }
        }
        $cekuser = auth()->user();
        $walikelas=waliKelas::where('user_id',$cekuser->id)->first();
        if($cekuser->jenjang=="sd"){
            $pdf = PDF::loadview('laporan/cetaknilaimidUula',compact('santriwustha','nilaiaktif','tanggal','kelas','periode','nilaidiniyahsorted','nilaiumumsorted','nilaiMulokSorted','walikelas'));
            $pdf->setPaper('legal');
            return $pdf->stream('raport'.$santriwustha->namaLengkap.'.pdf');
            return view('laporan/cetaknilaimidUula',compact('santriwustha','nilaiaktif','tanggal','kelas','periode','nilaidiniyahsorted','nilaiumumsorted','nilaiMulokSorted','walikelas'));
        }elseif($cekuser->jenjang=="smpPutra"){
            return view('laporan/cetaknilaimidWushta',compact('santriwustha','nilaiaktif','tanggal','kelas','periode'));
        }elseif($cekuser->jenjang=="smpPutri"){
            return view('laporan/cetaknilaimidBanaat',compact('santriwustha','nilaiaktif','tanggal','kelas','periode'));
        }elseif($cekuser->jenjang=="smaPutra"){
            return view('laporan/cetaknilaimidUlyaa',compact('santriwustha','nilaiaktif','tanggal','kelas','periode'));
        }
    }
}
