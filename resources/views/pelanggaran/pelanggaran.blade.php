@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Data Pelanggaran') {{-- mengisi yield title dengan 1 baris code--}}
{{-- @section('menuasatidzah','active') --}}
@section('menuPelanggaran','active')
@section('container') {{-- mengisi yield container dengan lebih dari 1 baris code --}}
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="my-3 align-center">Data Pelanggaran Santri</h3>
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
                <a href="/pelanggarantambah" class="btn btn-primary mt-3">Tambah Pelanggaran</a>
            </div>
            <div class="col-md-8">
                <form method="GET" action="{{ url('/pelanggaran') }}" accept-charset="UTF-8"
                    class="form-inline float-right" role="search">
                    <div class="input-group ">
                        <div class="box-tools">
                            <div class="has-feedback">

                                <input type="text" name="cari" class="form-control mt-3 mb-n2" placeholder="Cari"
                                    value="{{ request('cari') }}">
                                {{-- <span class="glyphicon glyphicon-search form-control-feedback"></span> --}}
                                {{-- <i class="material-icons">search</i> --}}
                                <span class="input-group-btn ">
                                    <button type="submit" class="btn btn-primary mr-1 mt-3 mb-n2"> Cari </button>
                                    <a href="{{ url('/pelanggaran') }}" class="btn btn-primary mt-3 mb-n2" title="">
                                        Refresh Data </a>
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
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nama Santri</th>
                        <th scope="col">Kelas </th>
                        <th scope="col">Jenis Pelanggaran</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggaran as $pg)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$pg->tanggalPelanggaran}}</td>
                        <td>{{$pg->santriwustha->namaLengkap}}</td>
                        <td>{{$pg->santriwustha->kelas->namaKelas}}</td>
                        <td>{{$pg->jenisPelanggaran}}</td>
                        <td>{{$pg->keterangan}}</td>

                        <td><a href="/pelanggaran/{{$pg->id}}/edit"><button type="button" class="btn btn-info "
                                    style="border-radius: 5px ;  font-size:12px">
                                    Edit Data
                                </button></a>
                            <button type="button" class="btn btn-danger " style="border-radius: 5px ;  font-size:12px"
                                data-toggle="modal" data-target="#exampleModal{{$pg->id}}">
                                Hapus Data
                            </button>
                            {{-- modal hapus--}}
                            <div class="modal fade" id="exampleModal{{$pg->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus data Pelanggaran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin hapus data pelanggaran ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <form action="/pelanggaran/{{$pg->id}}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger px-4 ml-2">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <td><a href="pelanggaran/{{$pg->id}}" class="btn btn-success" style="border-radius: 5px
                            ; margin:-5px ; font-size:12px">detail</a></td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{$pelanggaran->links()}}
</div>
</div>

@endsection
