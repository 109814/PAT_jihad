@extends('bootstrap.index')
@section('pageTitle', 'Log Aktivitas')
@section('content')
<h1>Masih gagal untuk menampilkan aktivitas</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID Aktivitas</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Keterangan</th>
        <th scope="col">Pegawai</th>
      </tr>
    </thead>
    <tbody>
        @foreach($log_aktivitas as $aktivitas)
            <tr>
                <td>{{ $aktivitas->id }}</td>
                <td>{{ $aktivitas->tanggal }}</td>
                <td>{{ $aktivitas->keterangan }}</td>
                <td>{{ $aktivitas->pegawai->name }}</td>
            </tr>
        @endforeach


    </tbody>
  </table>
  @endsection
