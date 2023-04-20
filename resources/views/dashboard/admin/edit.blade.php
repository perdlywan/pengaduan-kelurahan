@extends('layouts.dashboard')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/simple-datatables.css') }}">
@endsection

@section('content')
<div class="page-heading">
    <h3>{{ $title }}</h3>
</div>
<div class="page-content">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="/admin/{{ $admin->id }}" method="POST">
                                <div class="row">
                                    @method('put')
                                    @csrf
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="number" id="nik"
                                                class="form-control @error('nik') is-invalid @enderror"
                                                placeholder="NIK" name="nik" value="{{ old('nik', $admin->nik) }}">
                                            @error('nik')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama">NAMA</label>
                                            <input type="text" id="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                placeholder="NAMA" name="nama" value="{{ old('nama', $admin->nama) }}">
                                            @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="username">USERNAME</label>
                                            <input type="text" id="username"
                                                class="form-control @error('username') is-invalid @enderror"
                                                placeholder="USERNAME" name="username"
                                                value="{{ old('username', $admin->username) }}">
                                            @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email">EMAIL</label>
                                            <input type="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                placeholder="EMAIL" value="{{ old('email', $admin->email) }}">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="telp">TELEPON</label>
                                            <input type="number" id="telp"
                                                class="form-control @error('telp') is-invalid @enderror" name="telp"
                                                placeholder="TELEPON" value="{{ old('telp', $admin->telp) }}">
                                            @error('telp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="password">PASSWORD <span class="text-sm text-danger">* Kosongkan
                                                    jika tidak mengubah password</span></label>
                                            <input type="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" placeholder="PASSWORD">
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script src="{{ asset('js/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('js/pages/simple-datatables.js') }}"></script>
@endsection