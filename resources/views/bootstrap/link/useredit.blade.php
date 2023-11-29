@extends('bootstrap.index')
@section('pageTitle', 'Tambah Status')
@section('content')
<form class="user" method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf
    @method('PUT')
    <!-- Data -->
    <div class="mb-3">
        <table>
            <tr>
                <td><strong>Nik</strong></td>
                <td>: {{ $user->nik }}</td>
            </tr>
            <tr>
                <td><strong>Nama</strong></td>
                <td>: {{ $user->name }}</td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td>: {{ $user->email }}</td>
            </tr>
            <tr>
                <td><strong>No Hp</strong></td>
                <td>: {{ $user->no_hp }}</td>
            </tr>
        </table>
    </div>


    <div class="row mb-3">
        <label>Jenis</label>
        <select id="inputState" class="form-select" name="role">
            <option value="">Berikan Status</option>
            <option value="admin" @if($user->hasRole('admin')) selected @endif>Admin</option>
            <option value="manajer" @if($user->hasRole('manajer')) selected @endif>Manajer</option>
            <option value="kasir" @if($user->hasRole('kasir')) selected @endif>Kasir</option>
        </select>
    </div>


    <div class="d-flex justify-content-end mt-4">
        <button type="submit" class="btn btn-primary ml-4">{{ __('Simpan') }}</button>
    </div>
</form>

@endsection
