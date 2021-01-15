@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Edit Pelanggaran Santri') {{-- mengisi yield title dengan 1 baris code--}}
@section('menuPelanggaran','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
  <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="my-3 align-center">Edit Pelanggaran</h3>
          
          <form method="POST" action="/pelanggaran/{{$pelanggaran->id}}" class="pb-5" enctype="multipart/form-data">
              @method('patch')
                @csrf
                <div class="col-md-12">
                <div class="card p-4 bg-light">
                  <div class="form-group row">
                    <label for="tanggalPelanggaran" class="col-sm-3 col-form-label">Tanggal Pelanggaran</label>
                    <div class="col-sm-9 ">
                      <input type="date" class="form-control @error('tanggalPelanggaran') is-invalid @enderror" id="tanggalPelanggaran" name="tanggalPelanggaran" value="{{$pelanggaran->tanggalPelanggaran}}">
                      @error('tanggalPelanggaran')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>  
                  </div>
                  <div class="form-group row">
                    <label for="namaLengkap" class="col-sm-3 col-form-label">ID Santri</label>
                    <div class="col-sm-9 ">
                      <input type="text" disabled class="form-control @error('namaLengkap') is-invalid @enderror " id="namaLengkap" name="namaLengkap" placeholder="{{$pelanggaran->santriwustha->namaLengkap}}">
                      @error('namaLengkap')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row mb-n1">
                    <label for="jenisPelanggaran" class="col-sm-3 col-form-label">Jenis Pelanggaran</label>
                    <div class="col-sm-9 ">
                      <fieldset class="form-group ">
                        <div class="row">
                          <div class="col-sm-9 ">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jenisPelanggaran" id="jenisPelanggaran1" value="Ringan" @if ($pelanggaran->jenisPelanggaran=='Ringan') checked @endif>
                              <label class="form-check-label" for="jenisPelanggaran1">
                                Ringan
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jenisPelanggaran" id="jenisPelanggaran2" value="Sedang" @if ($pelanggaran->jenisPelanggaran=='Sedang') checked @endif>
                              <label class="form-check-label" for="jenisPelanggaran2">
                                Sedang
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jenisPelanggaran" id="jenisPelanggaran3" value="Berat" @if ($pelanggaran->jenisPelanggaran=='Berat') checked @endif>
                              <label class="form-check-label" for="jenisPelanggaran3">
                                Berat
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jenisPelanggaran" id="jenisPelanggaran4" value="Sangat Berat" @if ($pelanggaran->jenisPelanggaran=='Sangat Berat') checked @endif>
                              <label class="form-check-label" for="jenisPelanggaran4">
                                Sangat Berat
                              </label>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      
                      @error('jenisPelanggaran')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>       
                  <div class="form-group row">
                    <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                      <div class="col-sm-9">
                          <div class="form-group">
                              <div class="form-line">
                              <textarea rows="4" class="form-control no-resize" placeholder="Masukkan Keterangan Pelanggaran disini..." name="keterangan" ">{{$pelanggaran->keterangan}}</textarea>
                              </div>
                              
                          </div>
                      </div>
                      @error('jenisPelanggaran')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary align-center py-2 mb-2"> Update Data</button>
                <a href="/pelanggaran" class="btn btn-secondary align-center py-2">Kembali</a>
                    
                  </div>

                
                </div>
              {{-- Tombol --}}
            </form>
              
        </div>
      </div>
    </div>
@endsection
 