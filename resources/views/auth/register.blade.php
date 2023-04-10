@extends('layouts.auth')
@section('title', 'Regsiter - Pengaduan Masyarakat Kelurahan Kabayan')
@section('content')
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="index.html"><img src={{ asset('/images/logo/logo.png') }} alt="Logo" height="100"></a>
            </div>
            <h1 class="auth-title">Sign Up</h1>
            <p class="auth-subtitle mb-5">Lengkapi datamu untuk melakukan pendaftaran.</p>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="number" class="form-control form-control-md @error('nik') is-invalid @enderror"
                        placeholder="NIK" name="nik" value="{{ old('nik') }}" required>
                    @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-md @error('nama') is-invalid @enderror"
                        placeholder="Nama" name="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-md @error('username') is-invalid @enderror"
                        placeholder="Username" name="username" value="{{ old('username') }}" required>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" class="form-control form-control-md @error('email') is-invalid @enderror"
                        placeholder="Email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-md @error('password') is-invalid @enderror"
                        placeholder="Password" name="password" required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="number" class="form-control form-control-md @error('telp') is-invalid @enderror"
                        placeholder="Telepon" name="telp" value="{{ old('telp') }}" required>
                    @error('telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="btn btn-primary btn-block btn-md shadow-lg mt-5">Sign Up</button>
            </form>
            <div class="text-center mt-5">
                <p class='text-gray-600'>Sudah mempunyai akun? <a href="{{ route('login') }}" class="font-bold">Log
                        in</a></p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>
@endsection