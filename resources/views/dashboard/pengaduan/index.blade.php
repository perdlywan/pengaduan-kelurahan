@extends('layouts.dashboard')

@section('styles')
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/sp-2.1.2/datatables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/pages/simple-datatables.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
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
                                <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                                </li>
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

                    @can('masyarakat')
                        <a href="/pengaduan/add" class="btn btn-primary mb-2"><i class="bi bi-plus"></i> Buat Pengaduan</a>
                    @endcan

                    <table class="table table-striped w-100" id="table1">
                        <thead>
                            <tr class="text-primary">
                                <th>Tanggal</th>
                                @can('admin')
                                    <th>Ditanggapi Oleh</th>
                                    <th>Dari</th>
                                @endcan
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
                                    @can('admin')
                                        <td><a href="#">{{ $item->modified->username }}</a></td>
                                        <td><a href="#">{{ $item->user->username }}</a></td>
                                    @endcan
                                    <td>{{ $item->pesan }}</td>
                                    <td><img src="{{ asset('images/pengaduan/' . $item->foto) }}" alt=""
                                            width="100"></td>
                                    <td><span class="badge {{ $item->status == 'proses' ? 'bg-primary' : 'bg-success' }}"
                                            style="font-weight: 400;">{{ $item->status }}</span></td>
                                    <td>{{ $item->tanggapan }}</td>
                                    <td class="text-nowrap">
                                        @if ($item->status == 'selesai' && $item->rating == null)
                                            <a id="btn-rating" data-id="{{ $item->id }}" href="javascript:void(0)"
                                                class="btn icon btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modal-rating{{ $item->id }}"><i
                                                    class="bi bi-star"></i></a>
                                        @elseif ($item->rating == 1)
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
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        @if ($item->status == 'proses')
                                            <a href="/pengaduan/{{ $item->id }}/edit"
                                                class="btn icon btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                            <form id="form-delete" action="/pengaduan/{{ $item->id }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button id="btn-delete" type="submit" class="btn icon btn-danger btn-sm"
                                                    onclick="confirm('Apakah Anda yakin ingin menghapusnya?')"><i
                                                        class="bi bi-x"></i></button>
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

    @foreach ($pengaduan as $item)
        {{-- Modal rating --}}
        <div class="modal fade" id="modal-rating{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel17" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div>
                            <h4 class="modal-title" id="myModalLabel17">
                                Berikan Rating
                            </h4>
                            <span>Berikan rating Anda terhadap tanggapan yang telah diberikan pihak
                                Kelurahan.</span>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form id="form-rating" method="POST" action="/pengaduan/{{ $item->id }}"
                        class="overflow-auto">
                        @method('put')
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id-rating{{ $item->id }}" />
                            <div class="mb-3">
                                <label class="form-label">Tanggapan</label>
                                <textarea class="form-control" name="tanggapan" id="tanggapan{{ $item->id }}" disabled></textarea>
                            </div>
                            <select name="rating" id="rating" class="form-select">
                                <option value="">Pilih Rating</option>
                                <option value="1">Sangat Buruk</option>
                                <option value="2">Buruk</option>
                                <option value="3">Cukup</option>
                                <option value="4">Baik</option>
                                <option value="5">Sangat Baik</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tutup</span>
                            </button>
                            <button id="update-rating" type="submit" class="btn btn-primary ms-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Kirim</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    
@endsection

@section('js')
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/sp-2.1.2/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable({
                responsive: true,
                order: [
                    [4, 'asc']
                ]
            })

            $('body').on('click', '#btn-rating', function() {
                let dataId = $(this).attr('data-id')

                $.ajax({
                    url: '/pengaduan/rating/' + dataId,
                    type: 'GET',
                    success: function(response) {
                        $(`#id-rating${dataId}`).val(response.pengaduan.id)
                        $(`#tanggapan${dataId}`).val(response.pengaduan.tanggapan)
                    },

                    error: function(response) {}
                })
            })
        });
    </script>
@endsection
