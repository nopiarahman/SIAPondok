@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Data Admin') {{-- mengisi yield title dengan 1 baris code--}}
{{-- @section('menuasatidzah','active') --}}
@section('menuEditAdmin','active')
@section('container') {{-- mengisi yield container dengan lebih dari 1 baris code --}}
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="my-3 align-center">Data Admin</h3>
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
                <button type="button" class="btn btn-primary my-3" style="border-radius: 5px ;  font-size:12px"
                    data-toggle="modal" data-target="#tambahkelas">
                    Tambah Admin Baru
                </button>
                {{-- Modal Tambah Admin --}}
                <div class="modal fade" id="tambahkelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Admin Baru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/admintambah" class="pb-5" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <label for="name" class=" col-form-label">Nama Admin</label>
                                        </div>
                                        <div class="col-sm-8 ">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" }}">
                                            @error('name')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <label for="email" class=" col-form-label">Email</label>
                                        </div>
                                        <div class="col-sm-8 ">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" }}">
                                            @error('email')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <label for="jenjang" class=" col-form-label">Jenjang</label>
                                        </div>
                                        <div class="col-sm-8 ">
                                            <select name="jenjang" id="jenjang" class="custom-select">
                                                <option selected>Pilih jenjang admin</option>
                                                <option name="jenjang" value="sd">Salafiyyah Uulaa</option>
                                                <option name="jenjang" value="smpPutra">Salafiyyah Wustha'</option>
                                                <option name="jenjang" value="smaPutra">Salafiyyah Ulyaa</option>
                                                <option name="jenjang" value="smpPutri">Tahfidzul Qur'an Lil Bana'at
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <label for="password" class=" col-form-label">Password</label>
                                        </div>
                                        <div class="col-sm-8 ">
                                            <input type="text"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" name="password" }}">
                                            @error('password')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
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
                        <th scope="col">Nama Admin</th>
                        <th scope="col">Marhalah</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin as $ad)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$ad->name}}</td>
                        <td>{{tulisJenjang($ad->jenjang)}}</td>
                        <td>{{$ad->email}}</td>
                        <td>
                            <a href="admin/{{$ad->id}}" class="btn btn-success mx-1"
                                style="border-radius: 5px ; font-size:12px">Detail</a>
                            <button type="button" class="btn btn-danger " style="border-radius: 5px ;  font-size:12px"
                                data-toggle="modal" data-target="#exampleModal{{$ad->id}}">
                                Hapus Admin
                            </button>
                            {{-- modal hapus--}}
                            <div class="modal fade" id="exampleModal{{$ad->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus data admin</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin hapus data admin {{tulisJenjang($ad->jenjang)}} ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <form action="/adminhapus/{{$ad->id}}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger px-4 ml-2">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- {{$asatidzah->links()}} --}}
</div>
</div>
@endsection
