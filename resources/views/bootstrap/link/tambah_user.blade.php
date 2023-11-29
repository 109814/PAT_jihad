@extends('bootstrap.index')
@section('pageTitle', 'Tambah Pengguna')
@section('content')
<form class="user" method="POST" action="{{ route('tambah_user') }}">
    @csrf

    <!-- Nik -->
    <div class="mb-3">
        <label for="nik" class="form-label">{{ __('Nik') }}</label>
        <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}" required autofocus autocomplete="nik">
        @error('nik')
        <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label">{{ __('Name') }}</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
        @error('name')
        <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <!-- Email Address -->
    <div class="mb-3">
        <label for="email" class="form-label">{{ __('Email') }}</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="username">
        @error('email')
        <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label">{{ __('Password') }}</label>
        <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
        @error('password')
        <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <!-- Confirm Password -->
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
        @error('password_confirmation')
        <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <!-- Nomer HP -->
    <div class="mb-3">
        <label for="no_hp" class="form-label">{{ __('No. HP') }}</label>
        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required autofocus autocomplete="no_hp">
        @error('no_hp')
        <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex justify-content-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <button type="submit" class="btn btn-primary ml-4">{{ __('Register') }}</button>
    </div>
</form>

@endsection
