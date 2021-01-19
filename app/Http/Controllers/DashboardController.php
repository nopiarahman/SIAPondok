<?php

namespace App\Http\Controllers;
use App\santriwustha;
use App\nilai;
use App\periode;
use App\jadwalbelajar;
use App\pelanggaran;
use App\mapel;
use App\kelas;
use App\asatidzah;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $cekuser = auth()->user();
        $santriwustha=santriwustha::all();
        $asatidzah=asatidzah::all();
        $mapel=mapel::all();
        $periode=periode::where('status','Aktif')->first();
        $waktu=carbon::now();
        $hari=$waktu->isoFormat('dddd');
        $jenjang =jenjang();
        /* Menyimpan nama marhalah */
        // if(auth()->user()->jenjang=="sd"){
        //     $jenjang="Salafiyyah Uulaa";
        // }
        // elseif(auth()->user()->jenjang=="smpPutra"){
        //     $jenjang="Salafiyyah Wustha'";
        // }
        // elseif(auth()->user()->jenjang=="smpPutri"){
        //     $jenjang="Tahfidzul Qur'an Lil Banaat";
        // }
        // else{
        //     $jenjang="Salafiyyah Ulyaa";
        // }
        
        if(auth()->user()->role=='waliSantri')
        {
            $santriwustha=santriwustha::where('emailWali','=',$cekuser->email)->first();
            
            $cekaktif=['santriwustha_id'=> $santriwustha->id,'periode_id'=>$periode->id];
            $nilaiaktif=nilai::where($cekaktif)->orderBy('mapel_id')->get();
            // dd($nilaiaktif);
            $jadwalbelajar = jadwalbelajar::where('kelas_id',$santriwustha->kelas_id)->get();
            return view ('dashboard/index',compact('cekuser','santriwustha','periode'));
        }
        elseif(auth()->user()->role=='asatidzah')
        {
            $cekasatidzah=asatidzah::where('user_id','=',$cekuser->id)->first();
            $cekjadwalaktif=['asatidzah_id'=> $cekasatidzah->id,'periode_id'=>$periode->id];
            $cekjadwal=jadwalbelajar::where($cekjadwalaktif)->get();
            //  dd($cekasatidzah->id);

            if($hari=='Minggu'){
                $jadwalHariIni=jadwalbelajar::where('hari','Ahad')
                                            ->where($cekjadwalaktif)
                                            ->get();
                // dd($jadwalHariIni);
            }else{
                $jadwalHariIni=jadwalbelajar::where('hari',$hari)
                                            ->where($cekjadwalaktif)
                                            ->get();
            }
            // dd($jadwalHariIni);
            return view ('dashboard/index',compact('cekuser','santriwustha','periode','cekjadwal','asatidzah','mapel','jadwalHariIni'));
        }
        elseif(auth()->user()->role=='kepalaYayasan')
        {
            return view ('dashboard/index',compact('cekuser'));
        }
        $kelas=kelas::orderBy('namaKelas')->get();
            $namaKelas=[];
            $data=[];
            foreach($kelas as $ks)
            {
                $namaKelas[]=$ks->namaKelas;
                $data[]=santriwustha::where('kelas_id',$ks->id)->count();
            }

        /* return view untuk Admin */
        return view ('dashboard/index',compact('cekuser','santriwustha','periode','asatidzah','mapel','namaKelas','data','jenjang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
