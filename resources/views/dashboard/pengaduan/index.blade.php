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
                    @foreach (Breadcrumbs::generate('pengaduan') as $breadcrumb)
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
    <section class="section">
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i>
                    {{ session('success') }}
                </div>
                @endif
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr class="text-primary">
                            <th>Tanggal</th>
                            <th>Dari</th>
                            <th>Pesan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Tanggapan</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduan as $item)
                        <tr>
                            <td>{{ $item->created_at->format('Y-m-d') }}</td>
                            <td><a href="">{{ $item->user->username }}</a></td>
                            <td>{{ $item->pesan }}</td>
                            <td><img src="{{ asset('images/pengaduan/' . $item->foto) }}" alt="" width="100"></td>
                            <td><span class="badge {{ ($item->status == 'proses') ? 'bg-primary' : 'bg-success' }}"
                                    style="font-weight: 400;">{{
                                    $item->status }}</span></td>
                            <td>{{ $item->tanggapan }}</td>
                            <td>{{ $item->rating }}</td>
                            <td>
                                @if ($item->status == 'proses')
                                <a href="/pengaduan/{{ $item->id }}/edit" class="btn icon btn-warning btn-sm"><i
                                        class="bi bi-pencil"></i></a>
                                <form action="" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button href="#" class="btn icon btn-danger btn-sm"><i class="bi bi-x"
                                            onclick="return confirm('Are you sure you want to delete this item?');"></i></button>
                                </form>
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script src="{{ asset('js/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('js/pages/simple-datatables.js') }}"></script>
@endsection