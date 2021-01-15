@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Data Asatidzah') {{-- mengisi yield title dengan 1 baris code--}}
@section ('menuasatidzah','active')
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
                        @if(!$asatidzah->pasPhoto)
                        <img src="{{asset('tema/images/emptyavatar.png')}}" alt="pas Photo 3x4">
                        @else          
                          <img src="{{Storage::url($asatidzah->pasPhoto)}}" />
                        @endif
                        </div>
                      <div class="content-area">
                          <h3>{{$asatidzah->namaLengkap}}</h3>
                      <p>{{$asatidzah->email}}</p>
                          <p>Asatidzah</p>
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
                        
                        <a href="{{$asatidzah->id}}/edit" class="btn btn-primary btn-lg waves-effect btn-block">Edit Data</a>
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
                              <form action="{{$asatidzah->id}}" method="POST" class="d-inline">
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
            <div class="col-md-8">
              <div class="card p-4">
                      <h4 class="my-3 pt-2" >Detail asatidzah</h4>
          
                      {{-- Data asatidzah --}}
                      <div class="row">
                        <div class="col-4"><p>Nama Lengkap</p></div>
                        <div class="col-5"><p>: {{$asatidzah ->namaLengkap}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>NO KTP</p></div>
                        <div class="col-5"><p>: {{$asatidzah ->noKTP}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Tempat Lahir</p></div>
                        <div class="col-5"><p>: {{$asatidzah ->tempatLahir}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Tanggal Lahir</p></div>
                        <div class="col-5"><p>: {{$asatidzah ->tanggalLahir}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Jabatan Dalam Struktur</p></div>
                        <div class="col-5"><p>: {{$asatidzah ->jabatan}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Usia</p></div>
                        <div class="col-5"><p>: {{$asatidzah ->usia}} Tahun</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Agama</p></div>
                        <div class="col-5"><p>: {{$asatidzah ->agama}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Golongan Darah</p></div>
                        <div class="col-5"><p>: {{$asatidzah ->golDarah}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Pekerjaan</p></div>
                        <div class="col-5"><p>: {{$asatidzah ->pekerjaan}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Tinggi / Berat Badan</p></div>
                        <div class="col-5"><p>: {{$asatidzah ->tinggiBerat}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Pendidikan Terakhir</p></div>
                        <div class="col-5"><p>: {{$asatidzah ->pendidikan}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Nama Institusi</p></div>
                        <div class="col-5"><p>: {{$asatidzah ->namaInstitusi}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Alamat Rumah</p></div>
                        <div class="col-5"><p>: {{$asatidzah ->alamat}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Kecamatan</p></div>
                        <div class="col-5"><p>: {{$asatidzah ->kecamatan}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Kabupaten</p></div>
                        <div class="col-5"><p>: {{$asatidzah ->kabupaten}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Kode Pos</p></div>
                        <div class="col-5"><p>: {{$asatidzah ->kodePos}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Nomor Telepon</p></div>
                        <div class="col-5"><p>: {{$asatidzah ->noHP}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Alamat Email </p></div>
                        <div class="col-5"><p>: {{$asatidzah ->email}}</p></div>
                      </div>
                      
              </div>
            </div>
          </div>
            {{-- Tombol --}}
           
              
        </div>
      </div>
    </div>
@endsection
