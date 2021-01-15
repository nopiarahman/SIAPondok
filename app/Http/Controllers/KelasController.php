<?php

namespace App\Http\Controllers;

use App\kelas;
use App\santriwustha;
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
        $kelas = kelas::orderBy('namaKelas')->paginate(5);
        return view('kelas/kelas',['kelas'=>$kelas]);
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
        $santriwustha = santriwustha::orderby('namaLengkap')->get();
        return view ('/kelas/kelasshow',compact('santriwustha','kelas'));
    }
    public function isi(kelas $kelas , Request $request)
    {
        if ($request ->get('cari')){
            $santriwustha = santriwustha::where('namaLengkap','LIKE','%'. $request->cari.'%')->paginate(10); 
        }else{
            
            $santriwustha = santriwustha::orderBy('namaLengkap')->paginate(10);
        }
        $kelas = kelas::orderBy('namaKelas')->get();
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
            $santriwustha = santriwustha::where('namaLengkap','LIKE','%'. $request->cari.'%')->paginate(10); 
        }else{
            
            $santriwustha = santriwustha::orderBy('namaLengkap')->paginate(10);
        }
        $kelas = kelas::orderBy('namaKelas')->paginate(10);

        $requestData           = $request->all();

        $isi = santriwustha::where('kelas_id', '=', $request->input('kelas_id'))->first();
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

        $namaKelas = kelas::where('namaKelas', '=', $request->input('namaKelas'))->first();
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
}
