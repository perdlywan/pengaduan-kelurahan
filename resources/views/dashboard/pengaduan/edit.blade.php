@extends('layouts.dashboard')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/simple-datatables.css') }}">
@endsection

@section('content')
<div class="page-heading">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>{{ $title }}</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    @foreach (Breadcrumbs::generate('pengaduan.edit', $pengaduan->id) as $breadcrumb)
                    @if (!is_null($breadcrumb->url) && !$loop->last)
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                    @else
                    <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                    @endif
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="page-content">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Data Masyarakat</h4>
                            <p class="card-text">Data masyarakat yang mengajukan pengaduan.</p>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="number" id="nik" class="form-control" placeholder="NIK" name="nik"
                                            value="{{ $pengaduan->user->nik }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="nama">NAMA</label>
                                        <input type="text" id="nama" class="form-control" placeholder="NAMA" name="nama"
                                            value="{{ $pengaduan->user->nama }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="username">USERNAME</label>
                                        <input type="text" id="username" class="form-control" placeholder="USERNAME"
                                            name="username" value="{{ $pengaduan->user->username }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email">EMAIL</label>
                                        <input type="email" id="email" class="form-control" name="email"
                                            placeholder="EMAIL" value="{{ $pengaduan->user->email }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="telp">TELEPON</label>
                                        <input type="number" id="telp" class="form-control" name="telp"
                                            placeholder="TELEPON" value="{{ $pengaduan->user->telp }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Data Pengaduan</h4>
                            <p class="card-text">Data pengaduan masyarakat yang diajukan.</p>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Pesan</label>
                                        <textarea class="form-control @error('pesan') is-invalid @enderror" name="pesan"
                                            id="pesan" cols="30" rows="5" disabled>{{ $pengaduan->pesan }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Foto</label>
                                        <div class="form-control rounded py-2 text-center"
                                            style="background: #E9ECEF; border: 1px solid #dce7f1;">
                                            <img src="{{ asset('images/pengaduan/' . $pengaduan->foto) }}" alt="foto"
                                                height="75" class="rounded">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Tanggapan</h4>
                            <p class="card-text">Berikan tanggapan Anda terkait pengaduan masyarakat yang diajukan.</p>
                            <form class="form" action="/pengaduan/{{ $pengaduan->id }}" method="POST">
                                <div class="row">
                                    @method('put')
                                    @csrf
                                    <input name="modified_by" value="{{ Auth::user()->id }}" hidden>
                                    <input name="status" value="selesai" hidden>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Tanggapan</label>
                                            <textarea class="form-control @error('tanggapan') is-invalid @enderror"
                                                name="tanggapan" id="tanggapan" cols="30" rows="5"></textarea>
                                            @error('tanggapan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
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