<?php

namespace App\Http\Controllers;

use App\laporan;
use App\kelas;
use App\mapel;
use App\periode;
use App\jadwalbelajar;
use App\santriwustha;
use App\waliKelas;
use App\nilai;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = kelas::orderBy('namaKelas')
                        ->where('jenjang',jenjang())->paginate(10);
        return view('laporan/laporan',['kelas'=>$kelas]);
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
     * @param  \App\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(laporan $laporan, kelas $kelas)
    {

        $cekuser = auth()->user();
        $cekwaliKelas=waliKelas::where('user_id',$cekuser->id)->first();
        $nilai=nilai::where('kelas_id',$cekwaliKelas->kelas->id)->get();
        $santriwustha=santriwustha::where('kelas_id',$cekwaliKelas->kelas->id)
                                    ->where('jenjang',jenjang())
                                    ->get();
        // dd($santriwustha);
        return view ('laporan/laporanshow',compact('santriwustha','kelas','cekwaliKelas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(laporan $laporan)
    {
        //
    }
    public function detail(Santriwustha $santriwustha)
    {
        $nilai=nilai::where('kelas_id',$santriwustha->kelas_id)->where('jenjang',jenjang())->first();
        $semuanilai=mapel::all();
        $periode=periode::where('status','Aktif')->first();
        if($nilai!=null){
            $ceknilai = DB::table('nilai')
                    ->where('kelas_id', '=', $nilai->kelas_id)
                    ->where('jenjang',jenjang())
                    ->get();
            $cekaktif=['santriwustha_id'=> $santriwustha->id,'periode_id'=>$periode->id];
            $nilaiaktif=nilai::where($cekaktif)
                            ->where('jenjang',jenjang())->get();
            // $nilaiaktifurut=$nilaiaktif->orderBy($nilaiaktif->namaMapel)->get();
            // dd($nilaiaktifurut);
        }else{
            $nilaiaktif==null;
        }

        $nilaidiniyah=[];
        $nilaiumum=[];
        $nilaidiniyahsorted=[];
        $nilaiumumsorted=[];
        $nilaiMulokSorted=[];
        $nilaiBahasaSorted=[];
        $nilaibahasa=[];
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
            elseif($nd->mapel->kategori=='umum')
            {
                // $nilaiumum[]=$nd;
                $nd['namaMapel']= $nd->mapel->namaMapel;
                $nilaiumum[]=$nd;
                $nilaiumumsorted = array_values(Arr::sort($nilaiumum, function ($value) {
                    return $value['namaMapel'];
                }));
            }
                elseif($nd->mapel->kategori=='bahasa'){
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
        // dd($sorted);
        // dd($nilaiMulokSorted);
        // $urut=$nilaidiniyah->sortBy($nilaidiniyah->mapel->namaMapel);
        // dd($urut->value()->all());
        return view ('laporan/laporandetail',compact('santriwustha','nilaiaktif','periode','nilaidiniyahsorted','nilaiumumsorted','nilaiMulokSorted','nilaiBahasaSorted'));
    }
}
