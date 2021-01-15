<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    {{-- <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1256"> or
        <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-6">
        <META HTTP-EQUIV="Content-language" CONTENT="ar"> --}}
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

    {{-- <link href="{{asset('tema/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> --}}
    <title>Cetak Nilai {{$santriwustha->namaLengkap}}</title>
    <style>
        @page {
            size: 21cm 29.7cm;
            /* margin: 0px; */
            padding: 20px;
        }
        body {
            /* margin: 0px; */
            width: fit-content;
            height: fit-content;
        }
        h2{
            font-size: 15pt;
        }
        h5{
            text-align: left;
            margin: 2pt 5pt;
            font-size: 12pt;
        }
        p {
            font-size: 11pt;
            margin: 1px 3pt;
        }
        table, th, td {
        border: 1px solid black;
        }
        table{
            width: 100%;
            border-collapse: collapse;
        }
        th{
            height: 15pt;
        }
        
    </style>
</head>
<body>
    <div >
        <div >
            <div class="col-md-12 my-2 mb-3">
                <h2 style="text-align: center">LAPORAN HASIL EVALUASI</h2>
                <H2 style="text-align: center">UJIAN AKHIR SEMESTER (UAS)</H2>
            </div>            
        </div>
        {{-- <div class="row">
            <div class="col-md-2"><p class="font-weight-bold"> Nama Santri </p></div>
            <div class="col-md-4"><p class="font-weight-bold">: {{$santriwustha->namaLengkap}}<p></div>
            <div class="col-md-2"><p class="font-weight-bold"> Semester </p></div>
            <div class="col-md-4"><p class="font-weight-bold">: {{$periode->semester}}</p></div>
        </div>
        <div class="row">
            <div class="col-md-2"><p class="font-weight-bold"> NIS/NISN </p></div>
            <div class="col-md-4"><p class="font-weight-bold">: 15023452345/- </p></div>
            <div class="col-md-2"><p class="font-weight-bold"> Kelas </p></div>
            <div class="col-md-4"><p class="font-weight-bold">: {{$santriwustha->kelas->namaKelas}}<p></div>
        </div>      
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-2"><p class="font-weight-bold"> Tahun Ajaran </p></div>
            <div class="col-md-4"><p class="font-weight-bold">: {{$periode->tahun}}</p></div>
        </div> --}}
        <div class="body table-responsive">
            <table class="table table-bordered align-center" >
              <thead>
                <tr>
                  <th scope="col" colspan="2" style="text-align: center" >Mata Pelajaran</th>
                  <th scope="col" style="text-align: center">Nilai</th>
                  <th scope="col" style="text-align: center">KKM</th>
                  <th scope="col" style="text-align: center">Ketuntasan</th>
                  <th scope="col" style="text-align: center">Rata-rata Kelas</th>
                </tr>
              </thead>
              <tbody>
                <tbody>
                    @if($nilaiaktif!=null)
                    <tr>
                    <th scope="col" colspan="6" class=" align-left px-3"><h5>I. Nilai Diniyah </h5></th>
                    @foreach ($nilaidiniyahsorted as $nilai)
                    </tr>
                    <tr>
                    <td style="text-align: center; width:5%"> <p>{{$loop->iteration}}</p></td>
                      <td><p>{{$nilai->mapel->namaMapel}}</p></td>
                      {{-- <td>{{$nilai->harian}}</td>
                      <td>{{$nilai->uts}}</td>
                      <td>{{$nilai->uas}}</td>
                      <td>{{$nilai->akhlak}}</td> --}}
                      <td style="text-align: center"> <p>{{$nilai->rataRata}}</p></td>
                      <td style="text-align: center"><p>{{$kkm=65}}</p></td>
                      <td style="text-align: center">
                        @if($nilai->rataRata>=$kkm)
                         <p> Tuntas</p>
                        @else
                         <p> Tidak Tuntas</p>
                        @endif
                      </td>
                      <td style="text-align: center"><p>{{$nilai->rataRataKelas}}</p></td>
                    </tr>
                  @endforeach
                  @if($nilaiumumsorted != null)
                  <tr>
                  <th scope="col" colspan="6" class=" align-left px-3"><h5>II. Nilai Umum</h5></th>
                    @foreach ($nilaiumumsorted as $nilai)
                  </tr>
                  <tr>
                    <td scope="row" style="text-align: center; width:5%"><p>{{$loop->iteration}}</p></td>
                      <td > <p> {{$nilai->mapel->namaMapel}}</p></td>
                      {{-- <td>{{$nilai->harian}}</td>
                      <td>{{$nilai->uts}}</td>
                      <td>{{$nilai->uas}}</td>
                      <td>{{$nilai->akhlak}}</td> --}}
                      <td style="text-align: center"> <p>{{$nilai->rataRata}}</p></td>
                      <td style="text-align: center"><p>{{$kkm=65}}</p></td>
                      <td style="text-align: center">
                        @if($nilai->rataRata>=$kkm)
                        <p> Tuntas </p>
                        @else
                        <p> Tidak Tuntas </p>
                        @endif
                      </td>
                      <td style="text-align: center"><p>{{$nilai->rataRataKelas}}</p></td>
                    </tr>
                  @endforeach
                  @endif
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2" style="text-align: center"><p class="font-weight-bold align-right">Jumlah</p></td>
                  <td style="text-align: center"><p class="font-weight-bold align-center">{{$nilaiaktif->sum('rataRata')}}</p></td>
                  <td colspan="3" class="text-center font-weight-bold"> <p dir="rtl" lang="ar" style="font-size: 30px;" > التفســـــير	</p></td>
                </tr>
                <tr >
                    <td colspan="2" style="text-align: center"><p class="font-weight-bold align-right">Rata-rata</p></td>
                    <td style="text-align: center"><p class="font-weight-bold align-center">{{round($nilaiaktif->avg('rataRata'),2)}}</p></td>
                    <td colspan="3" class="text-center font-weight-bold">Terbilang</td>
                  </tr>
                </tfoot>
                @else
                      <td colspan="10" style="text-align: center">Tidak ada nilai</td>
                @endif
            </table>
            <table class="table table-bordered align-center">
                <tr style="text-align: center">
                    <td rowspan="3" style="width: 40%; margin:auto"  > <h4 class="mt-5"> KETIDAKHADIRAN </h4></td>
                    <td style="width: 30%"> Sakit (S) </td>
                    <td style="width: 5%"> : </td>
                    <td>  </td>
                </tr>
                <tr style="text-align: center">
                    <td>Izin (S) </td>
                    <td> : </td>
                    <td>  </td>
                </tr>
                <tr style="text-align: center">
                    <td>Alpha (S) </td>
                    <td> : </td>
                    <td>  </td>
                </tr>

            </table>
            <table class="table table-bordered align-center">
                <tr style="text-align: center">
                    <td> <h4> CATATAN UNTUK DIPERHATIKAN ORANG TUA/WALI </h4></td>
                </tr>
                <tr style="text-align: center" style="height: 100px">
                    <td></td>
                </tr>
            </table>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <h5 style="text-decoration: underline" >KEPUTUSAN:</h5>
            <p>Dengan memperhatikan hasil yang dicapai	
                pada Semester I s/d II, maka Ananda ditetapkan 
                Naik / Tidak Naik ke Kelas: 
                </p>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5"><p>Diberikan di</p></div>
                <div class="col-md-1"><p>:</p></div>
                <div class="col-md-6"><p>Jambi </p></div>
            </div>
            <div class="row">
                <div class="col-md-5"><p>Tanggal</p></div>
                <div class="col-md-1"><p>:</p></div>
                <div class="col-md-6"><p> {{$waktu->isoFormat('D MMMM YYYY')}}</p></div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4 text-center">
            <p>Mengetahui</p>
            <h5 class="mt-n3">Orang Tua/Wali</h5>
        </div>
        <div class="col-md-4 text-center">
            <h5>Wali Kelas</h5>
        </div>
        <div class="col-md-4 text-center">
            <h5>Kepala Sekolah</h5>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-4 text-center">
            <p>____________________________</p>
        </div>
        <div class="col-md-4 text-center">
            <h5>{{$santriwustha->kelas->waliKelas}}</h5>
        </div>
        <div class="col-md-4 text-center">
            <h5>Hery Wandrizal, S.SHi</h5>
        </div>
    </div>
</body>
</html>