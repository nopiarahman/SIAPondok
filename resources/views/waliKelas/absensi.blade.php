@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection
@section('title','Data Santri Salafiyah Wustha') {{-- mengisi yield title dengan 1 baris code--}}
@section ('menuwali','active')
@section ('menuAbsensi','active')
@section('container') {{-- mengisi yield container dengan lebih dari 1 baris code --}}
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="my-3 align-center">Absensi Kelas {{cekwaliKelas()->kelas->namaKelas}} Marhalah {{jenjangLengkap()}} </h3>
            @if (session('status'))
            <div class="alert alert-success">
                {{session ('status')}}
            </div>
            @endif
        </div>
    </div>
    
    <div class="card mt-2">
        <div class="body">
            <div class="row">
                <div class="col-4">
                    <table class="table table-sm" >
                        <thead>
                            <tr>
                                <th scope="col">Nama Santri</th>
                                <th scope="col">Kehadiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{route('absensiSimpan')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <tr>
                                <td colspan="2"><input type="date" name="tanggal" id="" class="form-control"></td>
                            </tr>
                            @foreach ($daftarSantri as $sw)
                            <tr>
                                <td>{{$sw->namaLengkap}}</td>
                                <td>
                                    <input type="checkbox" name="santriwustha_id[]" value="{{$sw->id}}" style="opacity: 1;position: relative;left:0px">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" value="Simpan" class="form-control btn btn-primary">
                                </td>
                            </tr>
                        </form>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- {{$santriKelas->links()}} --}}
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