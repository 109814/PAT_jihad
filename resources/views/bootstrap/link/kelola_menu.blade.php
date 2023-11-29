@extends('bootstrap.index')
@section('pageTitle', 'kelola menu')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">Menu</th>
        <th scope="col">Harga</th>
        <th scope="col">Jenis</th>
        <th scope="col">Pegawai</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($menu as $item)
        <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->harga }}</td>
                <td>{{ $item->jenis }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    {{--  {{ route('editMenu',$item->id_menu) }}  --}}
                <a href="{{ route('editMenu',$item->id_menu) }}" class="btn btn-success btn-circle">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="{{ route('destroyMenu', $item->id_menu) }}" method="post" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-circle" onclick="return confirm('Yakin Hapus?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>


                </td>
            </tr>
            @endforeach

    </tbody>
  </table>
  @endsection
