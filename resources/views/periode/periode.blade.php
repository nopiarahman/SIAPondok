@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Periode belajar') {{-- mengisi yield title dengan 1 baris code--}}
@section('menujadwal','active')
@section('menuperiode','active')
@section('container') {{-- mengisi yield container dengan lebih dari 1 baris code --}}
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="my-3 align-center">Periode Belajar Salafiyah Wustha</h3>
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
                    Tambah Periode
                </button>
                {{-- modal tambah--}}
                <div class="modal fade" id="tambahmapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Periode Baru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/periode" class="pb-5" enctype="multipart/form-data">
                                    @csrf
                                    <label for="tahun" class="col-sm-4 col-form-label">Tahun Ajaran</label>
                                    <div class="col-sm-8 ">
                                        <input type="text"
                                            class="form-control my-2 @error('tahun') is-invalid @enderror" id="tahun"
                                            name="tahun" }}">
                                        @error('tahun')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group row mb-n1 ml-1">
                                        <label for="semester" class="col-sm-4 col-form-label">Semester</label>
                                        <div class="col-sm-8 ">
                                            <fieldset class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-8 ">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="semester"
                                                                id="semester3" value="Ganjil">
                                                            <label class="form-check-label" for="semester3">
                                                                Ganjil
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="semester"
                                                                id="semester4" value="Genap">
                                                            <label class="form-check-label" for="semester4">
                                                                Genap
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <button type="submit" class="btn btn-info px-4 ml-3 ">Tambah</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
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
</div>
</div>
<div class="card mt-2">
    <div class="body table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tahun Ajaran</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($periode as $pd)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$pd->tahun}}</td>
                    <td>{{$pd->semester}}</td>
                    <td
                    @if($pd->status=='Aktif')
                        class="badge badge-info"
                    @else
                        class="badge badge-secondary"
                    @endif
                    >{{$pd->status}}</td>
                    <td>
                        <a href="/periode/{{$pd->id}}/aktif" type="button" class="btn btn-success "
                            style="border-radius: 5px ;  font-size:12px">
                            Set Aktif
                        </a>
                        <button type="button" class="btn btn-info " style="border-radius: 5px ;  font-size:12px"
                            data-toggle="modal" data-target="#modaledit{{$pd->id}}">
                            Edit Data
                        </button>
                        <button type="button" class="btn btn-danger " style="border-radius: 5px ;  font-size:12px"
                            data-toggle="modal" data-target="#exampleModal{{$pd->id}}">
                            Hapus Data
                        </button>
                        {{-- modal hapus--}}
                        <div class="modal fade" id="exampleModal{{$pd->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Periode</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin ingin hapus data periode ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <form action="/periode/{{$pd->id}}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger px-4 ml-2">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- modal edit --}}
                        <div class="modal fade" id="modaledit{{$pd->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Periode</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/periode/{{$pd->id}}" class="pb-5"
                                            enctype="multipart/form-data">
                                            @method('patch')
                                            @csrf
                                            <label for="tahun" class="col-sm-4 col-form-label">Tahun Ajaran</label>
                                            <div class="col-sm-8 ">
                                                <input type="text"
                                                    class="form-control my-2 @error('tahun') is-invalid @enderror"
                                                    id="tahun" name="tahun" }} value="{{$pd->tahun}}">
                                                @error('tahun')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group row mb-n1 ml-1">
                                                <label for="semester" class="col-sm-4 col-form-label">Semester</label>
                                                <div class="col-sm-8 ">
                                                    <fieldset class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-8 ">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="semester" id="semester{{$pd->id}}5"
                                                                        value="Ganjil" @if ($pd->semester=='Ganjil')
                                                                    checked @endif>
                                                                    <label class="form-check-label"
                                                                        for="semester{{$pd->id}}5">
                                                                        Ganjil
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="semester" id="semester{{$pd->id}}6"
                                                                        value="Genap" @if ($pd->semester=='Genap')
                                                                    checked @endif>
                                                                    <label class="form-check-label"
                                                                        for="semester{{$pd->id}}6">
                                                                        Genap
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <button type="submit" class="btn btn-info px-4 ml-3 ">Edit</button>
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
        {{$periode->links()}}


    </div>
</div>
</div>
</div>
</div>
@endsection
