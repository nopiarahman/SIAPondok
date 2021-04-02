<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gurutahfidz;
use App\surah;
use App\nilaitahfidz;
use App\santriwustha;
use DB;
class NilaiTahfidzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cekguru = gurutahfidz::where('jenjang',jenjang())
                                ->where('user_id',auth()->user()->id)->first();
        $santriwustha = santriwustha::where('jenjang',jenjang())
                                    ->where('kelastahfidz_id',$cekguru->kelastahfidz_id)->paginate(10);
        return view('/tahfidz/nilaiindex',compact('santriwustha','cekguru'));
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
        nilaitahfidz::destroy($id);
        return back()->with('status', 'Data Berhasil dihapus');
    }
    public function isi($request){
        // dd($request);
        $ceknilai=nilaitahfidz::where('santriwustha_id',$request)->get();
        $santriwustha = santriwustha::find($request);
        $surah = surah::orderBy('noSurah','DESC')->paginate(10);
        // dd($surah);
        return view('tahfidz/nilaitahfidzisi',compact('ceknilai','surah','santriwustha'));
    }
    public function isinilai(Request $request){
        // dd($request);
        $requestData = $request->all();
        $requestData['jenjang']=jenjang();
        // $santriwustha = santriwustha::find($request->santriwustha_id);
        // dd($requestData);

        nilaitahfidz::create($requestData);
        return redirect('nilaitahfidz/isi'.'/'.$request->santriwustha_id)->with('status', 'Data Berhasil Ditambahkan');
    }
    public function loadData(Request $request)
    {
        // dd($request);
    	if ($request->has('q')) {
    		$cari = $request->q;
    		$data = surah::select('id', 'namaSurah')->where('namaSurah', 'LIKE', '%'.$cari.'%')->get();
            // dd($data);
    		return response()->json($data);
    	}
    }
    public function testcari(Request $request){
        // dd($request);
    }
}
