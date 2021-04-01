@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Data Mata Pelajaran') {{-- mengisi yield title dengan 1 baris code--}}
{{-- @section('menuasatidzah','active') --}}
@section('menumapel','active')
@section('container') {{-- mengisi yield container dengan lebih dari 1 baris code --}}
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="my-3 align-center">Daftar Mata Pelajaran {{jenjangLengkap()}}</h3>
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
    <div class="card px-3 mb-n1  bg-light">
        <div class="row">
            <div class="col-md-4">
                {{-- <a href="/kelastambah" class="btn btn-primary my-3"  >Tambah kelas baru</a> --}}

                <button type="button" class="btn btn-primary my-3" style="border-radius: 5px ;  font-size:12px"
                    data-toggle="modal" data-target="#tambahmapel">
                    Tambah Mata Pelajaran Baru
                </button>
                {{-- modal tambah--}}
                <div class="modal fade" id="tambahmapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran Baru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/mapel" class="pb-5" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-1"> 
                                      <div class="col-sm-4">
                                        <label for="namaMapel" class=" col-form-label">Nama Mata Pelajaran</label>
                                      </div>
                                      <div class="col-sm-8 ">
                                          <input type="text"
                                              class="form-control my-2 @error('namaMapel') is-invalid @enderror"
                                              id="namaMapel" name="namaMapel" }}">
                                          @error('namaMapel')
                                          <div class="invalid-feedback">{{$message}}</div>
                                          @enderror
                                      </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <label for="kategori" class=" col-form-label">Kategori</label>
                                        </div>
                                        <div class="col-sm-8 ">
                                            <select name="kategori" id="kategori" class="custom-select">
                                                <option name="kategori" value="diniyah"> Diniyah </option>
                                                <option name="kategori" value="umum"> Umum</option>
                                                <option name="kategori" value="muatanLokal"> Muatan Lokal</option>
                                            </select>
                                        </div>
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
        </div>
    </div>
    <div class="card mt-2">
        <div class="body table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Mata Pelajaran</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mapel as $mp)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$mp->namaMapel}}</td>
                        <td>{{$mp->kategori}}</td>
                        {{-- <td><a href="kelas/{{$ks->id}}/edit" class="btn btn-success" style="border-radius: 5px ;
                        font-size:12px">Edit</a> --}}
                        <td><button type="button" class="btn btn-info " style="border-radius: 5px ;  font-size:12px"
                                data-toggle="modal" data-target="#modaledit{{$mp->id}}">
                                Edit Data
                            </button>
                            <button type="button" class="btn btn-danger " style="border-radius: 5px ;  font-size:12px"
                                data-toggle="modal" data-target="#exampleModal{{$mp->id}}">
                                Hapus Data
                            </button>
                            {{-- modal hapus--}}
                            <div class="modal fade" id="exampleModal{{$mp->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus data Mata Pelajaran
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin hapus data Mata Pelajaran {{$mp->namaMapel}} ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <form action="/mapel/{{$mp->id}}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger px-4 ml-2">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- modal edit --}}
                            <div class="modal fade" id="modaledit{{$mp->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Mata Pelajaran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/mapel/{{$mp->id}}" method="POST" class="d-inline"
                                                enctype="multipart/form-data">
                                                @method('patch')
                                                @csrf
                                                <label for="namaMapel" class="col-sm-3 col-form-label">Nama Mata
                                                    pelajaran</label>
                                                <div class="col-sm-9 ">
                                                    <input type="text"
                                                        class="form-control @error('namaMapel') is-invalid @enderror"
                                                        id="namaMapel" name="namaMapel" value="{{$mp->namaMapel}}">
                                                    @error('namaMapel')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-info px-4 ml-2 ">Edit</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
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
            {{$mapel->links()}}


        </div>
    </div>
</div>

</div>
</div>


@endsection
