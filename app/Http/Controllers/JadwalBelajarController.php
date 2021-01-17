<?php

namespace App\Http\Controllers;

use App\jadwalbelajar;
use App\mapel;
use App\asatidzah;
use App\kelas;
use App\periode;
use Illuminate\Http\Request;

class JadwalBelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    { 
        $cekuser = auth()->user();
        $cekasatidzah=asatidzah::where('user_id','=',$cekuser->id)->first();
        $periode=periode::where('status','Aktif')->first();
        if ($request ->get('cari')){
            $cariasatidzah = asatidzah::where('namaLengkap','LIKE','%'.$request->cari.'%')->where('jenjang',jenjang())->first();
            if($cariasatidzah!=null)
            {
                $jadwalaktif = jadwalbelajar::where('asatidzah_id',$cariasatidzah->id)->orderBy('hari')
                                                ->where('jenjang',jenjang())->paginate(10); 
                return view ('/jadwalbelajar/jadwalbelajar',compact('jadwalbelajar','periode','jadwalaktif','jadwalaktifguru')); 
            }
            else
            {
                $jadwalaktif=jadwalbelajar::where('periode_id','=',$periode->id)->orderBy('hari')
                                            ->where('jenjang',jenjang())->paginate(10);
            }
        }else
        {
            $jadwalaktif=jadwalbelajar::where('periode_id','=',$periode->id)->orderBy('hari')
                                        ->where('jenjang',jenjang())->paginate(10);
        }
        // dd($jadwalaktif);
        if(auth()->user()->role=='asatidzah')
        {
        $jadwalaktifguru=jadwalbelajar::where('periode_id','=',$periode->id)
                                        ->where('asatidzah_id','=',$cekasatidzah->id)
                                        ->where('jenjang',jenjang())
                                        ->orderBy('hari')->get();
        return view ('/jadwalbelajar/jadwalbelajar',compact('periode','jadwalaktif','jadwalaktifguru')); 
        }                             
        return view ('/jadwalbelajar/jadwalbelajar',compact('periode','jadwalaktif')); 

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        $jadwalbelajar = new jadwalbelajar;
        $asatidzah = asatidzah::orderBy('namaLengkap')->where('jenjang',jenjang())->get();
        $mapel = mapel::orderBy('namaMapel')->where('jenjang',jenjang())->get();
        $kelas = kelas::orderBy('namaKelas')->where('jenjang',jenjang())->get();
        return view ('/jadwalbelajar/jadwalbelajartambah',compact('jadwalbelajar','asatidzah','mapel','kelas')); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $periode=periode::where('status','Aktif')->first();
        $requestData           = $request->all();
        $requestData['periode_id'] = $periode->id;
        $requestData['jenjang']=jenjang();
        jadwalbelajar::create($requestData);
        return redirect('/jadwalbelajar')->with('status', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jadwalbelajar  $jadwalbelajar
     * @return \Illuminate\Http\Response
     */
    public function show(jadwalbelajar $jadwalbelajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jadwalbelajar  $jadwalbelajar
     * @return \Illuminate\Http\Response
     */
    public function edit(jadwalbelajar $jadwalbelajar)
    {
        $asatidzah = asatidzah::orderBy('namaLengkap')->where('jenjang',jenjang())->paginate(10);
        $mapel = mapel::orderBy('namaMapel')->where('jenjang',jenjang())->paginate(10);
        $kelas = kelas::orderBy('namaKelas')->where('jenjang',jenjang())->paginate(10);
        return view ('jadwalbelajar/jadwalbelajaredit',compact('jadwalbelajar','mapel','kelas','asatidzah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jadwalbelajar  $jadwalbelajar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jadwalbelajar $jadwalbelajar)
    {
        $jadwalbelajar->update($request->all());
            return redirect('/jadwalbelajar')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jadwalbelajar  $jadwalbelajar
     * @return \Illuminate\Http\Response
     */
    public function destroy(jadwalbelajar $jadwalbelajar)
    {
        jadwalbelajar::destroy($jadwalbelajar->id);
        return redirect('/jadwalbelajar')->with('status', 'Data Berhasil dihapus');
    }
}
