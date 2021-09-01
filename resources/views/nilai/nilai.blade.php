@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection
@section('title','Data Nilai Santri') {{-- mengisi yield title dengan 1 baris code--}}
{{-- @section('menuasatidzah','active') --}}
@section('menunilai','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="my-3 align-center">Management Nilai Santri</h3>
          @if (session('status'))
            <div class="alert alert-success">
              {{session ('status')}}
            </div>
          @endif
        </div>
      </div>
      <div class="card px-3 mb-1 bg-light">
        <div class="row">
        <h6 class="mx-auto mt-3">Periode Aktif: Semester {{$periode->semester}} Tahun Ajaran {{$periode->tahun}} </h6>
        </div>
      </div>
      {{-- <div class="card px-3 mb-n1  bg-light">        
        <div class="row">
          <div class="col-md-8">
            <form method="GET" action="{{ url('/nilai') }}" accept-charset="UTF-8" class="form-inline float-right" role="search">
              <div class="input-group ">
                <div class="box-tools">
                  <div class="has-feedback">
                    
                      <input type="text" name="cari" class="form-control mt-3 mb-n2" placeholder="Cari" value="{{ request('cari') }}">
                      <span class="input-group-btn ">
                        <button type="submit" class="btn btn-primary mr-1 mt-3 mb-n2"> Cari </button>
                        <a href="{{ url('/nilai') }}" class="btn btn-primary mt-3 mb-n2" title=""> Refresh Data </a>
                      </span>
                  </div>
                </div>  
              </div>
            </form>
          </div>
        </div>
      </div> --}}
      <div class="card mt-2">
        <div class="body table-responsive ">
          <table class="table table-hover align-center" id="table">
            <thead>
              <tr>
              <th scope="col">No</th>
              <th scope="col">Materi Pelajaran</th>
              @if(auth()->user()->jenjang=='smpPutri')
              <th scope="col">Jenis</th>
              @endif
              <th scope="col">Kelas</th>
              <th scope="col">Hari </th>
              <th scope="col">Jam Mulai</th>
              <th scope="col">Jam Selesai</th>
                @if(auth()->user()->role=='asatidzah')
                  <th scope="col">Aksi</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach ($jadwalaktif as $jb)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$jb->mapel->namaMapel}}</td>
                @if(auth()->user()->jenjang=='smpPutri')
                <td>{{$jb->mapel->jenis}}</td>
                @endif
                <td>{{$jb->kelas->namaKelas}}</td>
                <td>{{$jb->hari}}</td>
                <td>{{$jb->jamMulai}}</td>
                <td>{{$jb->jamSelesai}}</td>
                <td><a href="nilai/{{$jb->id}}"><button type="button" class="btn btn-info " style="border-radius: 5px ;  font-size:12px" >
                  Isi Nilai
                </button></a>
              @endforeach
            </tbody>
            </tbody>
          </table>
          </div>
        </div>
      </div>
  {{$jadwalaktif->links()}}
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