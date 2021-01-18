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
        // $santriwustha = santriwustha::orderBy('namaLengkap')->paginate(5);
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
        /* Menyimpan Data User */
        $user ['name'] = $request->namaLengkap;
        $user ['email'] = $request->email;
        $user ['password']= bcrypt('rahasia');
        $user ['role']="waliKelas";
        $user ['jenjang']=jenjang();
        $userData = user::create($user);
        // dd($userData);
        /* Menyimpan Data Wali Kelas */
        $requestData = $request->all();
        $requestData ['jenjang'] = jenjang();
        $requestData ['kelas_id'] = $request->id;
        $requestData ['user_id'] = $userData->id;
        waliKelas::create($requestData);

        return redirect('/kelas')->with('status', 'Wali Kelas Berhasil Ditambahkan');
    }
    public function gantiWaliKelas (Request $request)
    { 
        /* Update Wali Kelas */
        $update ['namaLengkap'] = $request->namaLengkap;
        $update ['email'] = $request->email;
        $update ['jenjang'] = jenjang();
        $update ['kelas_id'] = $request->id;
        $updateData=waliKelas::where('kelas_id',$request->id)->first();
        walikelas::where('kelas_id',$request->id)
                    ->update($update);
        /* Update Table User */
        $updateUser ['name'] = $request->namaLengkap;
        $updateUser ['email'] = $request->email;
        $updateUser ['password']= bcrypt('rahasia');
        $updateUser ['role']="waliKelas";
        $updateUser ['jenjang']=jenjang();
        // dd($updateUser);
        user::find($updateData->user_id)
            ->update($updateUser);
        
        return redirect('/kelas')->with('status2', 'Wali Kelas Berhasil Dirubah');
    }   
}
