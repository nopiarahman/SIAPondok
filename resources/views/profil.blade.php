@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Data Asatidzah') {{-- mengisi yield title dengan 1 baris code--}}
@section ('menuindex','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}

{{-- {{dd($asatidzah)}} --}}

<div class="container">
      {{-- <div class="row">
        <div class="col-12"> --}}
          <div class="row">
            <div class="col-md-4">
                <div class="card profile-card p-3">
                  <div class="profile-header">&nbsp;</div>
                  <div class="profile-body">
                      <div class="image-area centercrop">
                        {{-- @if(!$asatidzah->pasPhoto)
                        <img src="{{asset('tema/images/emptyavatar.png')}}" alt="pas Photo 3x4">
                        @else          
                          <img src="{{Storage::url($asatidzah->pasPhoto)}}" />
                        @endif --}}
                        </div>
                      <div class="content-area">
                          {{-- <h3>{{$asatidzah->namaLengkap}}</h3> --}}
                          <p>Web Software Developer</p>
                          <p>Administrator</p>
                      </div>
                  </div>
                  <div class="profile-footer">
                      {{-- <ul>
                          <li>
                              <span>Followers</span>
                              <span>1.234</span>
                          </li>
                          <li>
                              <span>Following</span>
                              <span>1.201</span>
                          </li>
                          <li>
                              <span>Friends</span>
                              <span>14.252</span>
                          </li>
                      </ul> --}}
                      <div class="">
                        
                        {{-- <a href="{{$asatidzah->id}}/edit" class="btn btn-primary btn-lg waves-effect btn-block">Edit Data</a> --}}
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">
                          Hapus Data
                        </button>
                        <a href="/asatidzah" class="btn btn-secondary btn-lg btn-block">Kembali</a>
                      </div>
                       <!-- Modal -->
                       
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Hapus data asatidzah</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Yakin ingin hapus data asatidzah ini?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              {{-- <form action="{{$asatidzah->id}}" method="POST" class="d-inline"> --}}
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger px-4 ml-2">Hapus</button>
                                </form>  
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="card p-4 bg-light">
                <h5 class="mb-4">IDENTITAS Asatidzah</h5>
                  <div class="form-group row">
                    <label for="namaLengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9 ">
                      <input type="text" class="form-control @error('namaLengkap') is-invalid @enderror " id="namaLengkap" name="namaLengkap" value="{{old('namaLengkap')}}">
                      @error('namaLengkap')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="noKTP" class="col-sm-3 col-form-label">Nomor KTP</label>
                    <div class="col-sm-9 ">
                      <input type="text" class="form-control @error('noKTP') is-invalid @enderror" id="noKTP" name="noKTP" value="{{old('noKTP')}}">
                      @error('noKTP')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>  
                  </div>
            </div>
          </div>
            {{-- Tombol --}}
           
              
        </div>
      </div>
    </div>
@endsection
