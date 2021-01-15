@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Form Tambah Data Santri') {{-- mengisi yield title dengan 1 baris code--}}
@section('menusantri','active')
@section('menuwustha','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
  <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="my-3 align-center">Tambah Data Santri Salafiyah Wustha</h3>
          
            <form method="POST" action="/santriwustha" class="pb-5" enctype="multipart/form-data">
                @csrf
                {{-- Data Santri --}}
            <div class="card p-4 bg-light">
                <h5 class="mb-4">IDENTITAS SANTRI</h5>
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
                    <label for="namaPanggilan" class="col-sm-3 col-form-label">Nama Panggilan</label>
                    <div class="col-sm-9 ">
                      <input type="text" class="form-control @error('namaPanggilan') is-invalid @enderror" id="namaPanggilan" name="namaPanggilan" value="{{old('namaPanggilan')}}">
                      @error('namaPanggilan')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>  
                  </div>
                  <div class="form-group row">
                    <label for="tempatLahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-9 ">
                      <input type="text" class="form-control @error('tempatLahir') is-invalid @enderror" id="tempatLahir" name="tempatLahir" value="{{old('tempatLahir')}}">
                      @error('tempatLahir')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>  
                  </div>
                  <div class="form-group row">
                    <label for="tanggalLahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-9 ">
                      <input type="date" class="form-control @error('tanggalLahir') is-invalid @enderror" id="tanggalLahir" name="tanggalLahir" value="{{old('tanggalLahir')}}">
                      @error('tanggalLahir')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>  
                  </div>
                  <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-3 pt-0">Jenis Kelamin</legend>
                      <div class="col-sm-9 ">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="jk" id="gridRadios1" value="Laki laki" checked>
                          <label class="form-check-label" for="gridRadios1">
                            Laki laki
                          </label>
                        </div>
                        <div class="form-check disabled">
                          <input class="form-check-input" type="radio" name="jk" id="gridRadios3" value="option3" disabled>
                          <label class="form-check-label" for="gridRadios3">
                            Perempuan
                          </label>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <div class="form-group row">
                    <label for="anakKe" class="col-sm-3 col-form-label">Anak Ke</label>
                    <div class="col-sm-9 ">
                      <input type="text" class="form-control @error('anakKe') is-invalid @enderror" id="anakKe" name="anakKe" value="{{old('anakKe')}}">
                      @error('anakKe')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>  
                  </div>
                  <div class="form-group row">
                    <label for="bahasaKeseharian" class="col-sm-3 col-form-label">Bahasa Keseharian</label>
                    <div class="col-sm-9 ">
                      <input type="text" class="form-control" id="bahasaKeseharian" name="bahasaKeseharian">
                    </div>  
                  </div>
                  <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-3 pt-0">Golongan Darah</legend>
                      <div class="col-sm-9 ">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="golonganDarah" id="golonganDarah1" value="A" checked>
                          <label class="form-check-label" for="golonganDarah1">
                            A
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="golonganDarah" id="golonganDarah2" value="B">
                          <label class="form-check-label" for="golonganDarah2">
                            B
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="golonganDarah" id="golonganDarah3" value="AB">
                          <label class="form-check-label" for="golonganDarah3">
                            AB
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="golonganDarah" id="golonganDarah4" value="O">
                          <label class="form-check-label" for="golonganDarah4">
                            O
                          </label>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <div class="form-group row">
                    <label for="penyakit" class="col-sm-3 col-form-label">Penyakit yang pernah diderita</label>
                    <div class="col-sm-9 ">
                      <input type="text" class="form-control" id="penyakit" name="penyakit">
                    </div>  
                  </div>
                  <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-3 pt-0">Ukuran Baju</legend>
                      <div class="col-sm-9 ">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="baju" id="baju1" value="XS" checked>
                          <label class="form-check-label" for="baju1">
                            XS
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="baju" id="baju2" value="S">
                          <label class="form-check-label" for="baju2">
                            S
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="baju" id="baju3" value="M">
                          <label class="form-check-label" for="baju3">
                            M
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="baju" id="baju4" value="L">
                          <label class="form-check-label" for="baju4">
                            L
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="baju" id="baju5" value="XL">
                          <label class="form-check-label" for="baju5">
                            XL
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="baju" id="baju6" value="XXL">
                          <label class="form-check-label" for="baju6">
                            XXL
                          </label>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </div>
              {{-- Data Sekolah Sebelumnya --}}
            <div class="card p-4 bg-light">
              <h5 class="mb-4">PENDIDIKAN SEBELUMNYA</h5>
              <div class="form-group row">
                <label for="sekolahSebelum" class="col-sm-3 col-form-label">Nama Sekolah</label>
                <div class="col-sm-9 ">
                <input type="text" class="form-control @error('sekolahSebelum') is-invalid @enderror" id="sekolahSebelum" name="sekolahSebelum" value="{{old('sekolahSebelum')}}">
                  @error('sekolahSebelum')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
              <div class="form-group row">
                <label for="alamatSekolahSebelum" class="col-sm-3 col-form-label">Alamat Sekolah Sebelumnya</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('alamatSekolahSebelum') is-invalid @enderror" id="alamatSekolahSebelum" name="alamatSekolahSebelum" value="{{old('alamatSekolahSebelum')}}">
                  @error('alamatSekolahSebelum')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
              <div class="form-group row">
                <label for="nisnSekolahSebelum" class="col-sm-3 col-form-label">NISN</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('nisnSekolahSebelum') is-invalid @enderror" id="nisnSekolahSebelum" name="nisnSekolahSebelum" value="{{old('nisnSekolahSebelum')}}">
                  @error('nisnSekolahSebelum')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
            </div>
              {{-- Data Ayah --}}
            <div class="card p-4 bg-light" >  
              <h5 class="mb-4">Data Ayah</h5>
              <div class="form-group row">
                <label for="namaAyah" class="col-sm-3 col-form-label">Nama Ayah (Sesuai Akte)</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('namaAyah') is-invalid @enderror " id="namaAyah" name="namaAyah" value="{{old('namaAyah')}}">
                  @error('namaAyah')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label for="namaPanggilanAyah" class="col-sm-3 col-form-label">Nama Panggilan Ayah/Hijrah</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('namaPanggilanAyah') is-invalid @enderror" id="namaPanggilanAyah" name="namaPanggilanAyah" value="{{old('namaPanggilanAyah')}}">
                  @error('namaPanggilanAyah')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
              <div class="form-group row">
                <label for="pendidikanAyah" class="col-sm-3 col-form-label">Pendidikan Terakir Ayah</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('pendidikanAyah') is-invalid @enderror" id="pendidikanAyah" name="pendidikanAyah" value="{{old('pendidikanAyah')}}">
                  @error('pendidikanAyah')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
              {{-- <div class="form-group row">
                <label for="pendidikanAyah" class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('pendidikanAyah') is-invalid @enderror" id="pendidikanAyah" name="pendidikanAyah" value="{{old('pendidikanAyah')}}">
                  @error('pendidikanAyah')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>   --}}
              {{-- </div> --}}
              <div class="form-group row">
                <label for="tanggalLahirAyah" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-9 ">
                  <input type="date" class="form-control @error('tanggalLahirAyah') is-invalid @enderror" id="tanggalLahirAyah" name="tanggalLahirAyah" value="{{old('tanggalLahirAyah')}}">
                  @error('tanggalLahirAyah')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
              <div class="form-group row">
                <label for="pekerjaanAyah" class="col-sm-3 col-form-label">Pekerjaan Ayah</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('pekerjaanAyah') is-invalid @enderror" id="pekerjaanAyah" name="pekerjaanAyah" value="{{old('pekerjaanAyah')}}">
                  @error('pekerjaanAyah')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
              <div class="form-group row">
                <label for="alamatAyah" class="col-sm-3 col-form-label">Alamat Ayah</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('alamatAyah') is-invalid @enderror" id="alamatAyah" name="alamatAyah" value="{{old('alamatAyah')}}">
                  @error('alamatAyah')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
              <div class="form-group row">
                <label for="penghasilanAyah" class="col-sm-3 col-form-label">Penghasillan Perbulan</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('penghasilanAyah') is-invalid @enderror" id="penghasilanAyah" name="penghasilanAyah" value="{{old('penghasilanAyah')}}">
                  @error('penghasilanAyah')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
              <div class="form-group row">
                <label for="teleponAyah" class="col-sm-3 col-form-label">Nomor Telepon</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('teleponAyah') is-invalid @enderror" id="teleponAyah" name="teleponAyah" value="{{old('teleponAyah')}}">
                  @error('teleponAyah')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
              <div class="form-group row">
                <label for="emailAyah" class="col-sm-3 col-form-label">Email Ayah</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control @error('emailAyah') is-invalid @enderror" id="emailAyah" name="emailAyah" value="{{old('emailAyah')}}">
                  @error('emailAyah')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>  
              </div>
            </div>
              {{-- Data Ibu --}}
              <div class="card p-4 bg-light">
                <h5 class="mb-4">Data Ibu</h5>
                <div class="form-group row">
                  <label for="namaIbu" class="col-sm-3 col-form-label">Nama Ibu (Sesuai Akte)</label>
                  <div class="col-sm-9 ">
                    <input type="text" class="form-control @error('namaIbu') is-invalid @enderror" id="namaIbu" name="namaIbu" value="{{old('namaIbu')}}">
                    @error('namaIbu')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="namaPanggilanIbu" class="col-sm-3 col-form-label">Nama Panggilan Ibu/Hijrah</label>
                  <div class="col-sm-9 ">
                    <input type="text" class="form-control @error('namaPanggilanIbu') is-invalid @enderror" id="namaPanggilanIbu" name="namaPanggilanIbu" value="{{old('namaPanggilanIbu')}}">
                    @error('namaPanggilanIbu')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="tempatLahirIbu" class="col-sm-3 col-form-label">Tempat Lahir Ibu</label>
                  <div class="col-sm-9 ">
                    <input type="text" class="form-control @error('tempatLahirIbu') is-invalid @enderror" id="tempatLahirIbu" name="tempatLahirIbu" value="{{old('tempatLahirIbu')}}">
                    @error('tempatLahirIbu')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="tanggalLahirIbu" class="col-sm-3 col-form-label">Tanggal Lahir Ibu</label>
                  <div class="col-sm-9 ">
                    <input type="date" class="form-control @error('tanggalLahirIbu') is-invalid @enderror" id="tanggalLahirIbu" name="tanggalLahirIbu" value="{{old('tanggalLahirIbu')}}">
                    @error('tanggalLahirIbu')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="pendidikanIbu" class="col-sm-3 col-form-label">Pendidikan Ibu</label>
                  <div class="col-sm-9 ">
                    <input type="text" class="form-control @error('pendidikanIbu') is-invalid @enderror" id="pendidikanIbu" name="pendidikanIbu" value="{{old('pendidikanIbu')}}">
                    @error('pendidikanIbu')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="pekerjaanIbu" class="col-sm-3 col-form-label">Pekerjaan Ibu</label>
                  <div class="col-sm-9 ">
                    <input type="text" class="form-control @error('pekerjaanIbu') is-invalid @enderror" id="pekerjaanIbu" name="pekerjaanIbu" value="{{old('pekerjaanIbu')}}">
                    @error('pekerjaanIbu')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="alamatIbu" class="col-sm-3 col-form-label">Alamat Ibu</label>
                  <div class="col-sm-9 ">
                    <input type="text" class="form-control @error('alamatIbu') is-invalid @enderror" id="alamatIbu" name="alamatIbu" value="{{old('alamatIbu')}}">
                    @error('alamatIbu')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="penghasilanIbu" class="col-sm-3 col-form-label">Penghasilan Ibu</label>
                  <div class="col-sm-9 ">
                    <input type="text" class="form-control @error('penghasilanIbu') is-invalid @enderror" id="penghasilanIbu" name="penghasilanIbu" value="{{old('penghasilanIbu')}}">
                    @error('penghasilanIbu')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="teleponIbu" class="col-sm-3 col-form-label">No Telepon Ibu </label>
                  <div class="col-sm-9 ">
                    <input type="text" class="form-control @error('teleponIbu') is-invalid @enderror" id="teleponIbu" name="teleponIbu" value="{{old('teleponIbu')}}">
                    @error('teleponIbu')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="emailIbu" class="col-sm-3 col-form-label">Email Ibu</label>
                  <div class="col-sm-9 ">
                    <input type="text" class="form-control @error('emailIbu') is-invalid @enderror" id="emailIbu" name="emailIbu" value="{{old('emailIbu')}}">
                    @error('emailIbu')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
              </div>
              {{-- Data Wali --}}
              <div class="card p-4 bg-light">
                <h5 class="mb-4">Data Wali Santri</h5>
                <div class="form-group row">
                  <label for="namaWali" class="col-sm-3 col-form-label">Nama Lengkap Wali Santri (Sesuai Akte)</label>
                  <div class="col-sm-9 ">
                    <input type="text" class="form-control @error('namaWali') is-invalid @enderror" id="namaWali" name="namaWali" value="{{old('namaWali')}}">
                    @error('namaWali')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="namaPanggilanWali" class="col-sm-3 col-form-label">Nama Panggilan Wali/Hijrah</label>
                  <div class="col-sm-9 ">
                    <input type="text" class="form-control @error('namaPanggilanWali') is-invalid @enderror" id="namaPanggilanWali" name="namaPanggilanWali" value="{{old('namaPanggilanWali')}}">
                    @error('namaPanggilanWali')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="tempatLahirWali" class="col-sm-3 col-form-label">Tempat Lahir Wali Santri</label>
                  <div class="col-sm-9 ">
                    <input type="text" class="form-control @error('tempatLahirWali') is-invalid @enderror" id="tempatLahirWali" name="tempatLahirWali" value="{{old('tempatLahirWali')}}">
                    @error('tempatLahirWali')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="tanggalLahirWali" class="col-sm-3 col-form-label">Tanggal Lahir Wali Santri</label>
                  <div class="col-sm-9 ">
                    <input type="date" class="form-control @error('tanggalLahirWali') is-invalid @enderror" id="tanggalLahirWali" name="tanggalLahirWali" value="{{old('tanggalLahirWali')}}">
                    @error('tanggalLahirWali')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="pendidikanWali" class="col-sm-3 col-form-label">Pendidikan Wali Santri</label>
                  <div class="col-sm-9 ">
                    <input type="text" class="form-control @error('pendidikanWali') is-invalid @enderror" id="pendidikanWali" name="pendidikanWali" value="{{old('pendidikanWali')}}">
                    @error('pendidikanWali')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="pekerjaanWali" class="col-sm-3 col-form-label">Pekerjaan Wali Santri</label>
                  <div class="col-sm-9 ">
                    <input type="text" class="form-control @error('pekerjaanWali') is-invalid @enderror" id="pekerjaanWali" name="pekerjaanWali" value="{{old('pekerjaanWali')}}">
                    @error('pekerjaanWali')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="alamatWali" class="col-sm-3 col-form-label">Alamat Wali Santri</label>
                  <div class="col-sm-9 ">
                    <input type="text" class="form-control @error('alamatWali') is-invalid @enderror" id="alamatWali" name="alamatWali" value="{{old('alamatWali')}}">
                    @error('alamatWali')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="penghasilanWali" class="col-sm-3 col-form-label">Penghasilan Wali Santri</label>
                  <div class="col-sm-9 ">
                    <input type="text" class="form-control @error('penghasilanWali') is-invalid @enderror" id="penghasilanWali" name="penghasilanWali" value="{{old('penghasilanWali')}}">
                    @error('penghasilanWali')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="teleponWali" class="col-sm-3 col-form-label">No Telepon Wali Santri </label>
                  <div class="col-sm-9 ">
                    <input type="text" class="form-control @error('teleponWali') is-invalid @enderror" id="teleponWali" name="teleponWali" value="{{old('teleponWali')}}">
                    @error('teleponWali')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="emailWali" class="col-sm-3 col-form-label">Email Wali Santri</label>
                  <div class="col-sm-9 ">
                    <input type="text" class="form-control @error('emailWali') is-invalid @enderror" id="emailWali" name="emailWali" value="{{old('emailWali')}}">
                    @error('emailWali')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="pasPhoto" class="col-sm-3 col-form-label">Pas Photo</label>
                  <div class="col-sm-9 ">
                    <input type="file" class="form-control @error('pasPhoto') is-invalid @enderror" id="pasPhoto" name="pasPhoto" value="{{old('pasPhoto')}}">
                    @if ($santriwustha->pasPhoto != "")   
                        <img src="{{ \Storage::url($santriwustha->pasPhoto) }}" class="img border rounded mt-3 p-1" width="250">
                    @endif 
                    @error('pasPhoto')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
                <div class="form-group row">
                  <label for="suratWaliSantri" class="col-sm-3 col-form-label">Surat Persetujuan Wali Santri</label>
                  <div class="col-sm-9 ">
                    <input type="file" class="form-control @error('suratWaliSantri') is-invalid @enderror" id="suratWaliSantri" name="suratWaliSantri" value="{{old('suratWaliSantri')}}">
                    @if ($santriwustha->suratWaliSantri != "")   
                        <img src="{{ \Storage::url($santriwustha->suratWaliSantri) }}" class="img border rounded mt-3 p-1" width="250">
                    @endif 
                    @error('suratWaliSantri')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>  
                </div>
              </div>
              {{-- Tombol --}}
              <button type="submit" class="btn btn-primary btn-block py-2"> Tambah Data</button>
            <a href="/santriwustha" class="btn btn-secondary btn-block py-2">Kembali</a>
            </form>
              
        </div>
      </div>
    </div>
@endsection
 