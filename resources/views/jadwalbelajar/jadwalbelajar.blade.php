@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Data Jadwal Belajar') {{-- mengisi yield title dengan 1 baris code--}}
@section('jadwalbelajar','active')
@section('menujadwal','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="my-3 align-center">Jadwal Mengajar Asatidzah</h3>
          @if (session('status'))
            <div class="alert alert-success">
              {{session ('status')}}
            </div>
          @endif
        </div>
      </div>
      <div class="card px-3 mb-1 bg-light">
        <div class="row">
        <h6 class="mx-auto mt-3">Periode Aktif: Semester {{$periode->semester}} Tahun Ajaran {{$periode->tahun}} </h6>
        </div>
      </div>
      <div class="card px-3 mb-n1  bg-light">
      <div class="row">

              @if(auth()->user()->role=='admin')
                  <div class="col-md-4">
                    <a href="/jadwalbelajartambah" class="btn btn-primary mt-3"  >Tambah Jadwal</a>
                  </div>
                  @endif
                  <div class="col-md-8">
                    <form method="GET" action="{{ url('/jadwalbelajar') }}" accept-charset="UTF-8" class="form-inline float-right" role="search">
                      <div class="input-group ">
                        <div class="box-tools">
                          <div class="has-feedback">
                            
                              <input type="text" name="cari" class="form-control mt-3 mb-n2" placeholder="Cari" value="{{ request('cari') }}">
                              {{-- <span class="glyphicon glyphicon-search form-control-feedback"></span> --}}
                              {{-- <i class="material-icons">search</i> --}}
                              <span class="input-group-btn ">
                                <button type="submit" class="btn btn-primary mr-1 mt-3 mb-n2"> Cari </button>
                                <a href="{{ url('/jadwalbelajar') }}" class="btn btn-primary mt-3 mb-n2" title=""> Refresh Data </a>
                              </span>
                          </div>
                        </div>  
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              
              <div class="card mt-2">
                <div class="body table-responsive ">
                  <table class="table table-hover align-center">
                    <thead>
                      <tr>
                        @if(auth()->user()->role=='admin' )
                        <th scope="col">No</th>
                        <th scope="col">Nama Asatidzah</th>
                        @endif
                        <th scope="col">Materi Pelajaran</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Hari </th>
                        <th scope="col">Jam Mulai</th>
                        <th scope="col">Jam Selesai</th>

                      @if(auth()->user()->role=='admin' )
                        <th scope="col">Aksi</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
                      @if(auth()->user()->role=='asatidzah')
                      @foreach ($jadwalaktifguru as $jb)
                      <tr>
                        {{-- <th scope="row">{{$loop->iteration}}</th> --}}
                        {{-- <td>{{$jb->asatidzah->namaLengkap}}</td> --}}
                        <td>{{$jb->mapel->namaMapel}}</td>
                        <td>{{$jb->kelas->namaKelas}}</td>
                        <td>{{$jb->hari}}</td>
                        <td>{{$jb->jamMulai}}</td>
                        <td>{{$jb->jamSelesai}}</td>
                        @endforeach
                        @elseif(auth()->user()->role=='admin' )
                        @foreach ($jadwalaktif as $jb)
                          <th scope="row">{{$loop->iteration}}</th>
                          {{-- <td>{{$jb->periode_id}}</td> --}}
                        <td>{{$jb->asatidzah->namaLengkap}}</td>
                        <td>{{$jb->mapel->namaMapel}}</td>
                        <td>{{$jb->kelas->namaKelas}}</td>
                        <td>{{$jb->hari}}</td>
                        <td>{{$jb->jamMulai}}</td>
                        <td>{{$jb->jamSelesai}}</td>
                          {{-- @endif --}}
                      {{-- @if(auth()->user()->role=='admin' ) --}}
                      <td><a href="/jadwalbelajar/{{$jb->id}}/edit"><button type="button" class="btn btn-info " style="border-radius: 5px ;  font-size:12px" >
                          Edit Data
                        </button></a>
                        <button type="button" class="btn btn-danger " style="border-radius: 5px ;  font-size:12px" data-toggle="modal" data-target="#exampleModal{{$jb->id}}">
                          Hapus Data
                        </button>
                        {{-- modal hapus--}}
                        <div class="modal fade" id="exampleModal{{$jb->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Jadwal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              Yakin ingin hapus data jadwal ini?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <form action="/jadwalbelajar/{{$jb->id}}" method="POST" class="d-inline">
                                  @method('delete')
                                  @csrf
                                  <button type="submit" class="btn btn-danger px-4 ml-2">Hapus</button>
                                </form>  
                              </div>
                            </div>
                          </div>
                        </div>

                        {{-- <td><a href="pelanggaran/{{$pg->id}}" class="btn btn-success" style="border-radius: 5px ; margin:-5px ; font-size:12px">detail</a></td> --}}
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
              
              @if(auth()->user()->role=='admin' )
          {{$jadwalaktif->links()}}
          @endif
      </div>
    </div>

@endsection
