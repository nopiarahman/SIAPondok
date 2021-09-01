<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelastahfidz;
use App\gurutahfidz;
use App\santriwustha;
use App\user;
use App\asatidzah;

class KelasTahfidzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelasTahfidz = kelastahfidz::where('jenjang',jenjang())
                                    ->get();
        $asatidzah = asatidzah::orderBy('namaLengkap')->where('jenjang',jenjang())->get();
        return view ('tahfidz/kelasTahfidzIndex',compact('kelasTahfidz','asatidzah'));
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
        $rules =[
            'namaKelas' => 'required',
        ];
        $costumMessages = [
            'required' =>':attribute tidak boleh kosong',
        ];
        $requestData           = $request->all();
        $requestData ['jenjang'] = jenjang();
        $this->validate($request,$rules,$costumMessages);
        kelastahfidz::create($requestData);
        return redirect('/kelasTahfidz')->with('status', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(kelastahfidz $kelas , Request $request)
    {
        // dd($kelas);
        $santriwustha = santriwustha::orderby('namaLengkap')
                                        ->where('kelastahfidz_id',$kelas->id)->get();
                                        // ->where('jenjang',jenjang())->get();
                                        // dd($santriwustha);
        return view ('/tahfidz/kelasTahfidzShow',compact('santriwustha','kelas'));

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
    public function update(Request $request, Kelastahfidz $kelas)
    {
        $rules =[
            'namaKelas' => 'required',
        ];
        $costumMessages = [
            'required' =>':attribute tidak boleh kosong',
        ];
        $requestData           = $request->all();

        $namaKelas = kelastahfidz::where('namaKelas', '=', $request->input('namaKelas'))
                            ->where('jenjang',jenjang())->first();
        if ($namaKelas === null) {
            $this->validate($request,$rules,$costumMessages);
            $kelas->update($requestData);
            return redirect('/kelasTahfidz')->with('status', 'Data Berhasil dirubah');
        }else {
            $costumMessages=[
                'required'=>'nama Kelas Sudah ada'
            ];
            $this->validate($request,$rules,$costumMessages);
            return redirect('/kelasTahfidz')->with('status2', 'Nama Kelas Sudah Ada, Kelas Gagal Dirubah');
            // validate('nama Kelas sudah ada');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kelastahfidz::destroy($id);
        return redirect('/kelasTahfidz')->with('status', 'Kelas Tahfidz Berhasil Dihapus');
    }
    public function isiPengampu(Request $request){
        // dd($request);
        /* Mengecek walikelas */
        $cekGuruTahfidz = gurutahfidz::where('email',$request->email)->first();
        if ($cekGuruTahfidz != null){
            /* menampilkan pesan gagal */
            return redirect('/kelasTahfidz')->with('status3', 'Asatidzah sudah mengampu Tahfidz dikelas yang lain, silahkan pilih asatidzah lain');
        }else{
            /* Menyimpan Data Wali Kelas */
            $ambilUser = user::where('email',$request->email)->first();
            $requestData = $request->all();
            $requestData ['jenjang'] = jenjang();
            $requestData ['kelasTahfidz_id'] = $request->id;
            $requestData ['user_id'] = $ambilUser->id;
            gurutahfidz::create($requestData);
            return redirect('/kelasTahfidz')->with('status', 'Wali Kelas Berhasil Ditambahkan');
        }
    }
    public function isi(kelastahfidz $kelas , Request $request){
        if ($request ->get('cari')){
            $santriwustha = santriwustha::where('namaLengkap','LIKE','%'. $request->cari.'%')
                                        ->where('jenjang',jenjang())->get(); 
        }else{
            
            $santriwustha = santriwustha::orderBy('namaLengkap')
                                        ->where('jenjang',jenjang())->get();
        }
        $kelas = kelastahfidz::orderBy('namaKelas')
                        ->where('jenjang',jenjang())->get();
        return view ('tahfidz/kelasTahfidzIsi',compact('request','santriwustha','kelas'));
    }
    public function isikelas(kelastahfidz $kelas , Request $request){
        // dd($request);
        if ($request->kelastahfidz_id != null)
        {
            $santri = santriwustha::find($request->id);
            $santri->kelastahfidz_id = $request->kelastahfidz_id;
            $santri->save();
        }
        else
        {
            // Checkbox is not checked
        }
        if ($request ->get('cari')){
            $santriwustha = santriwustha::where('namaLengkap','LIKE','%'. $request->cari.'%')
                                        ->where('jenjang',jenjang())->get(); 
        }else{
            
            $santriwustha = santriwustha::orderBy('namaLengkap')
                                        ->where('jenjang',jenjang())->get();
        }
        $kelas = kelastahfidz::orderBy('namaKelas')
                        ->where('jenjang',jenjang())->get();

        $requestData           = $request->all();

        $isi = santriwustha::where('kelastahfidz_id', '=', $request->input('kelastahfidz_id'))
                            ->where('jenjang',jenjang())->first();
        return view ('tahfidz/kelasTahfidzIsi',compact('request','santriwustha','kelas'));
    
    }

}
