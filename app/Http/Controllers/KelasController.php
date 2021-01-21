<?php

namespace App\Http\Controllers;

use App\kelas;
use App\santriwustha;
use App\asatidzah;
use App\waliKelas;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $kelas = kelas::orderBy('namaKelas')
                        ->where('jenjang',jenjang())
                        ->get();
        $asatidzah = asatidzah::orderBy('namaLengkap')->where('jenjang',jenjang())->get();
        return view('kelas/kelas',compact('kelas','asatidzah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = new kelas;

        return view ('kelas/kelastambah',compact('kelas'));
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
        kelas::create($requestData);
        return redirect('/kelas')->with('status', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(kelas $kelas , Request $request)
    {
        $santriwustha = santriwustha::orderby('namaLengkap')
                                        ->where('jenjang',jenjang())->get();
        return view ('/kelas/kelasshow',compact('santriwustha','kelas'));
    }
    public function isi(kelas $kelas , Request $request)
    {
        if ($request ->get('cari')){
            $santriwustha = santriwustha::where('namaLengkap','LIKE','%'. $request->cari.'%')
                                        ->where('jenjang',jenjang())->paginate(10); 
        }else{
            
            $santriwustha = santriwustha::orderBy('namaLengkap')
                                        ->where('jenjang',jenjang())->paginate(10);
        }
        $kelas = kelas::orderBy('namaKelas')
                        ->where('jenjang',jenjang())->get();
        return view ('kelas/kelasisi',compact('request','santriwustha','kelas'));
    }
    public function isikelas(kelas $kelas , Request $request)
    {
        // dd($request);
        if ($request->kelas_id != null)
        {
            $santri = santriwustha::find($request->id);
            $santri->kelas_id = $request->kelas_id;
            $santri->save();
        }
        else
        {
            // Checkbox is not checked
        }
        if ($request ->get('cari')){
            $santriwustha = santriwustha::where('namaLengkap','LIKE','%'. $request->cari.'%')
                                        ->where('jenjang',jenjang())->paginate(10); 
        }else{
            
            $santriwustha = santriwustha::orderBy('namaLengkap')
                                        ->where('jenjang',jenjang())->paginate(10);
        }
        $kelas = kelas::orderBy('namaKelas')
                        ->where('jenjang',jenjang())->paginate(10);

        $requestData           = $request->all();

        $isi = santriwustha::where('kelas_id', '=', $request->input('kelas_id'))
                            ->where('jenjang',jenjang())->first();
        return view ('kelas/kelasisi',compact('request','santriwustha','kelas'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(kelas $kelas)
    {
        return view ('kelas/kelasedit',compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kelas $kelas)
    {
        $rules =[
            'namaKelas' => 'required',
        ];
        $costumMessages = [
            'required' =>':attribute tidak boleh kosong',
        ];
        $requestData           = $request->all();

        $namaKelas = kelas::where('namaKelas', '=', $request->input('namaKelas'))
                            ->where('jenjang',jenjang())->first();
        if ($namaKelas === null) {
            $this->validate($request,$rules,$costumMessages);
            $kelas->update($requestData);
            return redirect('/kelas')->with('status', 'Data Berhasil dirubah');
        }else {
            $costumMessages=[
                'required'=>'nama Kelas Sudah ada'
            ];
            $this->validate($request,$rules,$costumMessages);
            return redirect('/kelas')->with('status2', 'Nama Kelas Sudah Ada, Kelas Gagal Dirubah');
            // validate('nama Kelas sudah ada');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(kelas $kelas)
    {
        kelas::destroy($kelas->id);
        return redirect('/kelas')->with('status', 'Data Berhasil dihapus');
    }
    public function isiWaliKelas(Request $request)
    {
        /* Mengecek walikelas */
        $cekWaliKelas = walikelas::where('email',$request->email)->first();
        if ($cekWaliKelas != null){
            /* menampilkan pesan gagal */
            return redirect('/kelas')->with('status3', 'Asatidzah sudah menjadi Wali kelas dikelas yang lain, silahkan pilih asatidzah lain');
        }else{
            /* Menyimpan Data Wali Kelas */
            $ambilUser = user::where('email',$request->email)->first();
            $requestData = $request->all();
            $requestData ['jenjang'] = jenjang();
            $requestData ['kelas_id'] = $request->id;
            $requestData ['user_id'] = $ambilUser->id;
            waliKelas::create($requestData);
            return redirect('/kelas')->with('status', 'Wali Kelas Berhasil Ditambahkan');
        }
    }
    public function gantiWaliKelas (Request $request)
    { 
        /* Mengecek walikelas */
        $cekWaliKelas = walikelas::where('email',$request->email)->first();
        if ($cekWaliKelas != null){
            /* menampilkan pesan gagal */
            return redirect('/kelas')->with('status3', 'Asatidzah sudah menjadi Wali kelas di kelas yang lain, silahkan pilih asatidzah lain');
        }else{
            /* Update Wali Kelas */
            $ambilUser = user::where('email',$request->email)->first();
            $update ['namaLengkap'] = $request->namaLengkap;
            $update ['email'] = $request->email;
            $update ['jenjang'] = jenjang();
            $update ['kelas_id'] = $request->id;
            $update ['user_id']=$ambilUser->id;
            walikelas::where('kelas_id',$request->id)
                        ->update($update);
            return redirect('/kelas')->with('status2', 'Wali Kelas Berhasil Dirubah');
        }
    }   
}
