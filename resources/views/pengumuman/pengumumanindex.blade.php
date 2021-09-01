@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection
@section('title','Data Pengumuman') {{-- mengisi yield title dengan 1 baris code--}}
{{-- @section('menuasatidzah','active') --}}
@section('menuPengumuman','active')
@section('container') {{-- mengisi yield container dengan lebih dari 1 baris code --}}
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="my-3 align-center">Pengumuman</h3>
            @if (session('status'))
            <div class="alert alert-success">
                {{session ('status')}}
            </div>
            @endif
        </div>
    </div>
    <div class="card px-3 mb-n1  bg-light">
        <div class="row">
            <div class="col-md-4">
                <a href="/pengumumantambah" class="btn btn-primary mt-2">Pengumuman Baru</a>
            </div>
            {{-- <div class="col-md-8">
                <form method="GET" action="{{ url('/pelanggaran') }}" accept-charset="UTF-8"
                    class="form-inline float-right" role="search">
                    <div class="input-group ">
                        <div class="box-tools">
                            <div class="has-feedback">
                                
                                <input type="text" name="cari" class="form-control mt-3 mb-n2" placeholder="Cari"
                                    value="{{ request('cari') }}">
                                <span class="input-group-btn ">
                                    <button type="submit" class="btn btn-primary mr-1 mt-3 mb-n2"> Cari </button>
                                    <a href="{{ url('/pelanggaran') }}" class="btn btn-primary mt-3 mb-n2" title="">
                                        Refresh Data </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div> --}}
        </div>
    </div>
    <div class="card mt-2">
        <div class="body table-responsive">
            <table class="table table-hover table-sm" id="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Judul Pengumuman</th>
                        <th scope="col">Tanggal </th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengumuman as $png)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$png->jenisPengumuman}}</td>
                        <td>{{$png->judul}}</td>
                        <td>{{$png->tanggalPengumuman}}</td>
                        @if($png->tujuanPengumuman !=null)
                            <td>Wali Santri {{tujuanPengumuman($png->tujuanPengumuman)}}</td>
                        @elseif($png->tujuanKelompok !=null)
                            <td>Semua Wali Santri {{jenjangLengkap($png->tujuanKelompok)}}</td>    
                        @endif                    
                        <td><a href="/pelanggaran/{{$png->id}}/edit"><button type="button" class="btn btn-info "
                                    style="border-radius: 5px ;  font-size:12px">
                                    Edit Data
                                </button></a>
                            <button type="button" class="btn btn-danger " style="border-radius: 5px ;  font-size:12px"
                                data-toggle="modal" data-target="#exampleModal{{$png->id}}">
                                Hapus Data
                            </button>
                            {{-- modal hapus--}}
                            <div class="modal fade" id="exampleModal{{$png->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus data Pelanggaran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin hapus data pengumuman ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <form action="/pengumumanhapus/{{$png->id}}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger px-4 ml-2">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <td><a href="pelanggaran/{{$png->id}}" class="btn btn-success" style="border-radius: 5px
                            ; margin:-5px ; font-size:12px">detail</a></td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- {{$pengumuman->links()}} --}}
</div>
</div>

@endsection
@section('footer')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script type="text/javascript" >
    $('#table').DataTable({
      "pageLength":     20,
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