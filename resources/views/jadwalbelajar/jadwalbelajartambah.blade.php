@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Tambah Jadwal Mengajar') {{-- mengisi yield title dengan 1 baris code--}}
@section('menujadwal','active')
@section('jadwalbelajar','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
  
            
          <h3 class="my-3 align-center">Tambah Jadwal Belajar </h3>
            <form method="POST" action="/jadwalbelajar" class="pb-5" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                <div class="card p-4 bg-light">
                    <div class=" form-group row">
                      <label for="namaLengkap" class=" col-sm-3 col-form-label">Nama Asatidzah</label>
                      <div class="col-md-2">
                        <button type="button" class="col-form-label btn-block btn btn-info mt-1" style="border-radius: 5px ;  font-size:12px" data-toggle="modal" data-target="#cariasatidzah">
                          <span class="glyphicon glyphicon-search mr-2"></span>Cari data
                        </button>
                      </div>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" id="namaLengkapas" name="" value="{{old('namaLengkap')}}">
                        <input type="hidden"  class="form-control" id="idas" name="asatidzah_id" value="{{old('namaLengkap')}}">
                      </div>
                    </div>
                    <div class=" form-group row">
                      <label for="mataPelajaran" class=" col-sm-3 col-form-label">Mata Pelajaran</label>
                      <div class="col-md-2">
                        <button type="button" class="col-form-label btn-block btn btn-info" style="border-radius: 5px ;  font-size:12px" data-toggle="modal" data-target="#carimapel">
                          <span class="glyphicon glyphicon-search mr-2"></span>Cari data
                        </button>
                      </div>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" id="namaMapel" name="" value="{{old('mataPelajaran')}}">
                        <input type="hidden"  class="form-control" id="idMapel" name="mapel_id" value="{{old('mataPelajaran')}}">
                      </div>
                    </div>
                    <div class=" form-group row">
                      <label for="Kelas" class=" col-sm-3 col-form-label">Kelas</label>
                      <div class="col-md-2">
                        <button type="button" class="col-form-label btn-block btn btn-info" style="border-radius: 5px ;  font-size:12px" data-toggle="modal" data-target="#carikelas">
                          <span class="glyphicon glyphicon-search mr-2"></span>Cari data
                        </button>
                      </div>
                      <div class="col-md-6">
                        <input type="text" readonly class="form-control" id="namaKelas" name="" value="{{old('Kelas')}}">
                        <input type="hidden"  class="form-control" id="idKelas" name="kelas_id" value="{{old('Kelas')}}">
                      </div>
                    </div>
                    <div class=" form-group row">
                      <label for="Hari" class=" col-sm-3 col-form-label">Hari</label>                      
                      <div class="col-md-8">
                        <select class="form-control show-tick" tabindex="-98" name="hari">
                          <option name="hari" value="Senin">Senin</option>
                          <option name="hari" value="Selasa">Selasa</option>
                          <option name="hari" value="Rabu">Rabu</option>
                          <option name="hari" value="Kamis">Kamis</option>
                          <option name="hari" value="Sabtu">Sabtu</option>
                          <option name="hari" value="Ahad">Ahad</option>
                      </select></div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="jamMulai" class="col-sm-3 col-form-label">Jam Mulai</label>
                      <div class="col-sm-3 ">
                      {{-- <input type="time" name="jamMulai"> --}}
                      <input type="time" class=" timepicker form-control" id="jamMulai" name="jamMulai" placeholder="Please choose a time..." value="{{old('jamMulai')}}">
                        {{-- <input type="date" class="form-control @error('jamMulai') is-invalid @enderror" id="jamMulai" name="jamMulai" value="{{old('jamMulai')}}"> --}}
                        @error('jamMulai')
                          <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>  
                    </div>
                    <div class="form-group row">
                      <label for="jamSelesai" class="col-sm-3 col-form-label">Jam Selesai</label>
                      <div class="col-sm-3 ">
                        <input type="time" class="form-control" name="jamSelesai" placeholder="Please choose a time..." >
                        {{-- <input type="date" class="form-control @error('jamSelesai') is-invalid @enderror" id="jamSelesai" name="jamSelesai" value="{{old('jamSelesai')}}"> --}}
                        @error('jamSelesai')
                          <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                      </div>  
                    </div>
                  <button type="submit" class="btn btn-primary align-center py-2 mb-2"> Tambah Data</button>
                <a href="/jadwalbelajar" class="btn btn-secondary align-center py-2">Kembali</a>
                  </div>
                </div>
              {{-- Tombol --}}
            </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="cariasatidzah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pilih Nama Asatidzah</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="body table-responsive-xl">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col" >Nama Asatidzah</th>
                    {{-- <th scope="col">Email</th> --}}
                    <th scope="col">No Hp</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($asatidzah as $as)
                  <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$as->namaLengkap}}</td>
                    <td>{{$as->noHP}}</td>
                    <td><a href="#" id="dataas" class="btn btn-success pilih" data-id={{$as->id}} data-nama={{$as->namaLengkap}}  style="border-radius: 5px ; margin:-5px ; font-size:12px">pilih data</a></td>
                  </tr>
                  @endforeach
                </tbody>
                {{-- {{$asatidzah->links()}} --}}
              </table>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            </form>  
          </div>
        </div>
      </div>
    
    
      <div class="modal fade" id="carimapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pilih Mate Pelajaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="body table-responsive-xl">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col" >Nama Mata Pelajaran</th>
                  
                  </tr>
                </thead>
                <tbody>
                  @foreach ($mapel as $mp)
                  <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$mp->namaMapel}}</td>
                    <td><a href="#" id="datamapel" class="btn btn-success pilih" data-id={{$mp->id}} data-nama={{$mp->namaMapel}}  style="border-radius: 5px ; margin:-5px ; font-size:12px">pilih data</a></td>
                  </tr>
                  @endforeach
                </tbody>
                {{-- {{$mapel->links()}} --}}
              </table>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            </form>  
          </div>
        </div>
      </div>

      <div class="modal fade" id="carikelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pilih Kelas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="body table-responsive-xl">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col" >Kelas</th>
                  
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kelas as $ks)
                  <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$ks->namaKelas}}</td>
                    <td><a href="#" id="datakelas" class="btn btn-success pilih" data-id={{$ks->id}} data-nama={{$ks->namaKelas}}  style="border-radius: 5px ; margin:-5px ; font-size:12px">pilih data</a></td>
                  </tr>
                  @endforeach
                </tbody>
                {{-- {{$kelas->links()}} --}}
              </table>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            </form>  
          </div>
        </div>
      </div>

        <script type="text/javascript">
            $(document).ready(function(){
              $(document).on('click','#dataas',function(){
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                $('#idas').val(id);
                $('#namaLengkapas').val(nama);
                $('.close').click(); 
                $("#cariasatidzah .close").click();
              })
            })        
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
              $(document).on('click','#datamapel',function(){
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                $('#idMapel').val(id);
                $('#namaMapel').val(nama);
                $('.close').click(); 
                $("#carimapel .close").click();
              })
            })        
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
              $(document).on('click','#datakelas',function(){
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                $('#idKelas').val(id);
                $('#namaKelas').val(nama);
                $('.close').click(); 
                $("#carikelas .close").click();
              })
            })        
        </script>


@endsection
