<?php

namespace App\Http\Controllers;

use App\periode;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
// use Illuminate\Database\Eloquent\Collection;
class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = periode::orderBy('tahun','DESC')->paginate(10);
        return view ('periode/periode',compact('periode'));
    }
    public function setaktif($id)
    {
        // dd($id);
        $periode = periode::orderBy('tahun','DESC')->paginate(10);
        $nonaktif= periode::where('status','Aktif')->update(['status'=>'Tidak Aktif']);
        $aktif=periode::find($id)->update(['status'=>'Aktif']);
        return redirect ('/periode')->with('status', 'Periode Berhasil Diaktifkan');
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
            'tahun' => 'required',
        ];
        $costumMessages = [
            'required' =>':attribute tidak boleh kosong',
        ];
        $requestData           = $request->all();
        $this->validate($request,$rules,$costumMessages);
        periode::create($requestData);
        return redirect('/periode')->with('status', 'Periode Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function show(periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function edit(periode $periode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, periode $periode)
    {
        $rules =[
            'tahun' => 'required',
        ];
        $costumMessages = [
            'required' =>':attribute tidak boleh kosong',
        ];
        $requestData = $request->all();

        $cek = periode::where('tahun', '=', $request->input('tahun'))->first();
        $kedua = ['tahun'=> $request->input('tahun'),'semester'=> $request->input('semester')];
        $cek2 = periode::where($kedua)->first();
        if ($cek === null || $cek2 === null) {
            $this->validate($request,$rules,$costumMessages);
            $periode->update($requestData);
            return redirect('/periode')->with('status', 'Data Berhasil dirubah');
        }else {
            $costumMessages=[
                'required'=>'Periode Sudah ada'
            ];
            $this->validate($request,$rules,$costumMessages);
            return redirect('/periode')->with('status2', 'Periode Sudah Ada, Periode Gagal Dirubah');
            // validate('nama mapel sudah ada');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function destroy(periode $periode)
    {
        periode::destroy($periode->id);
        return redirect('/periode')->with('status', 'Data Berhasil dihapus');
    }
}
