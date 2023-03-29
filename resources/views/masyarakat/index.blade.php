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
                <div class="card-header">
                    Simple Datatable
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>NAMA</th>
                                <th>USERNAME</th>
                                <th>EMAIL</th>
                                <th>TELEPON</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($masyarakats as $masyarakat)
                                <tr>
                                    <td>{{ $masyarakat->nik }}</td>
                                    <td>{{ $masyarakat->nama }}</td>
                                    <td>{{ $masyarakat->username }}</td>
                                    <td>{{ $masyarakat->email }}</td>
                                    <td>{{ $masyarakat->telp }}</td>
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
