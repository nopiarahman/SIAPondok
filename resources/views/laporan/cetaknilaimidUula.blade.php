<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Lapor Mid Semester {{$santriwustha->namaLengkap}} {{$periode->semester}} {{$periode->tahun}}</title>
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
                <h5 class="font-weight-bold">: Nopi Arahman</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <h5 class="font-weight-bold">NISN</h5>
            </div>
            <div class="col-md">
                <h5 class="font-weight-bold">: 394523594375</h5>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">            
            <div class="col-md">
                <h5 class="font-weight-bold">Kelas</h5>
            </div>
            <div class="col-md">
                <h5 class="font-weight-bold">: 2 dua </h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <h5 class="font-weight-bold">Semester</h5>
            </div>
            <div class="col-md">
                <h5 class="font-weight-bold">: I (Ganjil)</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <h5 class="font-weight-bold">Tahun</h5>
            </div>
            <div class="col-md">
                <h5 class="font-weight-bold">: 1440-1441H </h5>
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
    <tr>
        <td class="mapel">
            1. Aqidah
        </td>
        <td>
            100
        </td>
        <td>
            60
        </td>
        <td>
            Tuntas
        </td>
        <td>
            90,3
        </td>
    </tr>
    <tr>
        <td class="mapel">
            2. Adab
        </td>
        <td>
            100
        </td>
        <td>
            60
        </td>
        <td>
            Tuntas
        </td>
        <td>
            90,3
        </td>
    </tr>
    <tr>
        <td class="mapel">
            3. Fikih
        </td>
        <td>
            100
        </td>
        <td>
            60
        </td>
        <td>
            Tuntas
        </td>
        <td>
            90,3
        </td>
    </tr>
    <tr>
        <td class="mapel">
            4. Sejarah Islam
        </td>
        <td>
            100
        </td>
        <td>
            60
        </td>
        <td>
            Tuntas
        </td>
        <td>
            90,3
        </td>
    </tr>
    <tr>
        <td class="mapel">
            5. Hadits
        </td>
        <td>
            100
        </td>
        <td>
            60
        </td>
        <td>
            Tuntas
        </td>
        <td>
            90,3
        </td>
    </tr>
    <tr>
        <td class="mapel">
            6. Bahasa Arab
        </td>
        <td>
            100
        </td>
        <td>
            60
        </td>
        <td>
            Tuntas
        </td>
        <td>
            90,3
        </td>
    </tr>
    {{-- Kategori Mapel --}}
    <tr>
        <th colspan="5" class="subJudul">II. Umum</th>
    </tr>
    {{-- Mapel --}}
    <tr>
        <td class="mapel">
            1. Bahasa Indonesia
        </td>
        <td>
            100
        </td>
        <td>
            60
        </td>
        <td>
            Tuntas
        </td>
        <td>
            90,3
        </td>
    </tr>
    <tr>
        <td class="mapel">
            2. Matematika
        </td>
        <td>
            100
        </td>
        <td>
            60
        </td>
        <td>
            Tuntas
        </td>
        <td>
            90,3
        </td>
    </tr>
    <tr>
        <td class="mapel">
            3. Ilmu Pengetahuan Alam
        </td>
        <td>
            100
        </td>
        <td>
            60
        </td>
        <td>
            Tuntas
        </td>
        <td>
            90,3
        </td>
    </tr>
    {{-- Kategori Mapel --}}
    <tr>
        <th colspan="5" class="subJudul">III. Muatan Lokal</th>
    </tr>
    {{-- Mapel --}}
    <tr>
        <td class="mapel">
            1. Persholatan
        </td>
        <td>
            100
        </td>
        <td>
            60
        </td>
        <td>
            Tuntas
        </td>
        <td>
            90,3
        </td>
    </tr>
    <tr>
        <td class="mapel">
            2. Doa Harian
        </td>
        <td>
            100
        </td>
        <td>
            60
        </td>
        <td>
            Tuntas
        </td>
        <td>
            90,3
        </td>
    </tr>
    <tr>
        <td class="mapel">
            3. Iqro' / Al-Qur'an
        </td>
        <td>
            100
        </td>
        <td>
            60
        </td>
        <td>
            Tuntas
        </td>
        <td>
            90,3
        </td>
    </tr>
    <tr>
        <th> Jumlah </th>
        <th> 1045</th>
        <th colspan="3" class="subJudul"> Seribu bang</th>
    </tr>
    <tr>
        <th> Rata-rata </th>
        <th> 98,4</th>
        <th colspan="3" class="subJudul"> Sembilan puluh gans!</th>
    </tr>
</table>
{{-- Tabel Ketidakhadiran --}}
<table class="mt-3">
    <tr>
        <td rowspan="3" style="width: 50%" class="font-weight-bold">KETIDAKHADIRAN</td>
        <td>Sakit (S)</td>
        <td>:</td>
        <td>2</td>
    </tr>
    <tr>
        <td>Izin (I)</td>
        <td>:</td>
        <td>2</td>
    </tr>
    <tr>
        <td>Alpa (A)</td>
        <td>:</td>
        <td>2</td>
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
                    : 15 Desember 2019    
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
        <b>Wali Kelasnya bang</b>
    </div>
    
</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>