@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Laporan Nilai Santri') {{-- mengisi yield title dengan 1 baris code--}}
{{-- @section('menuasatidzah','active') --}}
@section('menulaporan','active')
@section('menuwali','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
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
    <div class="card mt-2 ">
      <div class="body table-responsive">
        <table class="table table-hover align-center ">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Kelas</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kelas as $ks)
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
              <td>{{$ks->namaKelas}}</td>
                <td>
                <a href="/laporan/{{$ks->id}}" type="button" class="btn btn-success " style="border-radius: 5px ;  font-size:12px">
                  Lihat Kelas
                </a>
            
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$kelas->links()}}
    </div>
  </div>
</div>
</div>
</div>
  
                  
                  

   
@endsection
