@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Data Santri Salafiyah Wustha') {{-- mengisi yield title dengan 1 baris code--}}
@section ('menunilai','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
    <div class="container">
      <div class="row">
        <div class="col-12">
        {{-- <h3 class="my-3 align-center">Isi Nilai {{$jadwalbelajar->mapel->namaMapel}} di kelas {{$jadwalbelajar->kelas->namaKelas}}</h3> --}}
          @if (session('status'))
            <div class="alert alert-success">
              {{session ('status')}}
            </div>
          @endif
          @if (session('status2'))
            <div class="alert alert-danger">
              {{session ('status2')}}
            </div>
          @endif
        </div>
      </div>
      <div class="card px-3 mb-n1 bg-light">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ url('/nilai') }}" type="button"  class="btn btn-secondary mt-3 mb-2 align-left" title=""> <i class="material-icons mx-1  mb-2 align-middle">backspace</i>Kembali</a>
           </div>
          </div>
        </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card mt-2">
                  <h5 class=" align-center mt-4"> Input Nilai Kelas {{$jadwalbelajar->kelas->namaKelas}} </h5> <br> <h6 class="align-center">Mata Pelajaran {{$jadwalbelajar->mapel->namaMapel}} {{$jadwalbelajar->mapel->jenis}} </h6>
                
                  <div class="form-group row mb-n2 mx-auto ">
                    <div class="col-md-12 align-center mt-2 ">
                    {{-- <label for="namaLengkap" class="col-sm-3 col-form-label">Cari Santri</label> --}}
                    <button type="button" class=" col-form-label btn btn-info " style="border-radius: 5px ;  font-size:12px ; width:200px" data-toggle="modal" data-target="#carinama">
                      <span class="glyphicon glyphicon-search mr-2"></span>Cari data santri
                    </button>
                  </div>
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
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      {{-- <th scope="col">No</th> --}}
                                      {{-- <th scope="col">ID Santri</th> --}}
                                      <th scope="col">Nama Santri</th>
                                      <th scope="col">Nama Santri</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($santriwustha as $sw)
                                    @if($jadwalbelajar->kelas->id == $sw->kelas->id)
                                    <tr>
                                    {{-- <th scope="row">{{$loop->iteration}}</th> --}}
                                      {{-- <td>{{$sw->id}}</td> --}}
                                      <td>{{$sw->namaLengkap}}</td>
                                    {{-- <td><a href="#" id="data" class="btn btn-success pilih" onClick="masuk(this,'{{$sw->namaLengkap}}','{{$sw->kelas->namaKelas}}','{{$sw->id}}')" style="border-radius: 5px ; margin:-5px ; font-size:12px">pilih data</a></td> --}}
                                    <td><a href="#" id="data" class="btn btn-success pilih" data-id={{$sw->id}} data-nama={{$sw->namaLengkap}} style="border-radius: 5px ; margin:-5px ; font-size:12px">pilih data</a></td>
                                    </tr>
                                    @endif
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
                  <div class="body table-responsive">
                    
                    <table class="table table-hover align-center">
                      <thead>
                        <tr>
                            <form action="/nilaiisiuts/{{$jadwalbelajar->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <th scope="col">Nama Santri</th>
                            <input type="hidden" name="santriwustha_id" id="id" value="">
                            <input type="hidden" name="mapel_id" value="{{$jadwalbelajar->mapel_id}}">
                            <input type="hidden" name="kelas_id" value="{{$jadwalbelajar->kelas_id}}">
                            <td colspan="2">
                              <input type="text" readonly size="30" class="form-control" name="" id="namaLengkap">
                            </td>
                          </tr>
                          <tr>
                            <th scope="col">Nilai UTS</th>
                            <td><input type="number" min="30" max="100" size="5" class="form-control @error('uts') is-invalid @enderror " name="uts" id="">
                              @error('uts')
                              <div class="invalid-feedback">{{$message}}</div>
                              @enderror
                            </td>
                            <td>
                              <button type="submit" class="btn btn-success">Input Nilai</button>
                            </td>
                          </form>
                          </tr>
                        <th scope="col" style="width: 30%">Nilai Harian / Praktek</th>
                        <th scope="col" style="width: 20%">Nilai UAS</th>
                        <th scope="col" style="width: 20%">Nilai Akhlak</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <form action="/nilaiisi/{{$jadwalbelajar->id}}" method="post" enctype="multipart/form-data">
                          @csrf
                          {{-- @if($nilai->harian == null) --}}
                          
                          <input type="hidden" name="santriwustha_id" id="id2" value="">
                            {{-- <input type="hidden" name="jadwalbelajar_id" value="{{$jadwalbelajar->id}}"> --}}
                            <input type="hidden" name="mapel_id" value="{{$jadwalbelajar->mapel_id}}">
                            <input type="hidden" name="kelas_id" value="{{$jadwalbelajar->kelas_id}}">
                              <td><input type="number" min="30" max="100" size="5" class="form-control @error('harian') is-invalid @enderror " name="harian" id="">
                                @error('harian')
                                  <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                              </td>
                              
                              <td><input type="number" min="30" max="100" size="5" class="form-control @error('uas') is-invalid @enderror " name="uas" id="">
                                @error('uas')
                                  <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                              </td>
                              <td><input type="number" min="30" max="100" size="5" class="form-control @error('akhlak') is-invalid @enderror " name="akhlak" id="">
                                @error('akhlak')
                                  <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                              </td>
                            <td>
                              <button type="submit" class="btn btn-success">Input Nilai</button>
                            </td>
                          </form>
                           
                          </tr>
                          {{-- @endif
                          @endforeach --}}
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
  
            {{-- {{$santriwustha->links()}} --}}
  
              </div>
              {{-- <div class="col-md-12"> --}}
                <div class="card mt-2">
                <h5 class=" align-center mt-4"> Daftar Nilai Kelas {{$jadwalbelajar->kelas->namaKelas}} </h5> <br> <h6 class="align-center">Mata Pelajaran {{$jadwalbelajar->mapel->namaMapel}} </h6>
                  
                  {{-- <h5 class="ml-4 mt-4 mb-n2"> Santri didalam kelas {{$jadwal->kelas->namaKelas}} </h5> --}}
                  <div class="body table-responsive mt-n2">
                    <table class="table table-striped table-bordered align-center">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama Santri</th>
                          <th scope="col">Nilai Harian / Praktek</th>
                          <th scope="col">Nilai UTS</th>
                          <th scope="col">Nilai UAS</th>
                          <th scope="col">Nilai Akhlak</th>
                          <th scope="col"> Nilai Raport </th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                       @foreach ($daftarnilai as $ni)
                        {{-- @if ($ni->santriwustha->id) --}}
                          <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$ni->santriwustha->namaLengkap}}</td>
                            <td>{{$ni->harian}}</td>
                            <td>{{$ni->uts}}</td>
                            <td>{{$ni->uas}}</td>
                            <td>{{$ni->akhlak}}</td>
                            <td>{{$ni->rataRata}}</td>
                            <td>
                              <button type="button" class="btn btn-danger " style="border-radius: 5px ;  font-size:12px" data-toggle="modal" data-target="#exampleModal{{$ni->id}}">
                                Hapus Nilai
                              </button>
                              {{-- @endif --}}
                              {{-- modal hapus--}}
                              <div class="modal fade" id="exampleModal{{$ni->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Hapus Nilai Santri</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                    Yakin ingin hapus Nilai {{$ni->santriwustha->namaLengkap}} ini?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                      <form action="/nilai/{{$ni->id}}" method="POST" class="d-inline">
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
                          {{-- @endif --}}
                          @endforeach
                      </tbody>
                      <tfoot>
                        @if($rataRataKelas!=null)
                      <td colspan="4">Rata-rata UTS: {{$rataRataKelas->rataRataMid}}</td>
                      @else
                      <td colspan="4">Rata-rata UTS: </td>
                      @endif
                        @if($rataRataKelas!=null)
                      <td colspan="4">Rata-rata Raport Kelas: {{$rataRataKelas->rataRataKelas}}</td>
                      @else
                      <td colspan="4">Rata-rata Raport Kelas: </td>
                      @endif
                      </tfoot>
                    </table>
                    </div>
                  </div>
                {{-- </div> --}}
  
            {{-- {{$santriwustha->links()}} --}}
  
              </div>
  </div>
  </div>
  </div>
  <script type="text/javascript">

    $(document).ready(function(){
      $(document).on('click','#data',function(){
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $('#id').val(id);
        $('#id2').val(id);
        $('#namaLengkap').val(nama);
        $('.close').click(); 
        $("#carinama .close").click();
      })
    })
                
</script>
@endsection
