@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection
@section('title','Tambah Pelanggaran Santri') {{-- mengisi yield title dengan 1 baris code--}}
@section('menuPelanggaran','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
  
            
          <h3 class="my-3 align-center">Tambah Pelanggaran</h3>
            <form method="POST" action="/pelanggaran" class="pb-5" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                <div class="card p-4 bg-light">
                  <div class="form-group row">
                    <label for="tanggalPelanggaran" class="col-sm-3 col-form-label">Tanggal Pelanggaran</label>
                    <div class="col-sm-3 ">
                      <input type="date" class="form-control @error('tanggalPelanggaran') is-invalid @enderror" id="tanggalPelanggaran" name="tanggalPelanggaran" value="{{old('tanggalPelanggaran')}}">
                      @error('tanggalPelanggaran')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>  
                  </div>
                  
                  <div class="form-group row">
                    {{-- <label for="namaLengkap" class="col-sm-3 col-form-label">Cari Santri</label> --}}
                    <button type="button" class=" col-sm-2 col-form-label mx-3 my-n3 btn btn-info " style="border-radius: 5px ;  font-size:12px" data-toggle="modal" data-target="#carinama">
                      <span class="glyphicon glyphicon-search mr-2"></span>Cari data santri
                    </button>
                      {{-- <div class="col-sm-6">
                        <input type="text" name="cari" class="form-control pencarian" placeholder="Cari" value="{{ request('cari') }}">
                      </div> --}}
                      {{-- modal hapus--}}
                      <div class="modal fade" id="carinama" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Pilih Nama Santri</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <div class="body table-responsive-xl">
                                <table class="table table-hover" id="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">No</th>
                                      <th scope="col">Nama Santri</th>
                                      <th scope="col">Wali Santri</th>
                                      <th scope="col">Kelas</th>
                                      <th scope="col">Detail</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($santriwustha as $sw)
                                    <tr class="" data-nama="{{$sw->namaLengkap}}">
                                    <th scope="row">{{$loop->iteration}}</th>
                                      <td>{{$sw->namaLengkap}}</td>
                                      <td>{{$sw->namaWali}}</td>
                                      <td>{{$sw->kelas->namaKelas}}</td>
                                    {{-- <td><a href="#" id="data" class="btn btn-success pilih" onClick="masuk(this,'{{$sw->namaLengkap}}','{{$sw->kelas->namaKelas}}','{{$sw->id}}')" style="border-radius: 5px ; margin:-5px ; font-size:12px">pilih data</a></td> --}}
                                    <td><a href="#" id="data" class="btn btn-success pilih" data-id="{{$sw->id}}" data-nama="{{$sw->namaLengkap}}" data-kelas="{{$sw->kelas->namaKelas}}" style="border-radius: 5px ; margin:-5px ; font-size:12px">pilih data</a></td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                                </div>
                              </div>

                            </div>
                            <div class="modal-footer">
                              </form>  
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class=" form-group row">
                      <label for="namaLengkap" class="col-sm-3 col-form-label">Nama Santri</label>
                      <div class="col-md-4">
                        <input type="text" readonly  class="form-control" id="namaLengkap" name="" value="{{old('namaLengkap')}}">
                      </div>
                      <label for="kelas" class="col-form-label">Kelas</label>
                      <div class="col-md-2">
                        <input type="text" readonly class="form-control" id="kelas" name="" value="{{old('namaKelas')}}">
                        </div>
                      <label for="id" class="col-form-label">ID</label>
                      <div class="col-md-2">
                        <input type="text" readonly class="form-control" id="id" name="santriwustha_id" value="{{old('id')}}">
                      </div>
                    </div>

                    {{-- <div class="form-group row">
                      <label for="namaLengkap" class="col-sm-3 col-form-label">Nama Santri</label>
                      <div class="col-sm-9 ">
                        <div class="col-sm-5">
                          <input type="text"  class="form-control @error('namaLengkap') is-invalid @enderror" id="namaLengkap" name="namaLengkap" value="{{old('namaLengkap')}}">
                        </div>
                        
                      <label for="namaLengkap" class="col-sm-3 col-form-label">Kelas</label>
                      <div class="col-sm-9 ">
                        <div class="col-sm-3">
                          <input type="text"  class="form-control @error('namaLengkap') is-invalid @enderror" id="namaLengkap" name="namaLengkap" value="{{old('namaLengkap')}}">
                        </div>
                        
                    </div>  
                      <label for="id" class="col-sm-3 col-form-label">ID Santri</label>
                      <div class="col-sm-9 ">
                        <input type="text" readonly class="form-control @error('id') is-invalid @enderror" id="id" name="id" value="">
                        @error('id')
                          <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>  
                    </div> --}}
                  <div class="form-group row mb-n1">
                    <label for="jenisPelanggaran" class="col-sm-3 col-form-label">Jenis Pelanggaran</label>
                    <div class="col-sm-9 ">
                      <fieldset class="form-group ">
                        <div class="row">
                          <div class="col-sm-9 ">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jenisPelanggaran" id="jenisPelanggaran1" value="Ringan" checked>
                              <label class="form-check-label" for="jenisPelanggaran1">
                                Ringan
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jenisPelanggaran" id="jenisPelanggaran2" value="Sedang">
                              <label class="form-check-label" for="jenisPelanggaran2">
                                Sedang
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jenisPelanggaran" id="jenisPelanggaran3" value="Berat">
                              <label class="form-check-label" for="jenisPelanggaran3">
                                Berat
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jenisPelanggaran" id="jenisPelanggaran4" value="Sangat Berat">
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
                              <textarea rows="4" class="form-control no-resize" placeholder="Masukkan Keterangan Pelanggaran disini..." name="keterangan">{{ old('keterangan')}}</textarea>
                              </div>
                              
                          </div>
                      </div>
                      @error('jenisPelanggaran')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary align-center py-2 mb-2"> Tambah Data</button>
                <a href="/pelanggaran" class="btn btn-secondary align-center py-2">Kembali</a>
                  </div>
                </div>
              {{-- Tombol --}}
            </form>
              
        </div>
      </div>
    </div>
        <script type="text/javascript">

            $(document).ready(function(){
              $(document).on('click','#data',function(){
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var kelas = $(this).data('kelas');
                $('#id').val(id);
                $('#namaLengkap').val(nama);
                $('#kelas').val(kelas);
                $('.close').click(); 
                $("#carinama .close").click();
              })
            })
                        
        </script>


@endsection
@section('footer')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script type="text/javascript" >
    $('#table').DataTable({
      "pageLength":     10,
      "language": {
        "decimal":        "",
        "emptyTable":     "Tidak ada data tersedia",
        "info":           "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "infoEmpty":      "Menampilkan 0 sampai 0 dari 0 data",
        "infoFiltered":   "(difilter dari _MAX_ total data)",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "Menampilkan _MENU_ data",
        "loadingRecords": "Loading...",
        "processing":     "Processing...",
        "search":         "Cari:",
        "zeroRecords":    "Tidak ada data ditemukan",
        "paginate": {
            "first":      "Awal",
            "last":       "Akhir",
            "next":       "Selanjutnya",
            "previous":   "Sebelumnya"
        },
        }
    });
</script>
@endsection
 