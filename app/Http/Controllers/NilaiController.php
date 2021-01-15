<?php

namespace App\Http\Controllers;

use App\nilai;
use App\santriwustha;
use App\jadwalbelajar;
use App\asatidzah;
use App\mapel;
use App\kelas;
use App\periode;
use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $periode=periode::where('status','Aktif')->first();
        $santriwustha = santriwustha::orderBy('namaLengkap')->get();
        $nilai = nilai::orderBy('santriwustha_id')->paginate(10);
        $jadwalbelajar = jadwalbelajar::orderBy('hari')->paginate(10);

        $cekasatidzah=asatidzah::where('user_id','=',auth()->user()->id)->first();
        $jadwalaktif=jadwalbelajar::where('periode_id','=',$periode->id)
                                    ->where('asatidzah_id','=',$cekasatidzah->id)
                                    ->paginate(10);
        // $nilaikelas=$jadwalaktif->firstWhere('kelas_id');
        // dd($nilaikelas);
        // dd($jadwalaktif);
        return view ('nilai/nilai',compact('kelas','santriwustha','jadwalbelajar','nilai','jadwalaktif','periode'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $jadwalbelajar)
    {
        $periode=periode::where('status','Aktif')->first();
        $rules =[
            'harian' => 'required',
            'uts' => 'required',
            'uas' => 'required',
            'akhlak' => 'required'
        ];
        $costumMessages = [
            'required' =>':attribute tidak boleh kosong',
            'size' =>':attribute maksimal 100',
        ];
        $requestData           = $request->all();
        $requestData['rataRata']= 0.2*$request->harian + 0.2*$request->uts + 0.3*$request->uas + 0.3*$request->akhlak; 
        $requestData['periode_id'] = $periode->id;
        $this->validate($request,$rules,$costumMessages);
        $ceknilai = DB::table('nilai')
                    ->where('santriwustha_id', '=', $request->santriwustha_id)
                    ->where('mapel_id', '=', $request->mapel_id)
                    // ->where('jadwalbelajar_id', '=', $request->jadwalbelajar_id)
                    ->where('kelas_id', '=', $request->kelas_id)
                    ->where('periode_id', '=', $periode->id)
                    ->first();
        if (is_null($ceknilai)) {
            // return ('data nilai belum ada')
            nilai::create($requestData);
            // update rata rata kelas
            $ceknilaikelas = DB::table('nilai')
                    ->where('mapel_id', '=', $request->mapel_id)
                    ->where('kelas_id', '=', $request->kelas_id)
                    ->where('periode_id', '=', $periode->id)
                    ->get();
            $total = 0;
            $hitung = 0;
            foreach($ceknilaikelas as $cn){
                $total = $total+$cn->rataRata;
                $hitung++;
            }
            // dd($ceknilaikelas); 
            if ($hitung!=null){
                $rataRataKelas = round($total/$hitung,2);
            }
            else{
                $rataRataKelas=0;

            }
            $cekrata=['mapel_id'=> $request->mapel_id,'periode_id'=>$periode->id,'kelas_id'=>$request->kelas_id];
            nilai::where($cekrata)
                            ->update(['rataRatakelas'=>$rataRataKelas]);
            return redirect('/nilai'.'/'.$jadwalbelajar)->with('status', 'Data Berhasil Ditambahkan');
            // It does not exist - add to favorites button will show
        } else {
            // return ('data nilai sudah ada');
            return redirect('/nilai'.'/'.$jadwalbelajar)->with('status2', 'Data Nilai Sudah Ada');
            
        }
        
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Jadwalbelajar $jadwalbelajar)
    {
        // dd($jadwalbelajar);
        $santriwustha = santriwustha::orderby('namaLengkap')->get();
        $nilai = nilai::orderBy('santriwustha_id')->paginate(10);
        $jadwalsemua= jadwalbelajar::all();
        $daftarnilai=nilai::where('kelas_id','=',$jadwalbelajar->kelas_id)
                            ->where('periode_id',$jadwalbelajar->periode_id)
                            ->where('mapel_id',$jadwalbelajar->mapel_id)->get();
        $rataRataKelas=$daftarnilai->first();
        // dd($rataRataKelas);
        return view ('/nilai/nilaiisi',compact('jadwalbelajar','daftarnilai','santriwustha','nilai','jadwalsemua','rataRataKelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nilai $nilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(nilai $nilai)
    {
        // dd($jadwalbelajar);
        nilai::destroy($nilai->id);
        return back()->with('status', 'Data Berhasil dihapus');
    }
}
