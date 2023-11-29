@extends('bootstrap.index')
@section('pageTitle', 'Kelola Pengguna')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nik</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">No HP</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($kelolauser as $item)
        <tr>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>
                    @if ($item->firstRole())
                        {{ $item->firstRole()->name }}
                    @else
                        Belum memiliki peran
                    @endif
                </td>
                <td>
                <a href="{{ route('users.edit', ['id' => $item->id]) }}" class="btn btn-success btn-circle">
                        <i class="bi bi-pencil-square"></i>
                    </a>

                    <a href="" class="btn btn-danger btn-circle">
                    <i class="bi bi-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach

    </tbody>
  </table>
  @endsection
