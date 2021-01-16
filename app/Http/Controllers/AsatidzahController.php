<?php

namespace App\Http\Controllers;

use App\asatidzah;
use App\User;
use Illuminate\Http\Request;

class AsatidzahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        if ($request ->get('cari')){
            $asatidzah = asatidzah::where('namaLengkap','LIKE','%'. $request->cari.'%')
                                    ->where('jenjang',jenjang())
                                    ->paginate(10); 
        }else{
            
            $asatidzah = asatidzah::orderBy('namaLengkap')
                                    ->where('jenjang',jenjang())
                                    ->paginate(10);
        }
        return view ('asatidzah/asatidzah',['asatidzah'=>$asatidzah]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // insert ke tabel user

        $asatidzah = new asatidzah;
        return view ('asatidzah/asatidzahtambah',compact('asatidzah'));
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
            'namaLengkap' => 'required',
            'noKTP' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required|date',
            'usia'=> 'numeric',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'namaInstitusi' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'noHP' => 'required',
            'email' => 'required',
            'pasPhoto' => 'file|mimes:png,jpg,jpeg',
            
        ];
        $costumMessages = [
            'required' =>':attribute tidak boleh kosong',
            'numeric' =>'Data yang dimasukkan harus angka',
            'date' => 'Perhatikan format tanggal'
        ];
        if ($request->file('pasPhoto') == null) {
            $file_photo= "";
        }else{
            $file_photo = $request->file('pasPhoto')->store('public/file/asatidzah/pasphoto');
        }

        $user = new \App\User;
        $user->role='asatidzah';
        $user->name=$request->namaLengkap;
        $user->email=$request->email;
        $user->password= bcrypt('rahasia');
        $user->remember_token= str_random(60);
        $user->jenjang = jenjang();
        $user->save();

        $request->request->add(['user_id'=>$user->id]);
        $requestData           = $request->all();
        $requestData['pasPhoto'] = $file_photo;
        $requestData['jenjang'] = jenjang();
        $this->validate($request,$rules,$costumMessages);
        asatidzah::create($requestData);
        return redirect('/asatidzah')->with('status', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\asatidzah  $asatidzah
     * @return \Illuminate\Http\Response
     */
    public function show(Asatidzah $asatidzah)
    {
        return view('asatidzah/asatidzahshow',compact('asatidzah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\asatidzah  $asatidzah
     * @return \Illuminate\Http\Response
     */
    public function edit(Asatidzah $asatidzah)
    {
        return view ('asatidzah/asatidzahedit',compact('asatidzah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\asatidzah  $asatidzah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asatidzah $asatidzah)
    {
        $rules =[
            'namaLengkap' => 'required',
            'noKTP' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required|date',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'namaInstitusi' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'noHP' => 'required',
            'email' => 'required',
            'pasPhoto' => 'file|mimes:png,jpg,jpeg',
            
        ];
        $costumMessages = [
            'required' =>':attribute tidak boleh kosong',
            'numeric' =>'Data yang dimasukkan harus angka',
            'date' => 'Perhatikan format tanggal'
        ];
        $requestData=$request->all();
        if($request->hasFile('pasPhoto')){
            $file_nama             = $request->file('pasPhoto')->store('public/file/asatidzah/pasphoto');
            $requestData['pasPhoto'] = $file_nama;
        }else{
            unset($requestData['pasPhoto']);
        }
        // dd($request);
        // $cekguru=user::where('id',$request->user_id)->first();
        // if($cekguru !=null)
        // {
            $update=user::updateOrCreate(
                [
                    'id'=>$request->user_id
                ],
                [
                    'name'=>$request->namaLengkap,
                    'email'=>$request->email,
                    'role'=>'asatidzah'
                    // 'password'=>bcrypt('rahasia')
                ]
            );
        // }
        // else
        // {
        //     $user = new \App\User;
        //     $user->role='asatidzah';
        //     $user->name=$request->namaLengkap;
        //     $user->email=$request->email;
        //     $user->password= bcrypt('rahasia');
        //     $user->remember_token= str_random(60);
        //     $user->save();
        // }
        $this->validate($request,$rules,$costumMessages);
        $asatidzah->update($requestData);
            return redirect('/asatidzah')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\asatidzah  $asatidzah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asatidzah $asatidzah)
    {
        asatidzah::destroy($asatidzah->id);
        return redirect('/asatidzah')->with('status', 'Data Berhasil dihapus');
    }
}
