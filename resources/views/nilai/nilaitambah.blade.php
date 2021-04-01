@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Tambah Pelanggaran Santri') {{-- mengisi yield title dengan 1 baris code--}}
@section('menuPelanggaran','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
  
            
          <h3 class="my-3 align-center">Tambah Pelanggaran</h3>
            <form method="POST" action="/pelanggaran" class="pb-5" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                <div class="card p-4 bg-light">
                  
                  <div class="form-group row">
                    {{-- <label for="namaLengkap" class="col-sm-3 col-form-label">Cari Santri</label> --}}
                    <button type="button" class=" col-sm-2 col-form-label mx-3 my-n3 btn btn-info " style="border-radius: 5px ;  font-size:12px" data-toggle="modal" data-target="#carinama">
                      <span class="glyphicon glyphicon-search mr-2"></span>Pilih Jadwal
                    </button>
                      {{-- <div class="col-sm-6">
                        <input type="text" name="cari" class="form-control pencarian" placeholder="Cari" value="{{ request('cari') }}">
                      </div> --}}
                      {{-- modal hapus--}}
                      <div class="modal fade" id="carinama" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Pilih jadwal</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <div class="body table-responsive-xl">
                                <table class="table table-hover align-center">
                                  <thead>
                                    <tr>
                                      <th scope="col">No</th>
                                      <th scope="col">Kelas</th>
                                      <th scope="col">Mata Pelajaran</th>
                                      <th scope="col">Hari</th>
                                      <th scope="col">Jam Mulai</th>
                                      <th scope="col">Jam Selesai</th>
                                      <th scope="col">Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($jadwalbelajar as $jb)
                                    @if(auth()->user()->name==$jb->asatidzah->namaLengkap)
                                        <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$jb->kelas->namaKelas}}</td>
                                        <td>{{$jb->mapel->namaMapel}}</td>
                                        <td>{{$jb->hari}}</td>
                                        <td>{{$jb->jamMulai}}</td>
                                        <td>{{$jb->jamSelesai}}</td>
                                        <td><a href="#" id="data" class="btn btn-success pilih" data-id={{$jb->id}} data-mapel={{$jb->mapel->namaMapel}} data-kelas={{$jb->kelas->namaKelas}} data-hari={{$jb->hari}} style="border-radius: 5px ; margin:-5px ; font-size:12px">pilih data</a></td>
                                      </tr>
                                        @endif
                                        @endforeach
                                      </table>
                                    </div>
                                  </div>

                                </div>
                                <div class="modal-footer">
                                  {{-- </form>   --}}
                                </div>
                              </div>
                            </div>
                        </div>
                    <div class=" form-group row">
                      <label for="namaKelas" class="col-sm-3 col-form-label">Kelas</label>
                      <div class="col-md-2">
                        <input type="text" readonly  class="form-control" id="namaKelas" name="" value="{{old('namaKelas')}}">
                        <input type="text" readonly  class="form-control" id="kelas_id" name="kelas_id" value="{{old('namaKelas')}}">
                      </div>
                      <label for="mapel" class="col-form-label">Mata Pelajaran</label>
                      <div class="col-md-3">
                        <input type="text" readonly class="form-control" id="namaMapel" name="" value="{{old('namaMapel')}}">
                        <input type="text" readonly class="form-control" id="mapel_id" name="mapel_id" value="{{old('namaMapel')}}">
                        </div>
                      <label for="hari" class="col-form-label">Hari</label>
                      <div class="col-md-2">
                        <input type="text" readonly class="form-control" id="hari" name="santriwustha_id" value="{{old('hari')}}">
                      </div>
                    </div>
            </form>
              
            <div class="row">
              <div class="col-md-12">
                <div class="card mt-2">
                  {{-- <h5 class="ml-4 mt-4 mb-n2"> Santri didalam kelas {{$jadwalbelajar->kelas->namaKelas}} </h5> --}}
                  <div class="body table-responsive">
                    <table class="table table-hover align-center">
                      <thead>
                        <tr>
                          {{-- <th scope="col">No</th> --}}
                          <th scope="col">Nama Santri</th>
                          <th scope="col">Wali Santri</th>
                          <th scope="col">Kelas</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        {{-- @foreach ($santriwustha as $sw)
                        @if($sw->kelas->id == $jadwalbelajar->kelas->id)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$sw->namaLengkap}}</td>
                            <td>{{$sw->namaWali}}</td>
                            <td>{{$sw->kelas->namaKelas}}</td>
                            <td> <a href="/santriwustha/{{$sw->id}}" type="button" class="btn btn-secondary" > Detail </a> </td>
                          </tr>
                          @endif
                          @endforeach
                      </tbody>
                    </table>
                    {{$santriwustha->links()}} --}}
                    </div>
                  </div>
                </div>
  
        </div>
      </div>
    </div>
        <script type="text/javascript">

            $(document).ready(function(){
              $(document).on('click','#data',function(){
                var id = $(this).data('id');
                var mapel = $(this).data('mapel');
                var kelas = $(this).data('kelas');
                var hari = $(this).data('hari');
                // $('#id').val(id);
                $('#namaMapel').val(mapel);
                $('#namaKelas').val(kelas);
                $('#hari').val(hari);
                $('.close').click(); 
                $("#carinama .close").click();
              })
            })
                        
        </script>


@endsection
 