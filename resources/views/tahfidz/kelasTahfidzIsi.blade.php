@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Data Kelas Tahfidz') {{-- mengisi yield title dengan 1 baris code--}}
@section ('menukelasTahfidz','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="my-3 align-center">Isi Kelas Tahfidz dengan Santri</h3>
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
            <a href="{{ url('/kelasTahfidz') }}" class="btn btn-secondary mt-3 mb-2 align-left" title=""> <i class="material-icons mx-1  mb-2 align-middle">backspace</i>Kembali</a>
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
                  <h5 class="ml-4 mt-4 mb-n2">Data Seluruh Santri </h5>
                  <div class="body table-responsive">
                    <table class="table table-hover align-center">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama Santri</th>
                          {{-- <th scope="col">ID Santri</th> --}}
                          <th scope="col">Wali Santri</th>
                          <th scope="col">Kelas Reguler</th>
                          <th scope="col">Kelas Tahfidz</th>
                          <th scope="col">Ganti Kelas Tahfidz</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($santriwustha as $sw)
                          <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$sw->namaLengkap}}</td>
                            {{-- <td>{{$sw->id}}</td> --}}
                            <td>{{$sw->namaWali}}</td>
                            <td>Kelas {{$sw->kelas->namaKelas}}</td>
                            <td>{{$sw->kelasTahfidz->namaKelas}}</td>
                            
                            <td>
  
                            {{-- modal ganti kelas --}}
                            <div class="modal fade" id="gantikelas{{$sw->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Pilih Kelas Tahfidz</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
  
                                      <div class="body table-responsive-xl">
                                        <table class="table table-hover align-center">
                                          <thead>
                                            <tr>
                                              <th scope="col">No</th>
                                              <th scope="col">Nama Kelas</th>
                                              <th scope="col">Aksi</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                            @foreach ($kelas as $ks)
                                            <form action="/kelasTahfidz/kelasisi" method="post" enctype="multipart/form-data">
                                              @csrf
                                            <th scope="row">{{$loop->iteration}}</th>
                                              <td>{{$ks->namaKelas}}</td>
                                              <td><button type="submit" class="col-form-label btn btn-success " id="data">Pilih kelas</button></td>
                                            </tr>
                                              <input type="hidden" name="kelastahfidz_id" value="{{$ks->id}}" />
                                              <input type="hidden" name="id" value="{{$sw->id}}" />
                                            </form>
                                            {{-- {{$kelas->links()}} --}}
                                            @endforeach
                                          </tbody>
                                        </table>
                                        </div>
                                      </div>
  
                                    </div>
                                    <div class="modal-footer">
                                      {{-- </form>   --}}
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <button id="gantikelas" type="button" class="col-form-label btn btn-success " style="border-radius: 5px ;  font-size:12px" data-toggle="modal" data-target="#gantikelas{{$sw->id}}">
                              Ganti kelas
                            </button> 
                          </td>
                            <td>
                               
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
  
            {{$santriwustha->links()}}
  
            {{-- <div class="col-md-6">
              <div class="card mt-2">
                <h5 class="ml-4 mt-4 mb-n2">Santri Kelas   </h5>
                <div class="body table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Santri</th>
                        <th scope="col">Wali Santri</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($santriwustha as $sw)
                      <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$sw->namaLengkap}}</td>
                        <td>{{$sw->namaWali}}</td>
                        <td>{{$sw->kelas->namaKelas}}</td>
                        
                        <td><a href="santriwustha/{{$sw->id}}" class="btn btn-success" style="border-radius: 5px ; margin:-5px ; font-size:12px">Pilih</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
          {{$santriwustha->links()}} --}}
        </div>
  </div>
  </div>
  </div>
@endsection
