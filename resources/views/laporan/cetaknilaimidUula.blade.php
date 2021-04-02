<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

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
    #nilai{
        width: 100%;
    }
    #nilai, td, th{
        border: 2px solid black;
        font-size: 18px;
        text-align: center;
        padding: 3px 0px;
    }

    .subJudul{
        text-align: left;
        padding-left: 20px;
    }
    .mapel{
        text-align: left;
        padding-left: 40px;
    }
    #nilai{
        border: 1px solid black;
        border-collapse: collapse;
    }
    #identitas{
        width: 100%;
        margin-bottom: 20px;
        margin-top: 20px;
    }    
    #identitas td{
        height: 20px;
        border: none;
        text-align: left;
    }
    #kehadiran{
        width: 100%;
        margin: 20px 0px;
        border-collapse: collapse;
    }
    #tanggal{
        margin-bottom: 20px;
    }
    #tanggal td {
        border: none;
        text-align: left;
    }
    #ttd{
        width: 100%;
    }
    #ttd td {
        border: none;
        border-collapse: collapse;
    }

</style>
</head>
<body>
    {{-- Header --}}
<header style="text-align: center"">
    <h2 style="font-weight: bold">LAPORAN HASIL EVALUASI</h2>
    <h2 style="font-weight: bold">UJIAN TENGAH SEMESTER (UTS)</h2>
</header>
{{-- Identitas --}}
<table id="identitas" cellspacing="0">
    <tr>
        <td>
            <span>Nama</span>
        </td>
        <td width:30%>
            <span>: {{$santriwustha->namaLengkap}}</span>
        </td>
        <td>
            <span>Kelas</span>
        </td>
        <td>
            <span>: {{$kelas->namaKelas}} ( {{terbilang($kelas->namaKelas)}} )</span>
        </td>
    </tr>
    <tr>
        <td>
            <span>NISN</span>
        </td>
        <td>
            <span>: {{$santriwustha->nisnSekolahSebelum}}</span>
        </td>
        <td>
            <span>Semester</span>
        </td>
        <td>
            <span>: {{$periode->semester}}</span>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>
            <span>Tahun</span>
        </td>
        <td>
            <span>: {{$periode->tahun}}</span>
        </td>
    </tr>
    
</table>
{{-- Nilai --}}
<table id="nilai" >
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
<table id="kehadiran">
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
<table id="tanggal">
    <tr>
        <td style="width: 70%"></td>
        <td >
            <span>Diberikan di </span>
        </td>
        <td>
            <span>: Jambi </span>
        </td>
    </tr>
    <tr>
        <td style="width: 70%"></td>
        <td>
            <span>Tanggal</span> 
        </td>
        <td>
            <span>:{{$tanggal->isoFormat('D MMMM YYYY')}}</span>
        </td>
    </tr>
</table>
{{-- TTD --}}
<table id="ttd">
    <tr>
        <td>
            Mengetahui,
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
            <b>Orang Tua / Wali</b>
        </td>
        <td>
            <b>Wali Kelas</b>
        </td>
    </tr>
    <tr>
        <td>
            <hr style="height:2px; width:75%; border-width:0;color:black;background-color:black; margin-top:100px;">
            
        </td>
        <td>
            <hr style="height:2px; width:75%; border-width:0;color:black;background-color:black; margin-top:100px;">
        </td>
    </tr>
    <tr>
        <td>

        </td>
        <td>
            <b>{{$walikelas->namaLengkap}}</b>
        </td>
    </tr>
</table>
</body>
</html>