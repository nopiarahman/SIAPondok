@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection
@section('title','Data Santri Salafiyah Wustha') {{-- mengisi yield title dengan 1 baris code--}}
@section ('menusantri','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
    <div class="container">
      <div class="row">
        <div class="col-12">
          @if(auth()->user()->role=='kepalaYayasan')
          <h3 class="my-3 align-center">Data Santri Marhalah {{tulisJenjang($jenjang)}}</h3>
          @else
          <h3 class="my-3 align-center">Data Santri Marhalah {{jenjangLengkap()}}</h3>
          @endif
          @if (session('status'))
            <div class="alert alert-success">
              {{session ('status')}}
            </div>
          @endif
        </div>
      </div>
      @if(auth()->user()->role=='admin')
      <div class="card px-3 mb-n1  bg-light">
      <div class="row">
                  <div class="col-md-4">
                    <a href="/santriwusthatambah" class="btn btn-primary mt-2"  >Tambah data santri 
                    </a>
                  </div>
                  
                  {{-- <div class="col-md-8">
                    <form method="GET" action="{{ url('/santriwustha') }}" accept-charset="UTF-8" class="form-inline float-right" role="search">
                      <div class="input-group ">
                        <div class="box-tools">
                          <div class="has-feedback">
                            
                              <input type="text" name="cari" class="form-control mt-3 mb-n2" placeholder="Cari" value="{{ request('cari') }}">
                              <span class="input-group-btn ">
                                <button type="submit" class="btn btn-primary mr-1 mt-3 mb-n2"> Cari </button>
                              <a href="{{ url('/santriwustha') }}" class="btn btn-primary mt-3 mb-n2" title=""> Refresh Data </a>
                              </span>
                          </div>
                        </div>  
                      </div>
                    </form>
                  </div> --}}
                </div>
              </div>
              @endif

              <div class="card mt-2">
                <div class="body table-responsive">
                  <table class="table table-hover" id="tableSantri">
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
                      <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$sw->namaLengkap}}</td>
                        <td>{{$sw->namaWali}}</td>
                        <td>{{$sw->kelas->namaKelas}}</td>
                        <td><a href="santriwustha/{{$sw->id}}" class="btn btn-success" style="border-radius: 5px ; margin:-5px ; font-size:12px">detail</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
          {{-- {{$santriwustha->links()}} --}}
      </div>
    </div>
@endsection
@section('footer')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script type="text/javascript" >
    $('#tableSantri').DataTable({
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