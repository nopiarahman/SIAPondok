@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection
@section('title','Tambah Pengumuman') {{-- mengisi yield title dengan 1 baris code--}}
@section('menuPengumuman','active')
@section('container') {{-- mengisi yield container dengan lebih dari 1 baris code --}}


<h3 class="my-3 align-center">Tambah Pengumuman</h3>
<form method="POST" action="/pengumumantambah" class="pb-5" enctype="multipart/form-data">
    <input type="hidden" name="tanggalPengumuman" value="{{carbon\carbon::now()}}">
    @csrf
    <div class="col-md-12">
        <div class="card p-4 bg-light">
            <div class="form-group row">
                <label for="tujuanKelompok" class="col-sm-3 col-form-label">Tujuan Pengumuman</label>
                <div class="col-sm-5 ">
                    <div class="input-group">
                        <select name="tujuanKelompok" class="custom-select" id="inputGroupSelect04">
                            <option selected>Pilih...</option>
                            <option value="{{jenjang()}}">Semua Wali Kelas</option>
                            <option value="">Pengumuman Privat</option>
                        </select>
                        <div class="input-group-append">
                            <button type="button" class=" col-form-label btn btn-info "
                                style="border-radius: 5px ;  font-size:12px" data-toggle="modal"
                                data-target="#carinama">
                                <span class="glyphicon glyphicon-search mr-2"></span>Cari data wali santri
                            </button>
                            {{-- <button class="btn btn-outline-secondary" type="button">Button</button> --}}
                        </div>
                    </div>

                </div>
            </div>

                

<div class=" form-group row">
    <label for="namaLengkap" class="col-sm-3 col-form-label">Nama Wali Santri</label>
    <div class="col-md-4">
        <input type="text" readonly class="form-control" id="namaLengkap" name="" value="{{old('namaLengkap')}}">
        <input type="hidden" readonly class="form-control" id="emailWali" name="emailWali" value="{{old('emailWali')}}">
    </div>
    <label for="kelas" class="col-form-label">Kelas</label>
    <div class="col-md-2">
        <input type="text" readonly class="form-control" id="kelas" name="" value="{{old('namaKelas')}}">
    </div>
    <label for="id" class="col-form-label">ID</label>
    <div class="col-md-2">
        <input type="text" readonly class="form-control" id="id" name="santriwustha_id" value="{{old('id')}}">
    </div>
</div>
<div class="form-group row">
    <label for="jenisPengumuman" class="col-sm-3 col-form-label">Jenis Pengumuman</label>
    <div class="col-sm-9 ">
        <input type="text" class="form-control @error('jenisPengumuman') is-invalid @enderror " id="jenisPengumuman"
            name="jenisPengumuman" value="{{old('jenisPengumuman')}}">
        @error('jenisPengumuman')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="judul" class="col-sm-3 col-form-label">Judul Pengumuan</label>
    <div class="col-sm-9 ">
        <input type="text" class="form-control @error('judul') is-invalid @enderror " id="judul" name="judul"
            value="{{old('judul')}}">
        @error('judul')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="isiPengumuman" class="col-sm-3 col-form-label">Isi Pengumuman</label>
    <div class="col-sm-9">
        <div class="form-group">
            <div class="form-line">
                <textarea rows="4" class="form-control no-resize" placeholder="Masukkan Isi Pengumuman disini..."
                    name="isiPengumuman">{{ old('isiPengumuman')}}</textarea>
            </div>
        </div>
    </div>
    @error('jenisPelanggaran')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="form-group row">
    <div class="col-sm-3"></div>
    <div class="col-sm-9">
        <button type="submit" class="btn btn-primary align-center py-2 "> Tambah Data</button>
        <a href="/pengumuman" class="btn btn-secondary align-center py-2">Kembali</a>
    </div>
</div>
</div>
</div>
{{-- Tombol --}}
</form>

</div>
</div>
</div>
{{-- modal hapus--}}
<div class="modal fade" id="carinama" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pilih Wali Santri</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="body">
                <table class="table table-hover" id="tableWali">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Wali Santri</th>
                            <th scope="col">Nama Santri</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">No Telp Wali</th>
                            {{-- <th scope="col">Email Wali</th> --}}
                            <th scope="col">Pilih Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cariWaliSantri as $wali)
                        <tr class="" data-nama="{{$wali->name}}">
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$wali->namaWali}}</td>
                            <td>{{$wali->namaLengkap}}</td>
                            <td>{{$wali->kelas->namaKelas}}</td>
                            <td>{{$wali->teleponWali}}</td>
                            <td><a href="#" id="data" class="btn btn-success pilih"
                                    data-id="{{$wali->id}}" data-nama="{{$wali->namaWali}}"
                                    data-kelas="{{$wali->kelas->namaKelas}}"
                                    data-email="{{$wali->emailWali}}"
                                    style="border-radius: 5px ; margin:-5px ; font-size:12px">pilih
                                    data</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '#data', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var kelas = $(this).data('kelas');
            var email = $(this).data('email');
            $('#id').val(id);
            $('#namaLengkap').val(nama);
            $('#kelas').val(kelas);
            $('#emailWali').val(email);
            $('.close').click();
            $("#carinama .close").click();
        })
    })

</script>


@endsection
@section('footer')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script type="text/javascript" >
    $('#tableWali').DataTable({
      "pageLength":     10,
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