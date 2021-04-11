<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    <title>SW - Lapor UAS Ganjil{{$santriwustha->namaLengkap}} {{$periode->semester}} {{$periode->tahun}}</title>
<style>
    *{
        font-family: 'Times New Roman', Times, serif;
    }
    body{
        width: 85%;
        margin:50px auto 10px auto;
    }
    h2{
        font-weight: 500;
    }
    #nilai{
        width: 100%;
        border: 1px solid black;
        border-collapse: collapse;    }
    #nilai td, th{
        border: 1px solid black;
        font-size: 14px;
        text-align: center;
        padding:10px;
    }

    .subJudul{
        text-align: left;
        padding-left: 20px;
    }
    .mapel{
        text-align: left;
        padding-left: 40px;
    }
    #identitas{
        width: 100%;
        margin-bottom: 20px;
        margin-top: 30px;
    }    
    #identitas td{
        font-size:14px;
        height: 20px;
        border: none;
        text-align: left;
        /* font-weight: bold; */
    }
    #kehadiran{
        width: 40%;
        margin: 20px 0px;
        border-collapse: collapse;
        float: right;
    }
    #kehadiran td{
        border: 1px solid black;
        text-align: center;
    }
    #ekskul{
        width: 50%;
        margin: 20px 0px;
        border-collapse: collapse;
        float: left;
    }
    #ekskul td{
        border: 1px solid black;
        text-align: center;
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
        text-align: center;
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
    #catatan td {
        border: 1px solid black;
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
        <td style="width: 17%">
            <span>NAMA SEKOLAH</span>
        </td>
        <td style="width: 50%">
            <span>: Ponpes Al-Qosim Jambi</span>
        </td>
        <td style="width: 15%">
            <span>KELAS</span>
        </td>
        <td style="width: 20%">
            <span>: {{$kelas->namaKelas}} ( {{terbilang($kelas->namaKelas)}} )</span>
        </td>
    </tr>
    <tr>
        <td>
            <span>PROGRAM</span>
        </td>
        <td>
            <span>: Salafiyah Wustha'</span>
        </td>
        <td>
            <span>SEMESTER</span>
        </td>
        <td>
            <span>: {{$periode->semester}}</span>
        </td>
    </tr>
    <tr>
        <td>
            <span>ALAMAT</span>
        </td>
        <td >
            <span >: Jl. Sei Beluru RT.01, Talang Belido, Sei. Gelam, Muaro Jambi		
            </span>
        </td>
        <td>
            <span>TAHUN</span>
        </td>
        <td>
            <span>: {{$periode->tahun}}</span>
        </td>
    </tr>
    <tr>
        <td>
            <span>NAMA</span>
        </td>
        <td width:30%>
            <span>: {{$santriwustha->namaLengkap}}</span>
        </td>
        <td>
            <span>NISN</span>
        </td>
        <td>
            <span>: {{$santriwustha->nisnSekolahSebelum}}</span>
        </td>
    </tr>
    
</table >
{{-- Nilai --}}
<table id="nilai">
    <tr>
        <th rowspan="2" style="width: 5%">No</th>
        <th rowspan="2" colspan="3" style="width: 35%">MATA PELAJARAN</th>
        <th colspan="4" style="width: 60%">NILAI</th>
    </tr>
    <tr>
        <th>KKM</th>
        <th>Angka</th>
        <th>Huruf</th>
        <th>Rata-rata Kelas</th>
    </tr>
    @if($nilaidiniyahsorted != null)
    <tr>
        <th rowspan="{{count($nilaidiniyahsorted)+1}}" style="text-align: center">
            <span>I</span>
        </th>
        <th rowspan="{{count($nilaidiniyahsorted)+1}}" style="text-align: center">
            <span>ILMU DINIYAH</span>
        </th>
    </tr>
    @foreach($nilaidiniyahsorted as $nd)
    <tr>
        <td >{{$loop->iteration}}</td>
        <td style="text-align: left"> {{$nd->mapel->namaMapel}} </td>
        <td>65</td>
        <td>{{$nd->uts}}</td>
        <td style="text-align: left">{{terbilang($nd->uts)}}</td>
        <td>{{$nd->rataRataMid}}</td>
    </tr>
    </tr>
    @endforeach
    @endif
    @if($nilaiBahasaSorted != null)
    <tr>
        <th rowspan="{{count($nilaiBahasaSorted)+1}}" style="text-align: center">
            <span>II</span>
        </th>
        <th rowspan="{{count($nilaiBahasaSorted)+1}}" style="text-align: center">
            <span>ILMU BAHASA</span>
        </th>
        
    </tr>
    @foreach($nilaiBahasaSorted as $nb)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td style="text-align: left">{{$nb->mapel->namaMapel}}</td>
        <td>65</td>
        <td>{{$nb->uts}}</td>
        <td style="text-align: left">{{terbilang($nb->uts)}}</td>
        <td>{{$nb->rataRataMid}}</td>
    </tr>
    @endforeach
    @endif
    @if($nilaiumumsorted != null)
    <tr>
        <th rowspan="{{count($nilaiumumsorted)+1}}" style="text-align: center">
            <span>III</span>
        </th>
        <th rowspan="{{count($nilaiumumsorted)+1}}" style="text-align: center">
            <span>ILMU UMUM</span>
        </th>
        
    </tr>
    @foreach($nilaiumumsorted as $nu)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td style="text-align: left">{{$nu->mapel->namaMapel}}</td>
        <td>65</td>
        <td>{{$nu->uts}}</td>
        <td style="text-align: left">{{terbilang($nu->uts)}}</td>
        <td>{{$nu->rataRataMid}}</td>
    </tr>
    @endforeach
    @endif
    <tr>
        <th colspan="5" style="text-align: right"> Jumlah </th>
        <th> {{round($nilaiaktif->sum('uts'),1)}}</th>
        <th colspan="3" class="subJudul">  {{terbilang($nilaiaktif->sum('uts'))}}</th>
    </tr>
    <tr>
        <th colspan="5" style="text-align: right"> Rata-rata </th>
        <th> {{round($nilaiaktif->avg('uts'),2)}}</th>
        <th colspan="3" class="subJudul"> {{terbilang(round($nilaiaktif->avg('uts'),2))}}</th>
    </tr>
</table>
{{-- Tabel Ketidakhadiran --}}
<table id="ekskul">
    <tr>
        <td style="font-weight:bold;">NO</td>
        <td style="font-weight:bold;">KEGIATAN EKSTRAKULIKULER</td>
        <td style="font-weight:bold;">Nilai</td>
    </tr>
    <tr>
        <td>1</td>
        <td> Mudhaharah</td>
        <td style="padding:0px 10px"></td>
    </tr>
    <tr>
        <td>2</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>3</td>
        <td></td>
        <td></td>
    </tr>
</table>
<table id="kehadiran">
    <tr>
        <td colspan="3" style="width: 50%; font-weight:bold;">KETIDAKHADIRAN</td>
    </tr>
    <tr>
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
        <td style="width:  68%"></td>
        <td >
            <span>Diberikan di </span>
        </td>
        <td>
            <span> : <span style="margin-left: 30px"> Jambi </span></span>
        </td>
    </tr>
    <tr>
        <td style="width:  68%"></td>
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