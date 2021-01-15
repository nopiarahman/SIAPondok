@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Form Edit Data Santri') {{-- mengisi yield title dengan 1 baris code--}}
@section('menuasatidzah','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
  <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="mt-3 align-center">Edit Data Asatidzah</h3>
          
          
        <form method="POST" action="/asatidzah/{{$asatidzah->id}}" enctype="multipart/form-data">
            @method('patch')
                @csrf
                {{-- Data Santri --}}
              <div class="card p-4 bg-light">
                <h5 class="mb-4">IDENTITAS Asatidzah</h5>
                  <div class="form-group row">
                  <input type="hidden" name="user_id" value="{{$asatidzah->user_id}}">
                    <label for="namaLengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9 ">
                      <input type="text" class="form-control @error('namaLengkap') is-invalid @enderror " id="namaLengkap" name="namaLengkap" value="{{$asatidzah->namaLengkap}}">
                      @error('namaLengkap')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="noKTP" class="col-sm-3 col-form-label">Nomor KTP</label>
                    <div class="col-sm-9 ">
                      <input type="text" class="form-control @error('noKTP') is-invalid @enderror" id="noKTP" name="noKTP" value="{{$asatidzah->noKTP}}">
                      @error('noKTP')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>  
                  </div>
                  <div class="form-group row">
                    <label for="tempatLahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-9 ">
                      <input type="text" class="form-control @error('tempatLahir') is-invalid @enderror" id="tempatLahir" name="tempatLahir" value="{{$asatidzah->tempatLahir}}">
                      @error('tempatLahir')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>  
                  </div>
                  <div class="form-group row">
                    <label for="tanggalLahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-9 ">
                      <input type="date" class="form-control @error('tanggalLahir') is-invalid @enderror" id="tanggalLahir" name="tanggalLahir" value="{{$asatidzah->tanggalLahir}}">
                      @error('tanggalLahir')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>  
                  </div>
                  <div class="form-group row">
                    <label for="jabatan" class="col-sm-3 col-form-label">Jabatan dalam Struktur</label>
                    <div class="col-sm-9 ">
                      <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{$asatidzah->jabatan}}">
                      @error('jabatan')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>  
                  </div>
              <div class="form-group row">
                <label for="usia" class="col-sm-3 col-form-label">Usia</label>
                <div class="col-sm-9 ">
                <input type="text" class="form-control @error('usia') is-invalid @enderror" id="usia" name="usia" value="{{$asatidzah->usia}}">
                  @error('usia')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
              <div class="form-group row">
                <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama" value="{{$asatidzah->agama}}">
                  @error('agama')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>

              <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label col-sm-3 pt-0">Golongan Darah</legend>
                  <div class="col-sm-9 ">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="golDarah" id="golDarah1" value="A" @if ($asatidzah->golDarah=='A') checked @endif >
                      <label class="form-check-label" for="golDarah1">
                        A
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="golDarah" id="golDarah2" value="B" @if ($asatidzah->golDarah=='B') checked @endif >
                      <label class="form-check-label" for="golDarah2">
                        B
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="golDarah" id="golDarah3" value="AB" @if ($asatidzah->golDarah=='AB') checked @endif >
                      <label class="form-check-label" for="golDarah3">
                        AB
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="golDarah" id="golDarah4" value="O" @if ($asatidzah->golDarah=='O') checked @endif >
                      <label class="form-check-label" for="golDarah4">
                        O
                      </label>
                    </div>
                  </div>
                </div>
              </fieldset>

              <div class="form-group row">
                <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{$asatidzah->pekerjaan}}">
                  @error('pekerjaan')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
            {{-- </div> --}}
              {{-- Data Ayah --}}
            {{-- <div class="card p-4 bg-light" >  
              <h5 class="mb-4">Data Ayah</h5> --}}
              <div class="form-group row">
                <label for="tinggiBerat" class="col-sm-3 col-form-label">Tinggi/Berat badan</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('tinggiBerat') is-invalid @enderror " id="tinggiBerat" name="tinggiBerat" value="{{$asatidzah->tinggiBerat}}">
                  @error('tinggiBerat')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan terakhir</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan" name="pendidikan" value="{{$asatidzah->pendidikan}}">
                  @error('pendidikan')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
              <div class="form-group row">
                <label for="namaInstitusi" class="col-sm-3 col-form-label">Nama Institusi</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('namaInstitusi') is-invalid @enderror" id="namaInstitusi" name="namaInstitusi" value="{{$asatidzah->namaInstitusi}}">
                  @error('namaInstitusi')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
              <div class="form-group row">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{$asatidzah->alamat}}">
                  @error('alamat')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
              <div class="form-group row">
                <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" value="{{$asatidzah->kecamatan}}">
                  @error('kecamatan')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
              <div class="form-group row">
                <label for="kabupaten" class="col-sm-3 col-form-label">Kabupaten</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten" value="{{$asatidzah->kabupaten}}">
                  @error('kabupaten')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
              <div class="form-group row">
                <label for="kodePos" class="col-sm-3 col-form-label">Kode Pos</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('kodePos') is-invalid @enderror" id="kodePos" name="kodePos" value="{{$asatidzah->kodePos}}">
                  @error('kodePos')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
              <div class="form-group row">
                <label for="noHP" class="col-sm-3 col-form-label">Nomor Telepon</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('noHP') is-invalid @enderror" id="noHP" name="noHP" value="{{$asatidzah->noHP}}">
                  @error('noHP')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$asatidzah->email}}">
                  @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
            
                <div class="form-group row">
                  <label for="pasPhoto" class="col-sm-3 col-form-label">Pas Photo</label>
                  <div class="col-sm-9 ">
                    <input type="file" class="form-control @error('pasPhoto') is-invalid @enderror" id="pasPhoto" name="pasPhoto" value="{{$asatidzah->pasPhoto}}">
                    @if ($asatidzah->pasPhoto != "")   
                        <img src="{{ \Storage::url($asatidzah->pasPhoto) }}" class="img border rounded mt-3 p-1" width="250">
                    @endif 
                    @error('pasPhoto')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
              </div>
              {{-- Tombol --}}
              <button type="submit" class="btn btn-primary">Rubah Data</button>
            </form>
              
        </div>
      </div>
    </div>
@endsection
 