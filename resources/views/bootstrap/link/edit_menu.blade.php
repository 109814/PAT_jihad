@extends('bootstrap.index')
@section('pageTitle', 'Tambah Menu')
@section('content')
<form class="user" method="POST" action="{{ route('updateMenu', $menu->id_menu) }}">
    @csrf
    {{--  @method('PUT')  --}}
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Nama Menu</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputText" name="nama" value="{{ old('nama', $menu->nama) }}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputEmail" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail" name="harga" value="{{ old('harga', $menu->harga) }}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputState" class="col-sm-2 col-form-label">Jenis</label>
        <div class="col-sm-10">
            <select id="inputState" class="form-select" name="jenis">
                <option value="">Pilih Jenis Makanan</option>
                <option value="makanan" {{ old('jenis', $menu->jenis) == 'makanan' ? 'selected' : '' }}>Makanan</option>
                <option value="minuman" {{ old('jenis', $menu->jenis) == 'minuman' ? 'selected' : '' }}>Minuman</option>
            </select>
        </div>
    </div>
    <div class="text-left">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
</form>
@endsection
