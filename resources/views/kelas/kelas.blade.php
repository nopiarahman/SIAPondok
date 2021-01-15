@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Data Kelas') {{-- mengisi yield title dengan 1 baris code--}}
{{-- @section('menuasatidzah','active') --}}
@section('menukelas','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="my-3 align-center">Daftar Kelas Salafiyah Wustha</h3>
          @if (session('status'))
            <div class="alert alert-success">
              {{session ('status')}}
            </div>
          @elseif (session ('status2'))
          <div class="alert alert-warning">
            {{session ('status2')}}
          </div>
          @endif
        </div>
      </div>
      @if(auth()->user()->role=='admin')
      <div class="card px-3 mb-n1  bg-light">
      <div class="row">
        <div class="col-md-4">
          {{-- <a href="/kelastambah" class="btn btn-primary my-3"  >Tambah kelas baru</a> --}}

          <button type="button" class="btn btn-primary my-3" style="border-radius: 5px ;  font-size:12px" data-toggle="modal" data-target="#tambahkelas">
            Tambah Kelas Baru
          </button>
          <a href="/kelas/kelasisi/" class="btn btn-success" style="border-radius: 5px ;  font-size:12px" >Isi Kelas</a>
                          
          {{-- modal tambah--}}
          <div class="modal fade" id="tambahkelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas Baru</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="/kelas" class="pb-5" enctype="multipart/form-data">
                    @csrf
                    <label for="namaKelas" class="col-sm-3 col-form-label">Nama Kelas</label>
                    <div class="col-sm-9 ">
                      <input type="text" class="form-control my-2 @error('namaKelas') is-invalid @enderror" id="namaKelas" name="namaKelas"}}">
                      @error('namaKelas')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>  
                    <button type="submit" class="btn btn-info px-4 ml-3 ">Tambah</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  </form>  
                </div>
                <div class="modal-footer">
                </div>
              </div>
            </div>
          </div>
          
        </div>
        @endif
      </div>
    </div>
    <div class="card mt-2">
      <div class="body table-responsive">
        <table class="table table-hover align-center">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Kelas</th>
              <th scope="col">Wali Kelas</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kelas as $ks)
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
              <td>{{$ks->namaKelas}}</td>
              <td>{{$ks->waliKelas}}</td>
                <td>
                <a href="/kelas/{{$ks->id}}" type="button" class="btn btn-success " style="border-radius: 5px ;  font-size:12px">
                  Lihat Kelas
                </a>
                @if(auth()->user()->role=='admin')

                <button type="button" class="btn btn-info " style="border-radius: 5px ;  font-size:12px" data-toggle="modal" data-target="#modaledit{{$ks->id}}">
                Edit Data
              </button>
              <button type="button" class="btn btn-danger " style="border-radius: 5px ;  font-size:12px" data-toggle="modal" data-target="#exampleModal{{$ks->id}}">
                Hapus Data
              </button>
              @endif
              {{-- modal hapus--}}
              <div class="modal fade" id="exampleModal{{$ks->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus data kelas</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    Yakin ingin hapus data kelas {{$ks->namaKelas}} ini?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <form action="/kelas/{{$ks->id}}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger px-4 ml-2">Hapus</button>
                      </form>  
                    </div>
                  </div>
                </div>
              </div>
              {{-- modal edit --}}             
              <div class="modal fade" id="modaledit{{$ks->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit kelas</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="/kelas/{{$ks->id}}" method="POST" class="d-inline" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <label for="namaKelas" class="col-sm-3 col-form-label">Nama Kelas</label>
                        <div class="col-sm-9 ">
                          <input type="text" class="form-control @error('namaKelas') is-invalid @enderror" id="namaKelas" name="namaKelas" value="{{$ks->namaKelas}}">
                          @error('namaKelas')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>  
                        <button type="submit" class="btn btn-info px-4 ml-2 ">Edit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      </form>  
                    </div>
                    <div class="modal-footer">
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$kelas->links()}}
    </div>
  </div>
</div>
</div>
</div>
  
                  
                  

   
@endsection
