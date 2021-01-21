@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Data Santri Salafiyah Wustha') {{-- mengisi yield title dengan 1 baris code--}}
@section ('menukelas','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
    <div class="container">
      <div class="row">
        <div class="col-12">
        <h3 class="my-3 align-center">Isi Kelas {{$kelas->namaKelas}}</h3>
          @if (session('status'))
            <div class="alert alert-success">
              {{session ('status')}}
            </div>
          @endif
        </div>
      </div>
      <div class="card px-3 mb-n1 bg-light">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ url('/kelas') }}" type="button"  class="btn btn-secondary mt-3 mb-2 align-left" title=""> <i class="material-icons mx-1  mb-2 align-middle">backspace</i>Kembali</a>
            <form method="GET" action="/kelas/kelasisi/" accept-charset="UTF-8" class="form-inline float-right" role="search">
                <div class="input-group ">
                  <div class="box-tools">
                    <div class="has-feedback">
                        <input type="text" name="cari" class="form-control mt-3 mb-n2" placeholder="Cari data santri" value="{{ request('cari') }}">
                        <span class="input-group-btn ">
                          <button type="submit" class="btn btn-primary mr-1 mt-3 mb-n2"> Cari </button>
                        <a href="{{ url('/kelas/kelasisi') }}" class="btn btn-primary mt-3 mb-n2" title=""> Refresh Data </a>
                        </span>
                    </div>
                  </div>  
                </div>
              </form>
            </div>
          </div>
        </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card mt-2">
                  <h5 class="ml-4 mt-4 mb-n2"> Santri didalam kelas {{$kelas->namaKelas}} </h5>
                  <div class="body table-responsive">
                    <table class="table table-hover align-center">
                      <thead>
                        <tr>
                          {{-- <th scope="col">No</th> --}}
                          <th scope="col">Nama Santri</th>
                          <th scope="col">Wali Santri</th>
                          <th scope="col">Kelas Reguler</th>
                          <th scope="col">Kelas Tahfidz</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($santriwustha as $sw)
                        <tr>
                            {{-- <th scope="row">{{$loop->iteration}}</th> --}}
                            <td>{{$sw->namaLengkap}}</td>
                            <td>{{$sw->namaWali}}</td>
                            <td>Kelas {{$sw->kelas->namaKelas}}</td>
                            <td>{{$sw->kelastahfidz->namaKelas}}</td>
                            <td> <a href="/santriwustha/{{$sw->id}}" type="button" class="btn btn-secondary" > Detail </a> </td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
  
            {{-- {{$santriwustha->links()}} --}}
  
        </div>
  </div>
  </div>
  </div>
@endsection
