@extends('layout/tema')
@section('title','SIA AlQosim Jambi')
@section ('menuindex','active')
@section('container')
<div class="container">
    <div class="row">
        <div class="col-12 align-center">
            <h4 class="mt-3">Assalamu'alaikum {{$cekuser->name}} </h4>
        </div>
    </div>
    <div class="card mt-2 p-4">
        @if(auth()->user()->role=='waliSantri')
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
        </div>
        @elseif(auth()->user()->role=='admin')
        <div class="row align-center">
            <div class="col-md-4 mt-1">
                {{-- <div class="row"> --}}
                <a href="{{url('/santriwustha')}}">
                    <button type="button" class="btn btn-block py-3 {{jenjang()."button"}}">
                        <div class="col-md-2 ">
                            <i class="material-icons" style="font-size:40px;">people</i>
                        </div>
                        <div class="col-md-6 py-2 align-middle pl-4">
                            <h6 class="text-center">Jumlah Santri </h6>
                        </div>
                        <div class="col-md-4">
                            <span class="badge badge-light">
                                <h6 class="px-2 pt-2">{{$santriwustha->count()}}</h6>
                            </span>
                        </div>
                    </button>
                </a>
                {{-- </div> --}}
            </div>
            <div class="col-md-4 mt-1">
                {{-- <div class="row"> --}}
                <a href="{{url('/asatidzah')}}">
                    <button type="button" class="btn {{jenjang()."button"}} btn-block py-3">
                        <div class="col-md-2 ">
                            <i class="material-icons" style="font-size:40px;">person</i>
                        </div>
                        <div class="col-md-6 py-2 align-middle pl-4">
                            <h6 class="text-center">Jumlah Asatidzah </h6>
                        </div>
                        <div class="col-md-4">
                            <span class="badge badge-light">
                                <h6 class="px-2 pt-2">{{$asatidzah->count()}}</h6>
                            </span>
                        </div>
                    </button>
                </a>
                {{-- </div> --}}
            </div>
            <div class="col-md-4 mt-1">
                {{-- <div class="row"> --}}
                <a href="{{url('/mapel')}}">
                    <button type="button" class="btn {{jenjang()."button"}} btn-block py-3">
                        <div class="col-md-2 ">
                            <i class="material-icons" style="font-size:40px;">book</i>
                        </div>
                        <div class="col-md-6 py-2 align-middle pl-4">
                            <h6 class="text-center">Jumlah Mapel </h6>
                        </div>
                        <div class="col-md-4">
                            <span class="badge badge-light">
                                <h6 class="px-2 pt-2">{{$mapel->count()}}</h6>
                            </span>
                        </div>
                    </button>
                </a>
                {{-- </div> --}}
            </div>
        </div>
        <div class="body">
            <div class="row justify-content-center">
                <div class="col-md-8 ">
                    <h5 class="m-3 align-center">Data Santri didalam Kelas</h5>
                    <canvas id="bar_chart" height="150"></canvas>
                </div>
            </div>
        </div>
        @elseif(auth()->user()->role=='asatidzah')
        <div class="row align-center">
            <div class="col mt-1">
                {{-- <div class="row"> --}}
                <a href="{{url('/jadwalbelajar')}}">
                    <button type="button" class="btn btn-success py-3 align-center">
                        <div class="col-md-2 ">
                            <i class="material-icons" style="font-size:40px;">book</i>
                        </div>
                        <div class="col-md-6 py-2 align-middle pl-4">
                            <h6 class="text-center">Mapel diampu </h6>
                        </div>
                        <div class="col-md-4">
                            <span class="badge badge-light">
                                <h6 class="px-2 pt-2">{{$cekjadwal->count()}}</h6>
                            </span>
                        </div>
                    </button>
                </a>
            </div>
            @if(cekwaliKelas() != null)
            <div class="col mt-1">
                    <button type="button" class="btn btn-success py-3 align-center">
                        <div class="col-md-2 ">
                            <i class="material-icons" style="font-size:40px;">domain</i>
                        </div>
                        <div class="col-md-6 py-2 align-middle pl-4">
                            <h6 class="text-center"> Anda Wali Kelas di Kelas {{cekwaliKelas()->kelas->namaKelas}} </h6>
                        </div>
                    </button>
                {{-- </a> --}}
            </div>
            @endif
            @if(cekGuruTahfidz() != null)
            <div class="col mt-1">
                    <button type="button" class="btn btn-success py-3 align-center">
                        <div class="col-md-2 ">
                            <i class="material-icons" style="font-size:40px;">domain</i>
                        </div>
                        <div class="col-md-6 py-2 align-middle pl-3">
                            <h6 class="text-center">Pengampu Tahfidz Kelas {{cekGuruTahfidz()->kelasTahfidz->namaKelas}} </h6>
                        </div>
                    </button>
                {{-- </a> --}}
            </div>
            @endif
        </div>
    </div>
    <div class="card mt-1 p-4">
        <div class="row">
            <div class="col align-center">
                <h5 class="">Jadwal mengajar hari ini</h5>
            </div>
        </div>
        <div class="row">
            <div class="col align-left">
                @if($jadwalHariIni->isNotEmpty())
                @foreach($jadwalHariIni as $jadwal)
                <div class="card mt-2 pt-2 bg-light-green">
                    <div class="row mx-3 ">
                        <div class="col-md-2">
                            <p class="font-weight-bold"> Kelas </p>
                        </div>
                        <div class="col-md-4">
                            <p class="font-weight-bold">: {{$jadwal->kelas->namaKelas}}<p>
                        </div>
                        <div class="col-md-2">
                            <p class="font-weight-bold"> Jam Mulai </p>
                        </div>
                        <div class="col-md-4">
                            <p class="font-weight-bold">: {{$jadwal->jamMulai}}<p>
                        </div>
                    </div>
                    <div class="row mx-3 ">
                        <div class="col-md-2">
                            <p class="font-weight-bold"> Mata Pelajaran </p>
                        </div>
                        <div class="col-md-4">
                            <p class="font-weight-bold">: {{$jadwal->mapel->namaMapel}}</p>
                        </div>
                        <div class="col-md-2">
                            <p class="font-weight-bold"> Jam Selesai </p>
                        </div>
                        <div class="col-md-4">
                            <p class="font-weight-bold">: {{$jadwal->jamSelesai}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col align-center">
                    <h6 class="text-success mt-3">Tidak Ada Jadwal Hari Ini</h6>
                </div>
                @endif
            </div>
        </div>
    </div>
        @elseif(auth()->user()->role=='kepalaYayasan')
        <div class="conten">

            <div class="row">
                <div class="col-md-6">
                    <h5 class="m-3 align-center">Grafik Jumlah Santri</h5>
                    <div style="height: 400px">
                        {!! $chartJenjang->container() !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="m-3 align-center">Grafik Jumlah Asatidzah</h5>
                    <div style="height: 400px">
                        {!! $chartGuru->container() !!}
                    </div>
                </div>
            </div>
        </div>
            
        @endif

    </div>
    
                                                                

    @endsection
    {{-- Menambah Script untuk ChartJenjang - Laravel chart --}}
    @section('footer')
    @if(auth()->user()->role=='kepalaYayasan')    
    {!! $chartJenjang->script() !!} 
    {!! $chartGuru->script() !!} 
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    @if(auth()->user()->role=='admin')
    <script type="text/javascript">
        $(document).ready(function () {
            $(function () {
                new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
            });
            
            function getChartJs(type) {
                var config = null;
                if (type === 'bar') {
                    config = {
                        type: 'bar',
                        data: {
                            labels: {!!json_encode($namaKelas) !!},
                            // labels: ["January", "February", "March", "April"],
                            datasets: [{
                                label: "Jumlah Santri",
                                data: {!!json_encode($data) !!},
                                // data:[30,20,10,50],
                                backgroundColor: "green"
                            }]
                        },
                        options: {
                            responsive: true,
                            legend: false
                        }
                    }
                }
                return config;
            }
        });
        
        </script>
        @endif
    @endsection
