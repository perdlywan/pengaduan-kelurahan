@extends('layouts.master')

@section('content')
<div class="page-heading">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>{{ $title }}</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    @foreach (Breadcrumbs::generate('users.admin') as $breadcrumb)

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
            <div class="card-header d-flex justify-content-between">
                <span>Daftar Laporan Pengaduan</span>
                {{-- btn --}}
                <div class="card-header-action">
                    <a href="{{ route('pengaduan.create') }}" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i>
                        Buat Laporan Pengaduan</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table w-100" id="table">
                    <thead>
                        <tr>
                            <th class="p-2">Dari</th>
                            <th class="p-2">Pesan</th>
                            <th class="p-2">Foto</th>
                            <th class="p-2">Status</th>
                            <th class="p-2">Tanggapan</th>
                            <th class="p-2">Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admin as $item)
                        <tr>
                            <td class="p-2">John Doe</td>
                            <td class="p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                            </td>
                            <td class="p-2"><img src="https://picsum.photos/200/300" class="img-fluid" alt=""></td>
                            <td class="p-2"><span class="badge bg-success">Diterima</span></td>
                            <td class="p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                            </td>
                            <td class="p-2"><span class="badge bg-warning">3</span></td>
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
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            responsive: true
        });
    });
</script>
@endsection