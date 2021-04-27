<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="{{asset('tema/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> --}}
    <title>Cetak Nilai Tahfidz {{$santriwustha->namaLengkap}}</title>
</head>
<style>
    body{
        font-family: 'Times New Roman', Times, serif;

    }
    .judul{
        font-size: 12pt;
        font-weight: bold;
    }
    .tebal{
        font-weight: bold;
    }
    .full{
        width: 90%;
    }
    #nilai{
        border: 1px solid black;
        border-collapse: collapse;
    }
    #nilai td, th{
        border: 1px solid black;
        padding: 5px;
    }
    .bawah{
        float: right;
    }
    #tanggal{
        float:right;
        margin-top: 20px;
    }

</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col text-center mt-4 ">
                <h3 class="tebal" style="text-align: center">LAPORAN HASIL EVALUASI</h3>
                <h3 class="tebal" style="text-align: center">TAHFIDZ QUR'AN</h3>
            </div>
        </div>
        <div class="judul">
            <table class="full" style="padding-top: 20px">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{$santriwustha->namaLengkap}}</td>

                    <td>Kelas</td>
                    <td>:</td>
                    <td>{{$santriwustha->kelas->namaKelas}}</td>
                </tr>
                <tr>
                    <td>NIS/NISN</td>
                    <td>:</td>
                    <td>{{$santriwustha->nisnSekolahSebelum}}</td>

                    <td>Semester</td>
                    <td>:</td>
                    <td>{{$periode->semester}}</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td>Tahun Ajaran</td>
                    <td>:</td>
                    <td>{{$periode->tahun}}</td>
                    
                </tr>
            </table>
        </div>
        <div class="kolomTunggal">
            <table id="nilai" class="full" style="margin-top: 20px"> 
                <tr class="tebal">
                    <th rowspan="2" style="text-align: center"> <span class="tebal"> No. </span></th>
                    <th rowspan="2" style="text-align: center" width="40%"><span class="tebal">Surah</span></th>
                    <th colspan="2" style="text-align: center"> <span class="tebal">Nilai</span></th>
                </tr>
                <tr>
                    <th style="text-align: center"><span class="tebal">Angka</span></th>
                    <th style="text-align: center"><span class="tebal">Huruf</span></th>
                </tr>
                @foreach ($duaJuz as $juz)
                <tr>
                        <td scope="row" style="text-align: center"> <span> {{$loop->iteration}} </span></td>
                        <td style="padding-left: 10px; text-align:right;" > <span> {{$juz->arab}}</span></td>
                        <td style="text-align: center"> 
                        <span> 
                            
                        
                        </span></td>
                        {{-- <td> --}}
                            {{-- @if($nilai->totalNilai>=85)
                            <td style="text-align: center"> <span>A</span></td>
                            @elseif($nilai->totalNilai>=70)
                            <td style="text-align: center"> <span>B</span></td>
                            @elseif($nilai->totalNilai>=60)
                            <td style="text-align: center"> <span>C</span></td>
                            @else
                            <td style="text-align: center"> <span>C</span></td>
                            @endif --}}
                        {{-- </td> --}}
                    </tr>
                @endforeach
                {{-- @foreach ($nilaitahfidz as $nilai)
                <tr>
                        <td scope="row" style="text-align: center"> <span> {{$loop->iteration}} </span></td>
                        <td style="padding-left: 10px; text-align:right;" > <span> {{$nilai->surah->arab}}</span></td>
                        <td style="text-align: center"> <span>{{$nilai->totalNilai}}</span></td>
                        
                            @if($nilai->totalNilai>=85)
                            <td style="text-align: center"> <span>A</span></td>
                            @elseif($nilai->totalNilai>=70)
                            <td style="text-align: center"> <span>B</span></td>
                            @elseif($nilai->totalNilai>=60)
                            <td style="text-align: center"> <span>C</span></td>
                            @else
                            <td style="text-align: center"> <span>C</span></td>
                            @endif
                        
                    </tr>
                @endforeach --}}
            </table>
        </div>
        <div class=" full">
            <table width=50% id="tanggal">
                <tr>
                    <td>Diberikan di</td>
                    <td>:</td>
                    <td>Talang Belido</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td>{{$tanggal->isoFormat('D MMMM YYYY')}}</td>
                </tr>
            </table>
        </div>
    </div>

</body>
</html>