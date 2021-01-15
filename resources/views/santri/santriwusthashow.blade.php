@extends('layout/tema') menambah dari folder layout halaman main
@section('title','Data Santri Salafiyah Wustha') {{-- mengisi yield title dengan 1 baris code--}}
@section ('menuwustha','active')
@section ('menusantri','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}

<div class="container">
      {{-- <div class="row">
        <div class="col-12"> --}}
          <div class="row">
            <div class="col-md-4">
                <div class="card profile-card p-3">
                  <div class="profile-header">&nbsp;</div>
                  <div class="profile-body">
                      <div class="image-area centercrop">
                        @if(!$santriwustha->pasPhoto)
                        <img src="{{asset('tema/images/emptyavatar.png')}}" alt="pas Photo 3x4">
                        @else          
                          <img src="{{Storage::url($santriwustha->pasPhoto)}}" />
                        @endif
                        </div>
                      <div class="content-area">
                          <h3>{{$santriwustha->namaLengkap}}</h3>
                          {{-- <p>Web Software Developer</p>
                          <p>Administrator</p> --}}
                      </div>
                  </div>
                  <div class="profile-footer">
                      <ul>
                          <li>
                            <span>Kelas</span>
                              <span>{{$santriwustha->kelas->namaKelas}}</span>
                          </li>
                          <li>
                              <span>NIS</span>
                              <span>002345020204</span>
                          </li>
                          <li>
                              <span>NISN</span>
                              <span>0023405023345</span>
                          </li>
                      </ul>
                      <div class="">

                        @if(auth()->user()->role=='admin')
                        @if(!$santriwustha->suratWaliSantri)
                        <a href="{{$santriwustha->id}}/edit" class="btn btn-secondary btn-lg btn-block"> Upload Surat Wali Santri</a> 
                        @else          
                        <a href="{{Storage::url($santriwustha->suratWaliSantri)}}" class="btn btn-success btn-lg btn-block"> Lihat Surat Wali Santri</a> 
                        @endif
                        <br>
                        <a href="{{$santriwustha->id}}/edit" class="btn btn-primary btn-lg waves-effect btn-block">Edit Data</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">
                          Hapus Data
                        </button>
                        <a href="/santriwustha" class="btn btn-secondary btn-lg btn-block">Kembali</a>
                        @endif
                      </div>
                       <!-- Modal -->
                       
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Hapus data santri</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Yakin ingin hapus data santri ini?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              <form action="{{$santriwustha->id}}" method="POST" class="d-inline">
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
                      <h4 class="my-3 pt-2" >Detail Santri</h4>
          
                      {{-- Data Santri --}}
                      <div class="row">
                        <div class="col-4"><p>Nama Lengkap</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->namaLengkap}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Nama Panggilan</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->namaPanggilan}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Tempat Lahir</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->tempatLahir}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Tanggal Lahir</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->tanggalLahir}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Jenis Kelamin</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->jk}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Anak Ke</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->anakKe}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Bahasa Keseharian</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->bahasaKeseharian}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Golongan Darah</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->golonganDarah}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Penyakit yang pernah diderita</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->penyakit}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Ukuran Pakaian</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->baju}}</p></div>
                      </div>
                      {{-- Pendidikan Sebelumnya --}}
                      <h4 class="my-3">Pendidikan Sebelumnya</h4>
                      <div class="row">
                        <div class="col-4"><p>Nama Sekolah</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->sekolahSebelum}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Alamat Sekolah</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->alamatSekolahSebelum}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>NISN Sekolah</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->nisnSekolahSebelum}}</p></div>
                      </div>
                      {{-- Data Ayah --}}
                      <h4 class="my-3">Data Ayah</h4>
                      <div class="row">
                        <div class="col-4"><p>Nama Ayah</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->namaAyah}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Nama Panggilan/Hijrah</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->namaPanggilanAyah}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Tanggal Lahir Ayah</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->tanggalLahirAyah}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Pekerjaan Ayah</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->pekerjaanAyah}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Telepon Ayah</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->teleponAyah}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Email Ayah</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->emailAyah}}</p></div>
                      </div>
                      {{-- Data Ibu --}}
                      <h4 class="my-3">Data Ibu</h4>
                      <div class="row">
                        <div class="col-4"><p>Nama Ibu (Sesuai Akte) </p></div>
                        <div class="col-5"><p>: {{$santriwustha ->namaIbu}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Nama Panggilan/Hijrah</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->namaPanggilanIbu}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Tempat Lahir Ibu</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->tempatLahirIbu}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Tanggal Lahir Ibu</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->tanggalLahirIbu}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Pendidikan Ibu</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->pendidikanIbu}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Pekerjaan Ibu</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->pekerjaanIbu}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Alamat Ibu</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->alamatIbu}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Penghasilan Ibu</div>
                        <div class="col-5"><p>: {{$santriwustha ->penghasilanIbu}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>No Telepon Ibu</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->teleponIbu}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Email Ibu</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->emailIbu}}</p></div>
                      </div>
                      {{-- Data Wali Santri --}}
                      <h4 class="my-3">Data Wali Santri</h4>
                      <div class="row">
                        <div class="col-4"><p>Nama Wali Santri</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->namaWali}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Nama Panggilan Wali Santri</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->namaPanggilanWali}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Tempat Lahir Wali Santri</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->tempatLahirWali}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Tanggal Lahir Wali Santri</div>
                        <div class="col-5"><p>: {{$santriwustha ->tanggalLahirWali}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Pendidikan Wali Santri</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->pendidikanWali}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Pekerjaan Wali Santri</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->pekerjaanWali}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Alamat Wali Santri</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->alamatWali}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Penghasilan Wali Santri</div>
                        <div class="col-5"><p>: {{$santriwustha ->penghasilanWali}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>No Telepon Wali Santri</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->teleponWali}}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-4"><p>Email Wali Santri</p></div>
                        <div class="col-5"><p>: {{$santriwustha ->emailWali}}</p></div>
                      </div>
              </div>
            </div>
          </div>
            {{-- Tombol --}}
           
              
        </div>
      </div>
    </div>
@endsection
