<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>SU - Lapor Mid Semester {{$santriwustha->namaLengkap}} {{$periode->semester}} {{$periode->tahun}}</title>
<style>
    *{
        font-family: 'Times New Roman', Times, serif;
    }
    body{
        width: 70%;
        margin:50px auto 10px auto;
    }
    h2{
        font-weight: 500;
    }
    table{
        width: 100%;
    }
    table, td, th{
        border: 2px solid black;
        font-size: 18px;
        text-align: center;
    }

    .subJudul{
        text-align: left;
        padding-left: 20px;
    }
    .mapel{
        text-align: left;
        padding-left: 40px;
    }
</style>
</head>
<body>
    {{-- @foreach ($nilaiaktif as $nilai)
    {{$nilai->mapel->namaMapel}}
    {{$nilai->uts}} <br>

    @endforeach --}}

    {{-- Header --}}
<header class="text-center">
    <h2 class="font-weight-bold">LAPORAN HASIL EVALUASI</h2>
    <h2 class="font-weight-bold">UJIAN TENGAH SEMESTER (UTS)</h2>
</header>
{{-- Identitas --}}
<div class="row mt-5">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md">
                <h5 class="font-weight-bold">Nama</h5>
            </div>
            <div class="col-md">
                <h5 class="font-weight-bold">: {{$santriwustha->namaLengkap}}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <h5 class="font-weight-bold">NISN</h5>
            </div>
            <div class="col-md">
                <h5 class="font-weight-bold">: {{$santriwustha->nisnSekolahSebelum}}</h5>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md">
                <h5 class="font-weight-bold">Kelas</h5>
            </div>
            <div class="col-md">
                <h5 class="font-weight-bold">: {{$kelas->namaKelas}}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <h5 class="font-weight-bold">Semester</h5>
            </div>
            <div class="col-md">
                <h5 class="font-weight-bold">: {{$periode->semester}}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <h5 class="font-weight-bold">Tahun</h5>
            </div>
            <div class="col-md">
                <h5 class="font-weight-bold">: {{$periode->tahun}}</h5>
            </div>
        </div>
    </div>

</div>
{{-- Nilai --}}
<table class="mt-2">
    {{-- Table Header --}}
    <tr>
        <th>Mata Pelajaran</th>
        <th>Nilai</th>
        <th>KKM*</th>
        <th>Ketuntasan</th>
        <th>Rata-rata Kelas</th>
    </tr>
    {{-- Kategori Mapel --}}
    <tr>
        <th colspan="5" class="subJudul">I. Diniyah</th>
    </tr>
    {{-- Mapel --}}
    @foreach($nilaidiniyahsorted as $nd)
    <tr>
        <td class="mapel">
            {{$loop->iteration}}. {{$nd->namaMapel}}
        </td>
        <td>
            {{$nd->uts}}
        </td>
        <td>
            60
        </td>
        <td>
            <?php
            if($nd->uts<=60){
                echo "Tidak Tuntas";
            }else{
                echo "Tuntas";
            }
            ?>
        </td>
        <td>
          {{$nd->rataRataMid}}
        </td>
    </tr>
    @endforeach
    {{-- Kategori Mapel --}}
    <tr>
        <th colspan="5" class="subJudul">II. Umum</th>
    </tr>
    {{-- Mapel --}}
    @foreach($nilaiumumsorted as $nu)
    <tr>
        <td class="mapel">
            {{$loop->iteration}}. {{$nu->namaMapel}}
        </td>
        <td>
            {{$nu->uts}}
        </td>
        <td>
            60
        </td>
        <td>
            <?php
            if($nu->uts<=60){
                echo "Tidak Tuntas";
            }else{
                echo "Tuntas";
            }
            ?>
        </td>
        <td>
          {{$nu->rataRataMid}}
        </td>
    </tr>
    @endforeach

    {{-- Kategori Mapel --}}
    <tr>
        <th colspan="5" class="subJudul">III. Muatan Lokal</th>
    </tr>
    {{-- Mapel --}}
    @foreach($nilaiMulokSorted as $nm)
    <tr>
        <td class="mapel">
            {{$loop->iteration}}. {{$nm->namaMapel}}
        </td>
        <td>
            {{$nm->uts}}
        </td>
        <td>
            60
        </td>
        <td>
            <?php
            if($nm->uts<=60){
                echo "Tidak Tuntas";
            }else{
                echo "Tuntas";
            }
            ?>
        </td>
        <td>
          {{$nm->rataRataMid}}
        </td>
    </tr>
    @endforeach
    <tr>
        <th> Jumlah </th>
        <th> {{round($nilaiaktif->sum('rataRata'))}}</th>
        <th colspan="3" class="subJudul">  {{terbilang($nilaiaktif->sum('rataRata'))}}</th>
    </tr>
    <tr>
        <th> Rata-rata </th>
        <th> {{round($nilaiaktif->avg('rataRata'),2)}}</th>
        <th colspan="3" class="subJudul"> {{terbilang(round($nilaiaktif->avg('rataRata'),2))}}</th>
    </tr>
</table>
{{-- Tabel Ketidakhadiran --}}
<table class="mt-3">
    <tr>
        <td rowspan="3" style="width: 50%" class="font-weight-bold">KETIDAKHADIRAN</td>
        <td>Sakit (S)</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>Izin (I)</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>Alpa (A)</td>
        <td>:</td>
        <td></td>
    </tr>
</table>
{{-- Tanggal --}}
<div class="row mt-3">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    Diberikan di
                </div>
                <div class="col-md-6">
                    : Jambi
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    Tanggal
                </div>
                <div class="col-md-6">
                    : {{$tanggal->isoFormat('D MMMM YYYY')}}
                </div>
            </div>
        </div>
</div>
{{-- TTD --}}
<div class="row text-center mt-3">
    <div class="col-md-6">
        Mengetahui, <br>
        <b>Orang Tua / Wali</b>
        <hr style="height:2px; width:75%; border-width:0;color:black;background-color:black; margin-top:100px;">
    </div>
    <div class="col-md-6">
        <br>
        <b>Wali Kelas</b>
        <hr style="height:2px; width:75%; border-width:0;color:black;background-color:black; margin-top:100px;">
        <b>{{$walikelas->namaLengkap}}</b>
    </div>

</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>