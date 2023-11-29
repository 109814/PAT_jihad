@extends('bootstrap.index')
@section('pageTitle', 'Tambah Menu')
@section('content')
<form class="user" method="POST" action="{{ route('tambah_menu') }}">
    @csrf
    {{--  @method('POST')  --}}
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Menu</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputText" name="nama">
      </div>
    </div>
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Harga</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail" name="harga">
      </div>
    </div>
    <div class="row mb-3">
        <label>Jenis</label>
        <select id="inputState" class="form-select" name="jenis">
            <option value="">Pilih Jenis Makanan</option>
            <option value="makanan">makanan</option>
            <option value="minuman">minuman</option>
          </select>
    </div>
    <div class="text-left">
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
  </form>

@endsection
