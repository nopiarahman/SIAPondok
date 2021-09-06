@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection
@section('title','Data Pelanggaran') {{-- mengisi yield title dengan 1 baris code--}}
{{-- @section('menuasatidzah','active') --}}
@section('menuPelanggaran','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="my-3 align-center">Data Pelanggaran Santri</h3>
          @if (session('status'))
            <div class="alert alert-success">
              {{session ('status')}}
            </div>
          @endif
        </div>
      </div>
      <div class="card mb-n1  bg-light">
        <div class="row">
          <div class="col-md-8">
            <h6 class="m-3">Nama Santri : {{$santriwustha->namaLengkap}}</h6>
          </div>
          <div class="col-md-4">
            <h6 class="m-3 text-primary"> Total Poin Pelanggaran: {{$totalPoin}} Poin</h6>
          </div>
        </div>
      </div>
        <div class="card mt-2">
          <div class="body table-responsive">
            <table class="table table-hover" id="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Nama Santri</th>
                  <th scope="col">Kelas </th>
                  <th scope="col">Jenis Pelanggaran</th>
                  <th scope="col">Keterangan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pelanggaran as $pg)
                <tr>
                <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$pg->tanggalPelanggaran}}</td>
                  <td>{{$pg->santriwustha->namaLengkap}}</td>
                  <td>{{$pg->santriwustha->kelas->namaKelas}}</td>
                  <td>{{$pg->jenisPelanggaran}}</td>
                  <td>{{$pg->keterangan}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
          </div>
          <div class="card">
            <div class="container p-3">
              <table class="body table table-sm">
                <tr>
                  <th colspan="2">Keterangan </th>
                </tr>
                <tr>
                  <td>Pelanggaran Ringan</td>
                  <td>: 2 Poin</td>
                </tr>
                <tr>
                  <td>Pelanggaran Sedang</td>
                  <td>: 5 Poin</td>
                </tr>
                <tr>
                  <td>Pelanggaran Berat</td>
                  <td>: 10 Poin</td>
                </tr>
                <tr>
                  <td>Pelanggaran Sangat Berat</td>
                  <td>: 20 Poin</td>
                </tr>
                <tr>
                  <th colspan="2">Sanksi Pelanggaran</th>
                </tr>
                <tr>
                  <td>2-5 Poin</td>
                  <td>: Pemberian Surat Peringatan</td>
                </tr>
                <tr>
                  <td>5-10 Poin</td>
                  <td>: Pemanggilan Orang Tua, Tidak diperkenankan Mengikuti UAS</td>
                </tr>
                <tr>
                  <td>20 Poin</td>
                  <td>: Pengeluaran santri dari Pondok</td>
                </tr>
              </table>
            </div> 
          </div>
        </div>
    {{-- {{$pelanggaran->links()}} --}}
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