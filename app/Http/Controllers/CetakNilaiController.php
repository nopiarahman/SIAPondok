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
            $cekaktif=['santriwustha_id'=> $santriwustha->id,'periode_id'=>$periode->id];
            $nilaiaktif=nilai::where($cekaktif)->get();
        }else{
            $nilaiaktif==null;
        }
        $pdf = PDF::loadview('laporan/cetaknilaisw',compact('santriwustha','periode','nilaiaktif','kelas','tanggal'));
        $pdf->setPaper('legal')->setOption('margin-left',20);
        return $pdf->stream('raport'.$santriwustha->namaLengkap.'.pdf');
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
        $mapelDiniyah=mapel::where('kategori','diniyah')
                                ->where('jenjang',jenjang())->get();
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
            // dd($nilaidiniyahsorted);
        $cekuser = auth()->user();
        $walikelas=waliKelas::where('user_id',$cekuser->id)->first();
        // dd($nilaiMulokSorted);
        // dd($cekuser->jenjang);
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
