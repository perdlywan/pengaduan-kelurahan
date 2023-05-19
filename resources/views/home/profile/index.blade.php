@extends('layouts.home')

@section('title', 'Pengaduan Masyarakat Kelurahan Kabayan | My Profile')

@section('content')
<div class="hero bg-white rounded-3 shadow" style="padding-bottom: 4rem;">
    <div class="text-center">
        <h1 style="color: #243142;">My Profile</h1>
        <i class="bi bi-person-circle text-primary" style="font-size: 128px;"></i>
    </div>
    <div class="row">
        @method('put')
        @csrf
        <div class="col-12">
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="number" class="form-control @error('nik') is-invalid @enderror" placeholder="NIK"
                    name="nik" value="{{ old('nik', $user->nik) }}" disabled>
                @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="NAMA"
                    name="nama" value="{{ old('nama', $user->nama) }}" disabled>
                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="USERNAME"
                    name="username" value="{{ old('username', $user->username) }}" disabled>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    placeholder="EMAIL" value="{{ old('email', $user->email) }}" disabled>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="telp">Telepon</label>
                <input type="number" class="form-control @error('telp') is-invalid @enderror" name="telp"
                    placeholder="TELEPON" value="{{ old('telp', $user->telp) }}" disabled>
                @error('telp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-12 d-flex justify-content-end">
            <button id="btn-edit-profile" type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#modal-edit-profile">
                Edit
            </button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade text-left" id="modal-edit-profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h4 class="modal-title" id="myModalLabel17">
                        Update My Profile
                    </h4>
                </div>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="form-rating" method="PUT" class="overflow-auto">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="id" />

                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="number" id="nik" class="form-control @error('nik') is-invalid @enderror"
                                    placeholder="NIK" name="nik">
                                @error('nik')
                                <div class="invalid-feedback">

                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror"
                                    placeholder="NAMA" name="nama">
                                @error('nama')
                                <div class="invalid-feedback">

                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username"
                                    class="form-control @error('username') is-invalid @enderror" placeholder="USERNAME"
                                    name="username">
                                @error('username')
                                <div class="invalid-feedback">

                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" placeholder="EMAIL">
                                @error('email')
                                <div class="invalid-feedback">

                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="telp">Telepon</label>
                                <input type="number" id="telp" class="form-control @error('telp') is-invalid @enderror"
                                    name="telp" placeholder="TELEPON">
                                @error('telp')
                                <div class="invalid-feedback">

                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="password">PASSWORD <span class="text-sm text-danger"><sub>* Kosongkan
                                            jika tidak mengubah password</sub></span></label>
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="PASSWORD">
                                @error('password')
                                <div class="invalid-feedback">

                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                    <button id="update-profile" type="submit" class="btn btn-primary ms-1">
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
<script>
    $(document).ready(function () {
        // PUT
        $('body').on('click', '#btn-edit-profile', function (e) {
            e.preventDefault()

            $.ajax({
                url: "/profile/{{ Auth::user()->username }}/edit",
                method: "GET",
                dataType: "JSON",
                success: function (data) {
                    $('#id').val(data.user.id)
                    $('#nik').val(data.user.nik)
                    $('#nama').val(data.user.nama)
                    $('#username').val(data.user.username)
                    $('#email').val(data.user.email)
                    $('#telp').val(data.user.telp)
                }
            })
        })
        $('#update-profile').on('submit', function (e) {
            e.preventDefault()

            let id = $('#id').val()

            $.ajax({
                url: "/profile/{{ Auth::user()->username }}",
                method: "PUT",
                data: $(this).serialize(),
                dataType: "JSON",
                success: function (data) {
                    if (data.success) {
                        $('#modal-edit-profile').modal('hide')
                        $('#form-rating')[0].reset()
                        $('#form-rating').removeClass('was-validated')
                        $('#table-rating').DataTable().ajax.reload()
                        toastr.success(data.message, 'Success!')
                    }
                }
            })
        })
    })
</script>
@endsection