@extends('layouts.home')

@section('title', 'Pengaduan Masyarakat Kelurahan Kabayan | Pengaduan')

@section('styles')
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/sp-2.1.2/datatables.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="hero bg-white rounded-3 shadow m-2 m-sm-4 m-md-0" style="padding-bottom: 4rem;">
    <h1 style="color: #243142;">Daftar Pengaduan</h1>


    <table class="table table-striped w-100" id="table1">
        <!-- Button trigger for large size modal -->
        <button type="button" class="btn btn-primary rounded-pill mb-2" data-bs-toggle="modal" data-bs-target="#large">
            Buat Laporan
        </button>
        <!--large size Modal -->
        <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">
                            Form Pengaduan
                        </h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form id="form-pengaduan" data-action="{{ route('pengaduan.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="user_id" />
                            <input type="hidden" name="status" value="proses" id="status" />

                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input class="form-control" type="file" id="foto" name="foto" />
                            </div>
                            <div class="mb-3">
                                <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail">
                            </div>
                            <div>
                                <label class="form-label">Pesan<sup class="text-danger">*</sup></label>
                                <textarea id="pesan" class="form-control" name="pesan" rows="6" placeholder="Pesan"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tutup</span>
                            </button>
                            <button id="store" type="submit" class="btn btn-primary ms-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Kirim</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if (session()->has('success'))
        <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i>
            {{ session('success') }}
        </div>
        @endif
        <thead>
            <tr class="text-primary">
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
            @foreach ($pengaduan as $item)
            <tr id="index_{{ $item->id }}">
                <td class="text-nowrap">{{ $item->created_at->format('Y-m-d') }}</td>
                <td>{{ $item->pesan }}</td>
                <td><img src="{{ asset('images/pengaduan/' . $item->foto) }}" alt="" width="100"></td>
                <td><span class="badge {{ ($item->status == 'proses') ? 'bg-primary' : 'bg-success' }}"
                        style="font-weight: 400;">{{ $item->status
                        }}</span></td>
                <td>{{ $item->tanggapan }}</td>
                <td class="text-nowrap">
                    @if ($item->status == 'selesai' && $item->rating == null)
                    <a id="btn-rating" data-id="{{ $item->id }}" href="javascript:void(0)"
                        class="btn icon btn-warning btn-sm" data-bs-toggle="modal"
                        data-bs-target="#modal-rating{{ $item->id }}"><i class="bi bi-star"></i></a>

                    {{-- Modal rating --}}
                    <div class="modal fade text-left" id="modal-rating{{ $item->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel17" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                            role="document">
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
                                        <input type="hidden" name="id" id="id-rating" />
                                        <div class="mb-3">
                                            <label class="form-label">Tanggapan</label>
                                            <textarea class="form-control" name="tanggapan" id="tanggapan"
                                                disabled></textarea>
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
                    <a id="btn-edit" data-id="{{ $item->id }}" href="javascript:void(0)"
                        class="btn icon btn-warning btn-sm" data-bs-toggle="modal"
                        data-bs-target="#modal-edit{{ $item->id }}"><i class="bi bi-pencil"></i></a>

                    {{-- Modal edit pengaduan --}}
                    <div class="modal fade text-left" id="modal-edit{{ $item->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel17" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel17">
                                        Edit Form Pengaduan
                                    </h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <form id="form-edit" action="/pengaduan/{{ $item->id }}" method="POST"
                                    class="overflow-auto" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="id" id="id-edit" />
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"
                                            id="user-edit" />

                                        <div class="mb-3">
                                            <label class="form-label">Foto</label>
                                            <input class="form-control" type="file" id="foto-edit{{ $item->id }}"
                                                name="foto"
                                                onchange="previewImage(this, 'preview-edit{{ $item->id }}')" />
                                        </div>
                                        <div class="mb-3">
                                            <img src="{{ $item->foto ? asset('images/pengaduan/' . $item->foto) : 'https://placehold.it/80x80' }}"
                                                id="preview-edit{{ $item->id }}" class="img-thumbnail">
                                        </div>
                                        <div>
                                            <label class="form-label">Pesan<sup class="text-danger">*</sup></label>
                                            <textarea id="pesan-edit" class="form-control" name="pesan" rows="6"
                                                placeholder="Pesan">{{ $item->pesan }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Tutup</span>
                                        </button>
                                        <button id="update" type="submit" class="btn btn-primary ms-1">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Update</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <form id="form-delete" action="/pengaduan/{{ $item->id }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button id="btn-delete" type="submit" class="btn icon btn-danger btn-sm"><i
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
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/sp-2.1.2/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        let dt = $('#table1').DataTable({
            responsive: true,
        })

        var table = $('#table1')
        var form = $('#form-pengaduan')

        $('#foto').change(function(){
            const file = this.files[0];
            if (file){
                let reader = new FileReader();
                reader.onload = function(event){
                    $('#preview').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });

        $('#foto-edit').change(function(){
            const file = this.files[0];
            if (file){
                let reader = new FileReader();
                reader.onload = function(event){
                    $('#preview-edit').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });

        $('body').on('click', '#btn-rating', function () {
            let dataId = $(this).attr('data-id')

            $.ajax({
                url: '/pengaduan/' + dataId + '/edit',
                type: 'GET',
                success: function (response) {
                    $('#id-rating').val(response.data[0].id)
                    $('#tanggapan').val(response.data[0].tanggapan)
                },

                error: function (response) {
                }
            })
        })
        $('body').on('click', '#btn-delete', function (e) {
            e.preventDefault()

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-delete').submit()
                }
            })
        })
    })

    function previewImage(fileInput, imagePreviewId) {
        const imagePreview = document.getElementById(imagePreviewId);
        
        const file = fileInput.files[0];
        
        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                imagePreview.setAttribute('src', this.result);
            });

            reader.readAsDataURL(file);
        }
    }
</script>
@endsection