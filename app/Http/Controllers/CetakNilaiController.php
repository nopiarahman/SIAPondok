<?php

namespace App\Http\Controllers;

use App\laporan;
use App\kelas;
use App\mapel;
use App\periode;
use App\jadwalbelajar;
use App\santriwustha;
use App\nilai;
use App\surah;
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
                $pdf = PDF::loadview('laporan/cetakUASGanjilWustha',compact('santriwustha','periode','nilaiaktif','kelas','tanggal','walikelas','nilaidiniyahsorted','nilaiBahasaSorted','nilaiumumsorted'));
                $pdf->setPaper('legal');
                return $pdf->stream('raport'.$santriwustha->namaLengkap.'.pdf');
            }else{
                $statusNaik = "naik";
                if($statusNaik=="naik"){
                    if($kelas->namaKelas<=3){
                        $naik = $kelas->namaKelas+1;
                        $tidaknaik=false;
                    }else{
                        $naik = "Lulus";
                        $tidaknaik="Tidak Lulus";
                    }
                }else{
                    if($kelas->namaKelas<=3){
                        $naik=$kelas->namaKelas;
                        $tidaknaik=true;
                    }else{
                        $naik = "Lulus";
                        $tidaknaik="Tidak Lulus";
                    }
                }
                $pdf = PDF::loadview('laporan/cetakUASGenapWustha',compact('naik','tidaknaik','santriwustha','nilaiaktif','tanggal','kelas','periode','nilaidiniyahsorted','nilaiumumsorted','nilaiMulokSorted','walikelas','nilaiBahasaSorted','nilaiumumsorted'));
                $pdf->setPaper('legal');
                return $pdf->stream('raport'.$santriwustha->namaLengkap.'.pdf');
                return view ('laporan/cetakUASGenapWustha',compact('santriwustha','periode','nilaiaktif','kelas','tanggal','walikelas','nilaidiniyahsorted','nilaiBahasaSorted','tidaknaik','naik'));
                // dd($jenjang);
            }
        }elseif($jenjang=='smpPutri'){
            $nilaiDiniyahTeori=[];
            $nilaiBahasaTeori=[];
            $nilaiBahasaPraktek=[];
            $nilaiDiniyahPraktek=[];
            foreach($nilaidiniyahsorted as $nilai){
                if($nilai->mapel->jenis=='teori'){
                    $nilaiDiniyahTeori[]=$nilai;
                }else{
                    $nilaiDiniyahPraktek[]=$nilai;
                }
            }
            foreach($nilaiBahasaSorted as $nb){
                if($nb->mapel->jenis=='teori'){
                    $nilaiBahasaTeori[]=$nb;
                }else{
                    $nilaiBahasaPraktek[]=$nb;
                }
            }
            if($periode->semester=='Ganjil'){
                $pdf = PDF::loadview('laporan/cetakUASGanjilBanaat',compact('santriwustha','periode','nilaiaktif','kelas','tanggal','walikelas','nilaidiniyahsorted','nilaiBahasaSorted','nilaiumumsorted','nilaiDiniyahTeori','nilaiDiniyahPraktek','nilaiBahasaTeori','nilaiBahasaPraktek'));
                $pdf->setPaper('legal');
                return $pdf->stream('raport'.$santriwustha->namaLengkap.'.pdf');
            }else{
                $statusNaik = "naik";
                if($statusNaik=="naik"){
                    if($kelas->namaKelas<=3){
                        $naik = $kelas->namaKelas+1;
                        $tidaknaik=false;
                    }else{
                        $naik = "Lulus";
                        $tidaknaik="Tidak Lulus";
                    }
                }else{
                    if($kelas->namaKelas<=3){
                        $naik=$kelas->namaKelas;
                        $tidaknaik=true;
                    }else{
                        $naik = "Lulus";
                        $tidaknaik="Tidak Lulus";
                    }
                }
                $pdf = PDF::loadview('laporan/cetakUASGenapBanaat',compact('santriwustha','periode','nilaiaktif','kelas','tanggal','walikelas','nilaidiniyahsorted','nilaiBahasaSorted','nilaiumumsorted','nilaiDiniyahTeori','nilaiDiniyahPraktek','nilaiBahasaTeori','nilaiBahasaPraktek','naik','tidaknaik'));
                $pdf->setPaper('legal');
                return $pdf->stream('raport'.$santriwustha->namaLengkap.'.pdf');
            }
            
        }elseif($jenjang=='smaPutra'){
            if($periode->semester=='Ganjil'){
                $pdf = PDF::loadview('laporan/cetakUASGanjilUlyaa',compact('santriwustha','periode','nilaiaktif','kelas','tanggal','walikelas','nilaidiniyahsorted','nilaiBahasaSorted','nilaiumumsorted'));
                $pdf->setPaper('legal');
                return $pdf->stream('raport'.$santriwustha->namaLengkap.'.pdf');
            }else{

            }

        }
    }

    public function cetaknilaitahfidz(Santriwustha $santriwustha){
        
        $tanggal=Carbon::now();
        $kelas=kelas::where('id',$santriwustha->kelas_id)->first();
        $nilaitahfidz = nilaitahfidz::where('santriwustha_id',$santriwustha->id)
                                    ->where('jenjang',jenjang())->get();
        $periode=periode::where('status','Aktif')->first();
        $surah=surah::all();
        $duaJuz=$surah->whereBetween('noSurah',[67,114])->reverse();
        $nilaiSurah=$duaJuz->merge($nilaitahfidz);

        dd($nilaiSurah);
        if($nilaitahfidz!=null){
            $pdf = PDF::loadview('laporan/cetaknilaitahfidz',compact('duaJuz','santriwustha','periode','kelas','tanggal','nilaitahfidz'));
            $pdf->setPaper('legal')->setOption('margin-left',20);
            // return view('laporan/cetaknilaitahfidz',compact('santriwustha','periode','nilaiaktif','kelas','tanggal','nilaitahfidz'));
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
        $cekuser = auth()->user();
        $walikelas=waliKelas::where('user_id',$cekuser->id)->first();
        if($cekuser->jenjang=="sd"){
            $pdf = PDF::loadview('laporan/cetaknilaimidUula',compact('santriwustha','nilaiaktif','tanggal','kelas','periode','nilaidiniyahsorted','nilaiumumsorted','nilaiMulokSorted','walikelas'));
            $pdf->setPaper('legal');
            return $pdf->stream('raport'.$santriwustha->namaLengkap.'.pdf');
            return view('laporan/cetaknilaimidUula',compact('santriwustha','nilaiaktif','tanggal','kelas','periode','nilaidiniyahsorted','nilaiumumsorted','nilaiMulokSorted','walikelas'));
        }elseif($cekuser->jenjang=="smpPutra"){
            $pdf = PDF::loadview('laporan/cetaknilaimidWustha',compact('santriwustha','nilaiaktif','tanggal','kelas','periode','nilaidiniyahsorted','nilaiumumsorted','nilaiMulokSorted','walikelas','nilaiBahasaSorted','nilaiumumsorted'));
            $pdf->setPaper('legal');
            return $pdf->stream('raport'.$santriwustha->namaLengkap.'.pdf');
            return view('laporan/cetaknilaimidWustha',compact('santriwustha','nilaiaktif','tanggal','kelas','periode','nilaidiniyahsorted','nilaiumumsorted','nilaiMulokSorted','walikelas','nilaiBahasaSorted','nilaiumumsorted'));
        }elseif($cekuser->jenjang=="smpPutri"){
            $nilaiDiniyahTeori=[];
            $nilaiBahasaTeori=[];
            $nilaiBahasaPraktek=[];
            $nilaiDiniyahPraktek=[];
            foreach($nilaidiniyahsorted as $nilai){
                if($nilai->mapel->jenis=='teori'){
                    $nilaiDiniyahTeori[]=$nilai;
                }else{
                    $nilaiDiniyahPraktek[]=$nilai;
                }
            }
            foreach($nilaiBahasaSorted as $nb){
                if($nb->mapel->jenis=='teori'){
                    $nilaiBahasaTeori[]=$nb;
                }else{
                    $nilaiBahasaPraktek[]=$nb;
                }
            }
            $pdf = PDF::loadview('laporan/cetaknilaimidBanaat',compact('santriwustha','periode','nilaiaktif','kelas','tanggal','walikelas','nilaidiniyahsorted','nilaiBahasaSorted','nilaiumumsorted','nilaiDiniyahTeori','nilaiDiniyahPraktek','nilaiBahasaTeori','nilaiBahasaPraktek'));
            $pdf->setPaper('legal');
            return $pdf->stream('raport'.$santriwustha->namaLengkap.'.pdf');
            return view('laporan/cetaknilaimidBanaat',compact('santriwustha','periode','nilaiaktif','kelas','tanggal','walikelas','nilaidiniyahsorted','nilaiBahasaSorted','nilaiumumsorted','nilaiDiniyahTeori','nilaiDiniyahPraktek','nilaiBahasaTeori','nilaiBahasaPraktek'));
        }elseif($cekuser->jenjang=="smaPutra"){
            $pdf = PDF::loadview('laporan/cetaknilaimidUlyaa',compact('santriwustha','nilaiaktif','tanggal','kelas','periode','nilaidiniyahsorted','nilaiumumsorted','nilaiMulokSorted','walikelas','nilaiBahasaSorted','nilaiumumsorted'));
            $pdf->setPaper('legal');
            return $pdf->stream('raport'.$santriwustha->namaLengkap.'.pdf');
        }
    }
}
