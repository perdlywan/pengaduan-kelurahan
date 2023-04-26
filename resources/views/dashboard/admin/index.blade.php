@extends('layouts.dashboard')

@section('styles')
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/sp-2.1.2/datatables.min.css" rel="stylesheet" />
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
                    @foreach (Breadcrumbs::generate('admin') as $breadcrumb)
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
                    <a href="/admin/add" class="btn btn-primary"><i class="bi bi-plus"></i>Add</a>
                    <thead>
                        <tr class="text-primary">
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                        <tr>
                            <td>{{ $admin->nik }}</td>
                            <td>{{ $admin->nama }}</td>
                            <td>{{ $admin->username }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->telp }}</td>
                            <td>
                                <a href="/admin/{{ $admin->username }}/edit" class="btn icon btn-warning btn-sm"><i
                                        class="bi bi-pencil"></i></a>
                                <form action="/admin/{{ $admin->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button href="#" class="btn icon btn-danger btn-sm"><i class="bi bi-x"
                                            onclick="return confirm('Are you sure you want to delete this item?');"></i></button>
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
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/sp-2.1.2/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table1').DataTable({
            responsive: true,
        });
    });
</script>
@endsection