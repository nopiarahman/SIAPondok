<?php

namespace App\Http\Controllers;

use App\santriwustha;
use App\kelas;
use App\User;
use App\orangtua;
use Illuminate\Http\Request;

class SantriWusthaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        if ($request->get('cari')) {
            $santriwustha = santriwustha::where('namaLengkap', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        } else {

            $santriwustha = santriwustha::orderBy('namaLengkap')
                                        ->where('jenjang',jenjang())
                                        ->paginate(10);
            // dd($santriwustha);
        }   
        return view('santri/santriwustha', ['santriwustha' => $santriwustha]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $santriwustha = new santriwustha;
        return view('santri/santriwusthatambah', compact('santriwustha'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $rules = [
            'namaLengkap' => 'required',
            'namaPanggilan' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required|date',
            'anakKe' => 'required|numeric',
            'namaAyah' => 'required',
            'pendidikanAyah' => 'required',
            'tanggalLahirAyah' => 'required|date',
            'pekerjaanAyah' => 'required',
            'alamatAyah' => 'required',
            'penghasilanAyah' => 'required',
            'teleponAyah' => 'required',
            'namaIbu' => 'required',
            'tempatLahirIbu' => 'required',
            'teleponIbu' => 'required',
            'namaWali' => 'required',
            'emailWali' => 'required',
            'pekerjaanWali' => 'required',
            'alamatWali' => 'required',
            'penghasilanWali' => 'required',
            'teleponWali' => 'required',
            'pasPhoto'        => 'file|mimes:png,jpg,jpeg',
            'suratWaliSantri'        => 'file|mimes:pdf,jpg,jpeg,png'

        ];
        $costumMessages = [
            'required' => ':attribute tidak boleh kosong',
            'numeric' => 'Data yang dimasukkan harus angka',
            'date' => 'Perhatikan format tanggal'
        ];
        if ($request->file('pasPhoto') == null) {
            $file_photo = "";
        } else {
            $file_photo = $request->file('pasPhoto')->store('public/file/wustha/pasphoto');
        }
        if ($request->file('suratWaliSantri') == null) {
            $file_suratWaliSantri = "";
        } else {
            $file_suratWaliSantri = $request->file('suratWaliSantri')->store('public/file/wustha/suratWaliSantri');
        }
        $jenjang=auth()->user()->jenjang;
        $kelas = kelas::where('jenjang',$jenjang)->orderBy('namaKelas')->first();
        $requestData           = $request->all();
        $requestData['pasPhoto'] = $file_photo;
        $requestData['suratWaliSantri'] = $file_suratWaliSantri;
        $requestData['jenjang'] = $jenjang;
        $requestData['kelas_id'] = $kelas->id;
        $this->validate($request, $rules, $costumMessages);
        santriwustha::create($requestData);
        // $user = new \App\User;
        $user = User::create([
            'role' => 'waliSantri',
            'name' => $request->namaWali,
            'email' => $request->emailWali,
            'password' => bcrypt('rahasia'),
            'jenjang' => $jenjang,
        ]);
        return redirect('/santriwustha')->with('status', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\santriwustha  $santriwustha
     * @return \Illuminate\Http\Response
     */
    public function show(santriwustha $santriwustha)
    {
        return view('santri/santriwusthashow', compact('santriwustha'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\santriwustha  $santriwustha
     * @return \Illuminate\Http\Response
     */
    public function edit(santriwustha $santriwustha)
    {
        return view('santri/santriwusthaedit', compact('santriwustha'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\santriwustha  $santriwustha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, santriwustha $santriwustha)
    {
        $rules = [
            'namaLengkap' => 'required',
            'namaPanggilan' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required|date',
            'anakKe' => 'required|numeric',
            'sekolahSebelum' => 'required',
            'alamatSekolahSebelum' => 'required',
            'nisnSekolahSebelum' => 'required',
            'namaAyah' => 'required',
            'pendidikanAyah' => 'required',
            'tanggalLahirAyah' => 'required|date',
            'pekerjaanAyah' => 'required',
            'alamatAyah' => 'required',
            'penghasilanAyah' => 'required',
            'teleponAyah' => 'required',
            'namaIbu' => 'required',
            'pendidikanIbu' => 'required',
            'teleponIbu' => 'required',
            'namaWali' => 'required',
            'pekerjaanWali' => 'required',
            'alamatWali' => 'required',
            'penghasilanWali' => 'required',
            'teleponWali' => 'required',
            'pasPhoto'        => 'file|mimes:png,jpg,jpeg',
            'suratWaliSantri'        => 'file|mimes:pdf,jpg,jpeg,png'
        ];
        $costumMessages = [
            'required' => ':attribute tidak boleh kosong',
            'numeric' => 'Data yang dimasukkan harus angka',
            'date' => 'Perhatikan format tanggal'
        ];
        $requestData = $request->all();
        if ($request->hasFile('pasPhoto')) {
            $file_nama             = $request->file('pasPhoto')->store('public/file/wustha/pasphoto');
            $requestData['pasPhoto'] = $file_nama;
        } else {
            unset($requestData['pasPhoto']);
        }
        if ($request->hasFile('suratWaliSantri')) {
            $file_nama             = $request->file('suratWaliSantri')->store('public/file/wustha/suratWaliSantri');
            $requestData['suratWaliSantri'] = $file_nama;
        } else {
            unset($requestData['suratWaliSantri']);
        }
        $this->validate($request, $rules, $costumMessages);
        $santriwustha->update($requestData);
        return redirect('/santriwustha')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\santriwustha  $santriwustha
     * @return \Illuminate\Http\Response
     */
    public function destroy(santriwustha $santriwustha)
    {
        santriwustha::destroy($santriwustha->id);
        return redirect('/santriwustha')->with('status', 'Data Berhasil dihapus');
    }
    public function gantistatus (Request $request, Santriwustha $santriwustha){
        // dd($request);
        $requestData=$request->all();
        santriwustha::find($santriwustha->id)->update($requestData);
        return redirect('/santriwustha')->with('status', 'Data Berhasil Diubah');

    }
}
