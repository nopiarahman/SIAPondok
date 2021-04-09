<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    <title>SU - Lapor UAS Genap {{$santriwustha->namaLengkap}} {{$periode->semester}} {{$periode->tahun}}</title>
<style>
    *{
        font-family: 'Times New Roman', Times, serif;
    }
    body{
        width: 80%;
        margin:50px auto 10px auto;
    }
    h2{
        font-weight: 500;
    }
    #nilai{
        width: 100%;
    }
    #nilai, td, th{
        border: 1px solid black;
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
        margin-top: 50px;
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
    header {
        /* margin-top: 100px; */
        padding-top: 30px;
    }
    #catatan{
        width: 100%;
        margin: 20px 0px;
        border-collapse: collapse;
    }


</style>
</head>
<body>
    {{-- Header --}}
<header style="text-align: center"">
    <h2 style="font-weight: bold">LAPORAN HASIL EVALUASI</h2>
    <h2 style="font-weight: bold">UJIAN AKHIR SEMESTER (UAS)</h2>
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
            {{$nd->rataRata}}
        </td>
        <td>
            60
        </td>
        <td>
            <?php
            if($nd->rataRata<=60){
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
            {{$nu->rataRata}}
        </td>
        <td>
            60
        </td>
        <td>
            <?php
            if($nu->rataRata<=60){
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
            {{$nm->rataRata}}
        </td>
        <td>
            60
        </td>
        <td>
            <?php
            if($nm->rataRata<=60){
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
        <th> {{round($nilaiaktif->sum('rataRata'),1)}}</th>
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
        <td style="padding:0px 10px"></td>
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
<table id="catatan">
    <tr>
        <th>
            <span>CATATAN UNTUK DIPERHATIKAN ORANGTUA / WALI</span>
        </th>
    </tr>
    <tr>
        <td style="padding: 40px 0px"></td>
    </tr>
</table>
{{-- Tanggal --}}
<table id="tanggal">
    <tr>
        <td style="width:  68%">
            <span style="font-weight: bold;  text-decoration:underline;">KEPUTUSAN:</span>
        </td>
        <td >
            <span>Diberikan di </span>
        </td>
        <td>
            <span> : <span style="margin-left: 30px"> Jambi </span></span>
        </td>
    </tr>
    <tr>
        <td style="width:  68%" rowspan="2">
            Dengan memperhatikan hasil yang dicapai <br> pada Semester I dan II, maka Ananda ditetapkan <br>
            <span style="font-weight: bold; @if($tidaknaik==true) text-decoration: line-through;@endif"  >Naik</span> / 
            <span style="font-weight: bold; @if($tidaknaik==false) text-decoration: line-through;@endif" >Tidak Naik</span>
            <span>ke Kelas: {{$naik}} ( {{terbilang($naik)}} )</span> 
        </td>
        <td>
            <span>Tanggal</span> 
        </td>
        <td>
            <span> : <span style="margin-left: 30px">{{$tanggal->isoFormat('D MMMM YYYY')}}</span></span>
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
        <td>
            <b>Kepala Sekolah</b>
        </td>
    </tr>
    <tr>
        <td>
            <hr style="height:2px; width:75%; border-width:0;color:black;background-color:black; margin-top:100px;">
            
        </td>
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
        <td>
            <b> Ratna Dewi, S.Si</b>
        </td>
    </tr>
</table>
</body>
</html>