<?php

namespace App\Http\Controllers;

use App\laporan;
use App\kelas;
use App\mapel;
use App\periode;
use App\jadwalbelajar;
use App\santriwustha;
use App\nilai;
use Carbon\Carbon;
use PDF;
use SnappyImage;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class CetakNilaiController extends Controller
{
    public function cetak(Santriwustha $santriwustha)
    {
        // $periode=periode::where('status','Aktif')->first();
        // return view ('laporan/cetaknilai',compact('santriwustha','periode'));
        $nilai=nilai::where('kelas_id',$santriwustha->kelas_id)->first();
        $semuanilai=mapel::all();
        $periode=periode::where('status','Aktif')->first();
        if($nilai!=null){
            $ceknilai = DB::table('nilai')
                    ->where('kelas_id', '=', $nilai->kelas_id)
                    ->get();
            $cekaktif=['santriwustha_id'=> $santriwustha->id,'periode_id'=>$periode->id];
            $nilaiaktif=nilai::where($cekaktif)->get();
            // $nilaiaktifurut=$nilaiaktif->orderBy($nilaiaktif->namaMapel)->get();
            // dd($nilaiaktifurut);
        }else{
            $nilaiaktif==null;
        }

        $nilaidiniyah=[];
        $nilaiumum=[];
        $nilaidiniyahsorted=[];
        $nilaiumumsorted=[];
        foreach($nilaiaktif as $nd)
        {
            // $testnilai = $nd;
            // $testnilai['namaMapel']=$nd->mapel->namaMapel;
            
            if($nd->mapel->kategori=='diniyah')
            {
                $nd['namaMapel']= $nd->mapel->namaMapel;
                $nilaidiniyah[]=$nd;
                $nilaidiniyahsorted = array_values(Arr::sort($nilaidiniyah, function ($value) {
                    return $value['namaMapel'];
                }));
            }
            else
            {
                // $nilaiumum[]=$nd;
                $nd['namaMapel']= $nd->mapel->namaMapel;
                $nilaiumum[]=$nd;
                $nilaiumumsorted = array_values(Arr::sort($nilaiumum, function ($value) {
                    return $value['namaMapel'];
                }));
            }
        }
        $waktu=carbon::now();
        // dd($sorted);
        // dd($nilaidiniyahsorted);
        // $urut=$nilaidiniyah->sortBy($nilaidiniyah->mapel->namaMapel);
        // dd($urut->value()->all());
        // $pegawai = Pegawai::all();
        
        // return view ('laporan/cetaknilai',compact('santriwustha','nilaiaktif','periode','nilaidiniyahsorted','nilaiumumsorted','waktu'));
        $pdf = PDF::loadview('laporan/cetaknilai',compact('santriwustha','nilaiaktif','periode','nilaidiniyahsorted','nilaiumumsorted','waktu'));
        // $pdf->setPaper('A4', 'portait');
        return $pdf->stream();
    }

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
            // $nilaiaktifurut=$nilaiaktif->orderBy($nilaiaktif->namaMapel)->get();
            // dd($nilaiaktifurut);
        }else{
            $nilaiaktif==null;
        }
        // dd(terbilang($angka));
        // $durusullughoh=$nilaiaktif->where('mapel_id',19)->first();
        // dd($durusullughoh->rataRata);
        // dd($santriwustha->kelas_id);
        // dd($kelas->waliKelas);
        $periode=periode::where('status','Aktif')->first();
        // return view ('laporan/cetaknilaisw',compact('santriwustha','periode','nilaiaktif','kelas','tanggal'));


        $pdf = PDF::loadview('laporan/cetaknilaisw',compact('santriwustha','periode','nilaiaktif','kelas','tanggal'));
        $pdf->setPaper('legal')->setOption('margin-left',20);
        return $pdf->stream('raport'.$santriwustha->namaLengkap.'.pdf');
        // return $pdf->stream();
    }
}
