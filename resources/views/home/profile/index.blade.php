@extends('layouts.home')

@section('title', 'Pengaduan Masyarakat Kelurahan Kabayan | Profile')

@section('styles')
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/sp-2.1.2/datatables.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="hero bg-white rounded-3 shadow m-2 m-sm-4 m-md-0" style="padding-bottom: 4rem;">
    <h1 style="color: #243142;">Profile Saya</h1>
    <form action="/profile/{{ $user->id }}" method="POST">
        <div class="row">
            @method('put')
            @csrf
            <div class="col">
                <label for="nik">NIK</label>
                <input type="number" class="form-control @error('nik') is-invalid @enderror" placeholder="NIK"
                    name="nik" value="{{ old('nik', $user->nik) }}">
                @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col">
                <label for="nama">NAMA</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="NAMA"
                    name="nama" value="{{ old('nama', $user->nama) }}">
                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for="username">USERNAME</label>
                <input type="text" class="form-control  @error('username') is-invalid @enderror" placeholder="USERNAME"
                    name="username" value="{{ old('username', $user->username) }}">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col">
                <label for="nama">EMAIL</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="EMAIL"
                    name="email" value="{{ old('email', $user->email) }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for="telp">TELEPON</label>
                <input type="number" class="form-control @error('telp') is-invalid @enderror" placeholder="TELEPON"
                    name="telp" value="{{ old('telp', $user->telp) }}">
                @error('telp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col">
                <label for="nama">Password <span class="text-sm">(Kosongkan Jika Tidak Merubah
                        Password)</span></label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="PASSWORD" name="password">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
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
    $(document).ready(function() {
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

            $('#foto').change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#preview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });

            // POST
            $(form).on('submit', function(e) {
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
                    success: function(response) {
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

                    error: function(response) {}
                })
            })

            // PUT
            $('body').on('click', '#btn-edit', function() {
                let dataId = $(this).attr('data-id')
                $.ajax({
                    url: '/pengaduan/' + dataId + '/edit',
                    type: 'GET',
                    success: function(response) {
                        $('#id-edit').val(response.data[0].id)
                        $('#pesan-edit').val(response.data[0].pesan)
                        if (response.data[0].foto) {
                            $('#preview-edit').attr('src', "{{ asset('images/pengaduan') }}/" +
                                response.data[0].foto)
                        } else {
                            $('#preview-edit').attr('src', "https://placehold.it/80x80")
                        }

                        $('#foto-edit').change(function() {
                            const file = this.files[0];
                            console.log(file);
                            if (file) {
                                let reader = new FileReader();
                                reader.onload = function(event) {
                                    console.log(event.target.result);
                                    $('#preview-edit').attr('src', event.target
                                        .result);
                                }
                                reader.readAsDataURL(file);
                            }
                        });


                        $('#modal-edit').modal('show')
                    },

                    error: function(response) {}
                })
            })
            $('#form-edit').on('submit', function(e) {
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
                    success: function(response) {
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

                    error: function(response) {}
                })
            })
            $('body').on('click', '#btn-rating', function() {
                let dataId = $(this).attr('data-id')

                $.ajax({
                    url: '/pengaduan/' + dataId + '/edit',
                    type: 'GET',
                    success: function(response) {
                        $('#id-rating').val(response.data[0].id)
                        $('#tanggapan').val(response.data[0].tanggapan)
                    },

                    error: function(response) {}
                })
            })
            $('#form-rating').on('submit', function(e) {
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
                    success: function(response) {
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

                    error: function(response) {}
                })
            })

            // DELETE
            $('body').on('click', '#btn-delete', function() {
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
                            success: function(response) {
                                $('#index_' + dataId).remove()

                                Swal.fire(
                                    'Terhapus!',
                                    'Data berhasil dihapus.',
                                    'success'
                                )
                            },

                            error: function(response) {
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