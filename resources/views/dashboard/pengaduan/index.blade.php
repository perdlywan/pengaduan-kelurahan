@extends('layouts.dashboard')

@section('styles')
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/sp-2.1.2/datatables.min.css" rel="stylesheet" />
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
                <h3 class="card-title">Data Pengaduan Masyarakat</h3>
                <p class="card-text">Daftar data pengaduan yang diajukan oleh masyarakat.</p>
                @if (session()->has('success'))
                <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i>
                    {{ session('success') }}
                </div>
                @endif
                <table class="table table-striped w-100" id="table1">
                    <thead>
                        <tr class="text-primary">
                            <th>Tanggal</th>
                            <th>Ditanggapi Oleh</th>
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
                            <td class="text-nowrap">{{ $item->created_at->format('Y-m-d') }}</td>
                            <td><a href="#">{{ $item->modified->username }}</a></td>
                            <td><a href="#">{{ $item->user->username }}</a></td>
                            <td>{{ $item->pesan }}</td>
                            <td><img src="{{ asset('images/pengaduan/' . $item->foto) }}" alt="" width="100"></td>
                            <td><span class="badge {{ ($item->status == 'proses') ? 'bg-primary' : 'bg-success' }}"
                                    style="font-weight: 400;">{{
                                    $item->status }}</span></td>
                            <td>{{ $item->tanggapan }}</td>
                            <td class="text-nowrap">
                                @if ($item->rating == 1)
                                <span hidden>1</span>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                @elseif ($item->rating == 2)
                                <span hidden>2</span>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                @elseif ($item->rating == 3)
                                <span hidden>3</span>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                @elseif ($item->rating == 4)
                                <span hidden>4</span>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star text-warning"></i>
                                @elseif ($item->rating == 5)
                                <span hidden>5</span>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                @else
                                @endif
                            </td>
                            <td class="text-nowrap">
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
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/sp-2.1.2/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table1').DataTable({
            responsive: true,
            order: [
                [4, 'asc']
            ]
        });
    });
</script>
@endsection