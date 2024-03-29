<?php

namespace App\Http\Controllers;

use App\pelanggaran;
use App\santriwustha;
use DB;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pelanggaran = pelanggaran::latest()
                        ->where('jenjang',jenjang())
                        ->get();
        return view('pelanggaran/pelanggaran',['pelanggaran'=>$pelanggaran]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if ($request ->get('cari')){
            $santriwustha = santriwustha::where('namaLengkap','LIKE','%'. $request->cari.'%')
                                        ->where('jenjang',jenjang())
                                        ->get(); 
        }else{
            
            $santriwustha = santriwustha::orderBy('namaLengkap')
                                        ->where('jenjang',jenjang())
                                        ->get();
        }

        $pelanggaran = new pelanggaran;
        return view ('pelanggaran/pelanggarantambah',compact('pelanggaran','santriwustha'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData           = $request->all();
        if($request->jenisPelanggaran == "Ringan"){
            $requestData['poin']=2;
        }elseif($request->jenisPelanggaran == "Sedang"){
            $requestData['poin']=5;
        }elseif($request->jenisPelanggaran == "Berat"){
            $requestData['poin']=10;
        }elseif($request->jenisPelanggaran == "Sangat Berat"){
            $requestData['poin']=20;
        }
        $requestData['jenjang']=jenjang();
        pelanggaran::create($requestData);
        return redirect('/pelanggaran')->with('status', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function show(pelanggaran $pelanggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function edit(pelanggaran $pelanggaran)
    {
        // dd($pelanggaran);
        return view ('pelanggaran/pelanggaranedit',compact('pelanggaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pelanggaran $pelanggaran)
    {
        // dd($request);
        $rules =[
            'jenisPelanggaran' => 'required',
            'tanggalPelanggaran' => 'required',
            'keterangan' => 'required',
            
        ];
        $costumMessages = [
            'required' =>':attribute tidak boleh kosong',
            'numeric' =>'Data yang dimasukkan harus angka',
            
        ];
        $requestData=$request->all();
        $this->validate($request,$rules,$costumMessages);
        $pelanggaran->update($requestData);
            return redirect('/pelanggaran')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(pelanggaran $pelanggaran)
    {
        pelanggaran::destroy($pelanggaran->id);
        return redirect('/pelanggaran')->with('status', 'Data Berhasil dihapus');
    }

}
