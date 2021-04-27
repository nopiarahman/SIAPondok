@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Laporan Nilai Santri') {{-- mengisi yield title dengan 1 baris code--}}
{{-- @section('menuasatidzah','active') --}}
@section('menulaporan','active')
@section('container') {{-- mengisi yield container dengan lebih dari 1 baris code --}}
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="my-3 align-center">Laporan Nilai Santri</h3>
            @if (session('status'))
            <div class="alert alert-success">
                {{session ('status')}}
            </div>
            @elseif (session ('status2'))
            <div class="alert alert-warning">
                {{session ('status2')}}
            </div>
            @endif
        </div>
    </div>
</div>
</div>
<div class="card mt-2 p-4">
    <div class="row mx-3 mt-3">
        <div class="col-md-2">
            <p class="font-weight-bold"> Nama Santri </p>
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">: {{$santriwustha->namaLengkap}}<p>
        </div>
        <div class="col-md-2">
            <p class="font-weight-bold"> Semester </p>
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">: {{$periode->semester}}</p>
        </div>
    </div>
    <div class="row mx-3 ">
        <div class="col-md-2">
            <p class="font-weight-bold"> Kelas </p>
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">: {{$santriwustha->kelas->namaKelas}}<p>
        </div>
        <div class="col-md-2">
            <p class="font-weight-bold"> Tahun Ajaran </p>
        </div>
        <div class="col-md-4">
            <p class="font-weight-bold">: {{$periode->tahun}}</p>
        </div>
    </div>
    {{-- </div> --}}
    <div class="body table-responsive">
        <table class="table table-striped table-bordered align-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Mata Pelajaran</th>
                    <th scope="col">Nilai harian</th>
                    <th scope="col">Nilai UTS</th>
                    <th scope="col">Nilai UAS</th>
                    <th scope="col">Nilai Akhlak</th>
                    <th scope="col">Nilai Raport</th>
                    <th scope="col">KKM</th>
                    <th scope="col">Ketuntasan</th>
                    <th scope="col">Rata-rata Kelas</th>
                </tr>
            </thead>
            <tbody>
                @if($nilaiaktif!=null)
                <tr>
                    <th scope="col" colspan="10" class=" align-left px-3">
                        <h5>I. Nilai Diniyah </h5>
                    </th>
                </tr>
                @foreach ($nilaidiniyahsorted as $nilai)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$nilai->mapel->namaMapel}}</td>
                    <td>{{$nilai->harian}}</td>
                    <td>{{$nilai->uts}}</td>
                    <td>{{$nilai->uas}}</td>
                    <td>{{$nilai->akhlak}}</td>
                    {{-- <td>{{$nilai->rataRata}}</td> --}}

                    <td> {{round($nilai->rataRata)}}</td>
                    <td>{{$kkm=60}}</td>
                    <td>
                        @if($nilai->rataRata>=$kkm)
                        Tuntas
                        @else
                        Tidak Tuntas
                        @endif
                    </td>
                    <td>{{round($nilai->rataRataKelas)}}</td>
                </tr>
                @endforeach
                
                @if($nilaiBahasaSorted != null)
                <tr>
                    <th scope="col" colspan="10" class=" align-left px-3">
                        <h5>II. Nilai Bahasa</h5>
                    </th>
                    @foreach ($nilaiBahasaSorted as $nilai)
                </tr>
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$nilai->mapel->namaMapel}}</td>
                    <td>{{$nilai->harian}}</td>
                    <td>{{$nilai->uts}}</td>
                    <td>{{$nilai->uas}}</td>
                    <td>{{$nilai->akhlak}}</td>
                    <td> {{round($nilai->rataRata)}}</td>
                    <td>{{$kkm=60}}</td>
                    <td>
                        @if($nilai->rataRata>=$kkm)
                        Tuntas
                        @else
                        Tidak Tuntas
                        @endif
                    </td>
                    <td>{{round($nilai->rataRataKelas)}}</td>
                </tr>
                @endforeach
                @endif
                @if($nilaiumumsorted != null)
                <tr>
                    <th scope="col" colspan="10" class=" align-left px-3">
                        <h5>III. Nilai Umum</h5>
                    </th>
                    @foreach ($nilaiumumsorted as $nilai)
                </tr>
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$nilai->mapel->namaMapel}}</td>
                    <td>{{$nilai->harian}}</td>
                    <td>{{$nilai->uts}}</td>
                    <td>{{$nilai->uas}}</td>
                    <td>{{$nilai->akhlak}}</td>
                    <td> {{round($nilai->rataRata)}}</td>
                    <td>{{$kkm=60}}</td>
                    <td>
                        @if($nilai->rataRata>=$kkm)
                        Tuntas
                        @else
                        Tidak Tuntas
                        @endif
                    </td>
                    <td>{{round($nilai->rataRataKelas)}}</td>
                </tr>
                @endforeach
                @endif
                @if($nilaiMulokSorted != null)
                <tr>
                    <th scope="col" colspan="10" class=" align-left px-3">
                        <h5>III. Muatan Lokal</h5>
                    </th>
                    @foreach ($nilaiMulokSorted as $nilai)
                </tr>
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$nilai->mapel->namaMapel}}</td>
                    <td>{{$nilai->harian}}</td>
                    <td>{{$nilai->uts}}</td>
                    <td>{{$nilai->uas}}</td>
                    <td>{{$nilai->akhlak}}</td>
                    <td> {{round($nilai->rataRata)}}</td>
                    <td>{{$kkm=60}}</td>
                    <td>
                        @if($nilai->rataRata>=$kkm)
                        Tuntas
                        @else
                        Tidak Tuntas
                        @endif
                    </td>
                    <td>{{round($nilai->rataRataKelas)}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">
                        <p class="font-weight-bold align-right">Jumlah</p>
                    </td>
                    <td>
                        <p class="font-weight-bold align-center">{{round($nilaiaktif->sum('rataRata'))}}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <p class="font-weight-bold align-right">Rata-rata</p>
                    </td>
                    <td>
                        <p class="font-weight-bold align-center">{{round($nilaiaktif->avg('rataRata'),2)}}</p>
                    </td>
                </tr>
            </tfoot>
            @else
            <td colspan="10">Tidak ada nilai</td>
            @endif
        </table>
    </div>
</div>
</div>
</div>
</div>
@endsection
