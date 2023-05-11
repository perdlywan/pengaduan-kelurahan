@extends('layouts.home')

@section('title', 'Pengaduan Masyarakat Kelurahan Kabayan | Pengaduan')

@section('styles')
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/sp-2.1.2/datatables.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="hero bg-white rounded-3 shadow" style="padding-bottom: 4rem;">
    <h1 style="color: #243142;">Daftar Pengaduan</h1>
    <table class="table table-striped w-100" id="table1">
        <!-- Button trigger for large size modal -->
        <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#large">
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
                                <textarea id="pesan" class="form-control" name="pesan" rows="6"
                                    placeholder="Pesan"></textarea>
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
                        class="btn icon btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal-rating"><i
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
                    <a id="btn-edit" data-id="{{ $item->id }}" href="javascript:void(0)"
                        class="btn icon btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit"><i
                            class="bi bi-pencil"></i></a>
                    <a id="btn-delete" data-id="{{ $item->id }}" href="javascript:void(0)"
                        class="btn icon btn-danger btn-sm"><i class="bi bi-x"></i></a>
                    @else
                    -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade text-left" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
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
            <form id="form-edit" method="PUT" class="overflow-auto">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id-edit" />
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="user-edit" />

                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input class="form-control" type="file" id="foto-edit" />
                    </div>
                    <div class="mb-3">
                        <img src="https://placehold.it/80x80" id="preview-edit" class="img-thumbnail">
                    </div>
                    <div>
                        <label class="form-label">Pesan<sup class="text-danger">*</sup></label>
                        <textarea id="pesan-edit" class="form-control" name="pesan" rows="6"
                            placeholder="Pesan"></textarea>
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

<div class="modal fade text-left" id="modal-rating" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h4 class="modal-title" id="myModalLabel17">
                        Berikan Rating
                    </h4>
                    <span>Berikan rating Anda terhadap tanggapan yang telah diberikan pihak Kelurahan.</span>
                </div>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="form-rating" method="PUT" class="overflow-auto">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id-rating" />
                    <div class="mb-3">
                        <label class="form-label">Tanggapan</label>
                        <textarea class="form-control" name="tanggapan" id="tanggapan" disabled></textarea>
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
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/sp-2.1.2/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table1').DataTable({
            responsive: true,
        });
    });
</script>
<script>
    $(document).ready(function () {
        var table = $('#table1');
        var form = $('#form-pengaduan');

        let rating1 = `
            <span hidden>1</span>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star text-warning"></i>
            <i class="bi bi-star text-warning"></i>
            <i class="bi bi-star text-warning"></i>
            <i class="bi bi-star text-warning"></i>
        `
        let rating2 = `
            <span hidden>2</span>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star text-warning"></i>
            <i class="bi bi-star text-warning"></i>
            <i class="bi bi-star text-warning"></i>
        `
        let rating3 = `
            <span hidden>3</span>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star text-warning"></i>
            <i class="bi bi-star text-warning"></i>
        `
        let rating4 = `
            <span hidden>4</span>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star text-warning"></i>
        `
        let rating5 = `
            <span hidden>5</span>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
        `

        $('#foto').change(function(){
            const file = this.files[0];
            if (file){
                let reader = new FileReader();
                reader.onload = function(event){
                    console.log(event.target.result);
                    $('#preview').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });

        // POST
        $(form).on('submit', function (e) {
            e.preventDefault()

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $(this).attr('data-action'),
                type: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    let tanggal = new Date(response.data.created_at)
                    let tahun = tanggal.getFullYear()
                    let bulan = '' + (tanggal.getMonth() + 1)
                    let hari = '' + tanggal.getDate()

                    if (bulan.length < 2) 
                        bulan = '0' + bulan;
                    if (hari.length < 2) 
                        hari = '0' + hari;

                    let parsedTanggal = tahun + '-' + bulan + '-' + hari

                    var row = `
                        <tr id="index_${ response.data.id }">
                            <td class="text-nowrap">${ parsedTanggal }</td>
                            <td>${ response.data.pesan }</td>
                            <td><img src="{{ asset('images/pengaduan') }}/${ response.data.foto }" alt="" width="100"></td>
                            <td><span class="badge bg-primary" style="font-weight: 400;">${ response.data.status }</span></td>
                            <td></td>
                            <td></td>
                            <td class="text-nowrap">
                                <a id="btn-edit" data-id="${ response.data.id }" href="javascript:void(0)"
                                    class="btn icon btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit"><i
                                        class="bi bi-pencil"></i></a>
                                <a id="btn-delete" data-id="${ response.data.id }" href="javascript:void(0)"
                                    class="btn icon btn-danger btn-sm"><i class="bi bi-x"></i></a>
                            </td>
                        </tr>
                    `

                    $(table).find('tbody').prepend(row)

                    $('#foto').val('')
                    $('#pesan').val('')

                    $('#store').attr('data-bs-dismiss', 'modal')
                    $('#store').click()
                    $('#store').removeAttr('data-bs-dismiss')

                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Pengaduan berhasil dikirim, silahkan tunggu tanggapan dari admin',
                    })
                },

                error: function (response) {
                }
            })
        })

        // PUT
        $('body').on('click', '#btn-edit', function () {
            let dataId = $(this).attr('data-id')
            $.ajax({
                url: '/pengaduan/' + dataId + '/edit',
                type: 'GET',
                success: function (response) {
                    $('#id-edit').val(response.data[0].id)
                    $('#pesan-edit').val(response.data[0].pesan)
                    if (response.data[0].foto) {
                        $('#preview-edit').attr('src', "{{ asset('images/pengaduan') }}/" + response.data[0].foto)
                    } else {
                        $('#preview-edit').attr('src', "https://placehold.it/80x80")
                    }

                    $('#foto-edit').change(function(){
                        const file = this.files[0];
                        console.log(file);
                        if (file){
                            let reader = new FileReader();
                            reader.onload = function(event){
                                console.log(event.target.result);
                                $('#preview-edit').attr('src', event.target.result);
                            }
                            reader.readAsDataURL(file);
                        }
                    });
                    

                    $('#modal-edit').modal('show')
                },

                error: function (response) {
                }
            })
        })
        $('#form-edit').on('submit', function (e) {
            e.preventDefault()

            let dataId = $('#id-edit').val()

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/pengaduan/' + dataId,
                type: 'PUT',
                data: {
                    pesan: $('#pesan-edit').val(),
                },
                success: function (response) {
                    $('#index_' + dataId).find('td').eq(1).text(response.data.pesan)

                    $('#update').attr('data-bs-dismiss', 'modal')
                    $('#update').click()
                    $('#update').removeAttr('data-bs-dismiss')

                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Pengaduan berhasil diubah',
                    })
                },

                error: function (response) {
                }
            })
        })
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
        $('#form-rating').on('submit', function (e) {
            e.preventDefault()

            let dataId = $('#id-rating').val()

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/pengaduan/' + dataId,
                type: 'PUT',
                data: {
                    rating: $('#rating').val(),
                },
                success: function (response) {
                    $('#index_' + dataId).find('td').eq(5).empty()
                    if (response.data.rating == 1) {
                        $('#index_' + dataId).find('td').eq(5).append(rating1)
                    } else if (response.data.rating == 2) {
                        $('#index_' + dataId).find('td').eq(5).append(rating2)
                    } else if (response.data.rating == 3) {
                        $('#index_' + dataId).find('td').eq(5).append(rating3)
                    } else if (response.data.rating == 4) {
                        $('#index_' + dataId).find('td').eq(5).append(rating4)
                    } else if (response.data.rating == 5) {
                        $('#index_' + dataId).find('td').eq(5).append(rating5)
                    }

                    $('#update-rating').attr('data-bs-dismiss', 'modal')
                    $('#update-rating').click()
                    $('#update-rating').removeAttr('data-bs-dismiss')

                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Berhasil memberikan rating',
                    })
                },

                error: function (response) {
                }
            })
        })

        // DELETE
        $('body').on('click', '#btn-delete', function () {
            let dataId = $(this).attr('data-id')

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
                    $.ajax({
                        url: '/pengaduan/' + dataId,
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: function (response) {
                            $('#index_' + dataId).remove()

                            Swal.fire(
                                'Terhapus!',
                                'Data berhasil dihapus.',
                                'success'
                            )
                        },

                        error: function (response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            })
                        }
                    })
                }
            })
        })
    })
</script>
@endsection