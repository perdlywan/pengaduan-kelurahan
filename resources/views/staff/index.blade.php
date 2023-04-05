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
                        <a href="/staff/add" class="btn btn-primary"><i class="bi bi-plus"></i>Add</a>
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>NAMA</th>
                                <th>USERNAME</th>
                                <th>EMAIL</th>
                                <th>TELEPON</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $staff)
                                <tr>
                                    <td>{{ $staff->nik }}</td>
                                    <td>{{ $staff->nama }}</td>
                                    <td>{{ $staff->username }}</td>
                                    <td>{{ $staff->email }}</td>
                                    <td>{{ $staff->telp }}</td>
                                    <td>
                                        <a href="/staff/{{ $staff->username }}/edit"
                                            class="btn icon btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                        <form action="/staff/{{ $staff->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button href="#" class="btn icon btn-danger btn-sm"><i
                                                    class="bi bi-x" onclick="return confirm('Are you sure you want to delete this item?');"></i></button>
                                        </form>
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
