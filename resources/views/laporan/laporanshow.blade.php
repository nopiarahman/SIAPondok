@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection
@section('title','Laporan Nilai Santri') {{-- mengisi yield title dengan 1 baris code--}}
{{-- @section('menuasatidzah','active') --}}
@section('menuwali','active')
@section('menulaporan','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
    <div class="container">
      <div class="row">
        <div class="col-12">
        <h3 class="my-3 align-center">Laporan Nilai Kelas {{$cekwaliKelas->kelas->namaKelas}}</h3>
          @if (session('status'))
            <div class="alert alert-success">
              {{session ('status')}}
            </div>
          @elseif (session ('status2'))
          <div class="alert alert-warning">
            {{session ('status2')}}
          </div>
          @endif
        </div>
      </div>
      </div>
    </div>
    <div class="card mt-2">
      <div class="body table-responsive">
        <table class="table table-hover " id="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Santri</th>
              @foreach ($santriwustha as $s)
            {{-- <th scope="col">{{$s->nilai->mapel\}}</th> --}}
              @endforeach
              <th scope="col">Aksi</th>
              {{-- @foreach ($nilai as $nm)
              <th> {{$nm->mapel->namaMapel}}</th>
              @endforeach --}}
            </tr>
          </thead>
          <tbody>
            @foreach ($santriwustha as $sa)
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
              <td>{{$sa->namaLengkap}}</td>
                <td>
                <a href="/laporan/{{$sa->id}}/detail" type="button" class="btn btn-success " style="border-radius: 5px ;  font-size:12px"><i class="small material-icons">assignment_turned_in</i>
                  Lihat Laporan Nilai
                </a>
            
                <a href="/cetaknilaisw/{{$sa->id}}" type="button" class="btn btn-info " style="border-radius: 5px ;  font-size:12px"><i class="small material-icons">print</i>
                  Cetak Lapor UAS
                </a>
                <a href="/cetaknilaimid/{{$sa->id}}" type="button" class="btn btn-info " style="border-radius: 5px ;  font-size:12px"><i class="small material-icons">print</i>
                  Cetak Lapor MID
                </a>
            
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{-- {{$kelas->links()}} --}}
    </div>
  </div>
</div>
</div>
</div>

@endsection
@section('footer')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script type="text/javascript" >
    $('#table').DataTable({
      "pageLength":     15,
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