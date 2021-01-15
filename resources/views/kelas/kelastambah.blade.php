@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Tambah kelas') {{-- mengisi yield title dengan 1 baris code--}}
@section('menukelas','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
  <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="my-3 align-center">Tambah Kelas</h3>
          
            <form method="POST" action="/kelas" class="pb-5" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                <div class="card p-4 bg-light">
                  <div class="form-group row">
                    <label for="namaKelas" class="col-sm-3 col-form-label">Nama Kelas</label>
                    <div class="col-sm-9 ">
                      <input type="text" class="form-control @error('namaKelas') is-invalid @enderror " id="namaKelas" name="namaKelas" value="{{old('namaKelas')}}">
                      @error('namaKelas')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                  
              {{-- Tombol --}}
              <button type="submit" class="btn btn-primary btn-block py-2"> Tambah Data</button>
            <a href="/kelas" class="btn btn-secondary btn-block py-2">Kembali</a>
            </form>
              
        </div>
      </div>
    </div>
@endsection
 