<?php

namespace App\Http\Controllers;

use App\mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $mapel = mapel::orderBy('namaMapel')
                        ->where('jenjang',jenjang())->paginate(10);
        return view('mapel/mapel',['mapel'=>$mapel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = new mapel;
        return view ('mapel/mapeltambah',compact('mapel'));
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
            'namaMapel' => 'required',
        ];
        $costumMessages = [
            'required' =>':attribute tidak boleh kosong',
        ];
        $requestData           = $request->all();
        $requestData['jenjang'] = jenjang();
        // dd($requestData);
        $this->validate($request,$rules,$costumMessages);
        mapel::create($requestData);
        return redirect('/mapel')->with('status', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(mapel $mapel)
    {
        return view ('mapel/mapeledit',compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mapel $mapel)
    {
        $rules =[
            'namaMapel' => 'required',
        ];
        $costumMessages = [
            'required' =>':attribute tidak boleh kosong',
        ];
        $requestData = $request->all();

        $namamapel = mapel::where('namaMapel', '=', $request->input('namaMapel'))
                            ->where('jenjang',jenjang())->first();
        if ($namamapel === null) {
            $this->validate($request,$rules,$costumMessages);
            $mapel->update($requestData);
            return redirect('/mapel')->with('status', 'Data Berhasil dirubah');
        }else {
            $costumMessages=[
                'required'=>'nama Mata Pelajaran Sudah ada'
            ];
            $this->validate($request,$rules,$costumMessages);
            return redirect('/mapel')->with('status2', 'Nama mapel Sudah Ada, mapel Gagal Dirubah');
            // validate('nama mapel sudah ada');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(mapel $mapel)
    {
        mapel::destroy($mapel->id);
        return redirect('/mapel')->with('status', 'Data Berhasil dihapus');
    }
}
