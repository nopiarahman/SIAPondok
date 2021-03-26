@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Data Nilai Tahfidz') {{-- mengisi yield title dengan 1 baris code--}}
@section ('menunilaitahfidz','active')
@section('container') {{-- mengisi yield container dengan lebih dari 1 baris code --}}
<div class="container">
    <div class="row">
        <div class="col-12">
            {{-- <h3 class="my-3 align-center">Isi Nilai {{$jadwalbelajar->mapel->namaMapel}} di kelas
            {{$jadwalbelajar->kelas->namaKelas}}</h3> --}}
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
                <a href="{{ url('/nilai') }}" type="button" class="btn btn-secondary mt-3 mb-2 align-left" title=""> <i
                        class="material-icons mx-1  mb-2 align-middle">backspace</i>Kembali</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-2">
                <h5 class=" align-center mt-4"> Input Nilai Tahfidz {{$santriwustha->namaLengkap}} </h5> <br>
                {{-- <h6 class="align-center">Mata Pelajaran {{$jadwalbelajar->mapel->namaMapel}} </h6> --}}

                <div class="form-group row mb-n2 mx-auto ">
                    <div class="col-md-12 align-center mt-2 ">
                        {{-- <label for="namaLengkap" class="col-sm-3 col-form-label">Cari Santri</label> --}}
                        <button type="button" class=" col-form-label btn btn-info "
                            style="border-radius: 5px ;  font-size:12px ; width:200px" data-toggle="modal"
                            data-target="#carinama">
                            <span class="glyphicon glyphicon-search mr-2"></span>Cari Surah
                        </button>
                    </div>
                    <div class="modal fade" id="carinama" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Pilih Nama Surah</h5>
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
                                                    <th scope="col">No Surah</th>
                                                    <th scope="col">Nama Surah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($surah as $sh)
                                                {{-- @if($jadwalbelajar->kelas->id == $sw->kelas->id) --}}
                                                <tr>
                                                    {{-- <th scope="row">{{$loop->iteration}}</th> --}}
                                                    {{-- <td>{{$sw->id}}</td> --}}
                                                    <td>{{$sh->noSurah}}</td>
                                                    <td>{{$sh->namaSurah}}</td>
                                                    {{-- <td><a href="#" id="data" class="btn btn-success pilih" onClick="masuk(this,'{{$sw->namaLengkap}}','{{$sw->kelas->namaKelas}}','{{$sw->id}}')"
                                                    style="border-radius: 5px ; margin:-5px ; font-size:12px">pilih
                                                    data</a></td> --}}
                                                    <td><a href="#" id="data" class="btn btn-success pilih"
                                                            data-id={{$sh->id}} data-nama={{$sh->namaSurah}}
                                                            style="border-radius: 5px ; margin:-5px ; font-size:12px">pilih
                                                            data</a></td>
                                                </tr>
                                                {{-- @endif --}}
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{$surah->links()}}

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
                                {{-- <th scope="col">No</th> --}}
                                <th scope="col">Nama Surah</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>

                                <form action="/nilaitahfidzsantri/" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- @if($nilai->harian == null) --}}
                                    {{-- <input type="hidden" name="santriwustha_id" id="id" value=""> --}}
                                    {{-- <input type="hidden" name="jadwalbelajar_id" value="{{$jadwalbelajar->id}}">
                                    --}}
                                    {{-- <input type="hidden" name="mapel_id" value="{{$jadwalbelajar->mapel_id}}">
                                    <input type="hidden" name="kelas_id" value="{{$jadwalbelajar->kelas_id}}"> --}}

                                    <td><input type="text" readonly size="15" class="form-control" name=""
                                            id="namaSurah">
                                        {{-- Nilai Hidden --}}
                                        <input type="hidden" name="surah_id" id="id">
                                        <input type="hidden" name="santriwustha_id" value="{{$santriwustha->id}}">

                                    </td>
                                    <td><input type="number" min="30" max="100" size="5"
                                            class="form-control @error('totalNilai') is-invalid @enderror " name="totalNilai"
                                            id="">
                                        @error('totalNilai')
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
        {{-- <h5 class=" align-center mt-4"> Daftar Nilai Kelas {{$jadwalbelajar->kelas->namaKelas}} </h5> <br>
        <h6 class="align-center">Mata Pelajaran {{$jadwalbelajar->mapel->namaMapel}} </h6> --}}

        {{-- <h5 class="ml-4 mt-4 mb-n2"> Santri didalam kelas {{$jadwal->kelas->namaKelas}} </h5> --}}
        <div class="body table-responsive mt-n2">
            <table class="table table-striped table-bordered align-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Surah</th>
                        <th scope="col">Nilai</th>
 
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($ceknilai as $ni)
                    {{-- @if ($ni->santriwustha->id) --}}
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{cariSurah($ni->surah_id)}}</td>
                        <td>{{$ni->totalNilai}}</td>
                        <td>
                            <button type="button" class="btn btn-danger " style="border-radius: 5px ;  font-size:12px"
                                data-toggle="modal" data-target="#exampleModal{{$ni->id}}">
                                Hapus Nilai
                            </button>
                            {{-- @endif --}}
                            {{-- modal hapus--}}
                            <div class="modal fade" id="exampleModal{{$ni->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Nilai Santri</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin hapus Nilai {{$ni->id}} ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <form action="/nilaitahfidzhapus/{{$ni->id}}" method="POST" class="d-inline">
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
                    {{-- @if($rataRataKelas!=null)
                    <td colspan="8">Rata-rata Kelas: {{$rataRataKelas->rataRataKelas}}</td>
                    @else
                    <td colspan="8">Rata-rata Kelas: </td>
                    @endif --}}
                </tfoot>
            </table>
            <a href="/cetaknilaitahfidz/{{$santriwustha->id}}" type="button" class="btn btn-success mt-3 mb-2 align-left" title=""> <i
                        class="material-icons mx-1  mb-2 align-middle">local_printshop</i>Cetak Nilai</a>
            {{-- <a href="/cetaknilaitahfidz">Cetak Nilai</a> --}}
        </div>
    </div>
    {{-- </div> --}}

    {{-- {{$santriwustha->links()}} --}}

</div>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '#data', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            $('#id').val(id);
            $('#namaSurah').val(nama);
            $('.close').click();
            $("#carinama .close").click();
        })
    })

</script>
@endsection
