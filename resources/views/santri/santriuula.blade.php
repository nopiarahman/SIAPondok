@extends('layout/tema') {{-- menambah dari folder layout halaman main --}}
@section('title','Data Santri Salafiyah Uula') {{-- mengisi yield title dengan 1 baris code--}}
@section ('menusantri','active')
@section ('menuuula','active')
@section('container')        {{-- mengisi yield container dengan lebih dari 1 baris code --}}
    <div class="container">
      <div class="row">
        <div class="col-10">
          <h2 class="mt-3">Data Santri Marhalah Salafiyah Uula</h2>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Nama Panggilan</th>
                <th scope="col">Jenis Kelamin</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($santriuula as $su)
              <tr>
              <th scope="row">{{$loop->iteration}}</th> {{-- variabel loop disediakan oleh laravel dari templating blade, mengulang sesuai iterasi --}}
                <td>{{$su->namaLengkap}}</td>
                <td>{{$su->namaPanggilan}}</td>
                <td>{{$su->jk}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection
