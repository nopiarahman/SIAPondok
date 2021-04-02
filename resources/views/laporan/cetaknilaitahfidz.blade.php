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
        font-size: 14pt;
        font-weight: bold;
    }
    .tebal{
        font-weight: bold;
    }
    .full{
        width: 95%;
    }
    #nilai{
        border: 2px solid black;

    }
    #nilai td{
        border: 1px solid black;
        border-collapse: collapse;
        padding-top: 10px;
    }
    #nilai th {
        border: 2px solid black;
    }
    .bawah{
        float: right;
    }

</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col text-center mt-4 ">
                <h3 class="tebal" >LAPORAN HASIL EVALUASI</h3>
                <h3 class="tebal">TAHFIDZ QUR'AN</h3>
            </div>
        </div>
        <div class="mt-3 judul">
            <table class="full">
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
        <div class="kolomTunggal mt-3">
            <table id="nilai" class="full">
                <tr class="tebal">
                    <th rowspan="2" style="text-align: center"> <h5 class="tebal"> No. </h5></th>
                    <th rowspan="2" style="text-align: center" width="40%"><h5 class="tebal">Surah</h5></th>
                    <th colspan="2" style="text-align: center"> <h5 class="tebal">Nilai</h5></th>
                </tr>
                <tr>
                    <th style="text-align: center"><h5 class="tebal">Angka</h5></th>
                    <th style="text-align: center"><h5 class="tebal">Huruf</h5></th>
                </tr>
                @foreach ($nilaitahfidz as $nilai)
                <tr>
                        <td scope="row" style="text-align: center"> <h5> {{$loop->iteration}} </h5></td>
                        <td style="padding-left: 10px"> <h5> {{$nilai->surah->namaSurah}}</h5></td>
                        <td style="text-align: center"> <h5>{{$nilai->totalNilai}}</h5></td>
                        {{-- <td> --}}
                            @if($nilai->totalNilai>=85)
                            <td style="text-align: center"> <h5>A</h5></td>
                            @elseif($nilai->totalNilai>=70)
                            <td style="text-align: center"> <h5>B</h5></td>
                            @elseif($nilai->totalNilai>=60)
                            <td style="text-align: center"> <h5>C</h5></td>
                            @else
                            <td style="text-align: center"> <h5>C</h5></td>
                            @endif
                        {{-- </td> --}}
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="bawah pt-5 mt-5">
            <table width=50%>
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