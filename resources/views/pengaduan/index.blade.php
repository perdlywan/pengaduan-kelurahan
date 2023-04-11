@extends('layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/simple-datatables.css') }}">
@endsection

@section('content')
<div class="page-heading">
    <h3>{{ $title }}</h3>
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
                    <a href="/masyarakat/add" class="btn btn-primary"><i class="bi bi-plus"></i>Add</a>
                    <thead>
                        <tr class="text-primary">
                            <th>Dari</th>
                            <th>Tanggal</th>
                            <th>Pesan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Tanggapan</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John Doe</td>
                            <td>2021-01-01</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</td>
                            <td><img src="{{ asset('images/logo/logo.png') }}" alt="" width="100"></td>
                            <td><span class="badge bg-success">Selesai</span></td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</td>
                            <td><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i></td>
                            <td>
                                <a href="" class="btn icon btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                <form action="" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button href="#" class="btn icon btn-danger btn-sm"><i class="bi bi-x"
                                            onclick="return confirm('Are you sure you want to delete this item?');"></i></button>
                                </form>
                            </td>
                        </tr>
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