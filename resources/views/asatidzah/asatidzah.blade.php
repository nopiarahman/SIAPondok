@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Data Asatidzah') {{-- mengisi yield title dengan 1 baris code--}}
{{-- @section('menuasatidzah','active') --}}
@section('menuasatidzah','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="my-3 align-center">Data Asatidzah</h3>
          @if (session('status'))
            <div class="alert alert-success">
              {{session ('status')}}
            </div>
          @endif
        </div>
      </div>
      <div class="card px-3 mb-n1  bg-light">
      <div class="row">
                  <div class="col-md-4">
                    <a href="/asatidzahtambah" class="btn btn-primary mt-3"  >Tambah data Asatidzah</a>
                  </div>
                  <div class="col-md-8">
                    <form method="GET" action="{{ url('/asatidzah') }}" accept-charset="UTF-8" class="form-inline float-right" role="search">
                      <div class="input-group ">
                        <div class="box-tools">
                          <div class="has-feedback">
                            
                              <input type="text" name="cari" class="form-control mt-3 mb-n2" placeholder="Cari" value="{{ request('cari') }}">
                              {{-- <span class="glyphicon glyphicon-search form-control-feedback"></span> --}}
                              {{-- <i class="material-icons">search</i> --}}
                              <span class="input-group-btn ">
                                <button type="submit" class="btn btn-primary mr-1 mt-3 mb-n2"> Cari </button>
                                <a href="{{ url('/asatidzah') }}" class="btn btn-primary mt-3 mb-n2" title=""> Refresh Data </a>
                              </span>
                          </div>
                        </div>  
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card mt-2">
                <div class="body table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Asatdizah</th>
                        @if(auth()->user()->role=='kepalaYayasan')
                        <th scope="col">Jenjang</th>
                        @endif
                        <th scope="col">Email</th>
                        <th scope="col">No Telp </th>
                        <th scope="col">Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($asatidzah as $as)
                      <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$as->namaLengkap}}</td>
                        <td>{{tulisJenjang($as->jenjang)}}</td>
                        <td>{{$as->email}}</td>
                        <td>{{$as->noHP}}</td>
                        @if(auth()->user()->role=='kepalaYayasan')
                        <td><a href="dataasatidzah/{{$as->id}}" class="btn btn-success" style="border-radius: 5px ; margin:-5px ; font-size:12px">detail</a></td>
                        @else
                        <td><a href="asatidzah/{{$as->id}}" class="btn btn-success" style="border-radius: 5px ; margin:-5px ; font-size:12px">detail</a></td>
                        @endif
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
          {{$asatidzah->links()}}
      </div>
    </div>
@endsection
