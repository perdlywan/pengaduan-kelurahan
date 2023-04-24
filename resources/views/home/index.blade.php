@extends('layouts.home')

@section('content')
<div>
    <div class="mx-auto d-flex flex-lg-row flex-column hero bg-white shadow rounded-3">
        <!-- Left Column -->
        <div
            class="left-column flex-lg-grow-1 d-flex flex-column align-items-lg-start text-lg-start align-items-center text-center">
            <h1 class="title-text-big">
                Pengaduan Masyarakat<br class="d-lg-block d-none" />
                <span style="color: #4E91F9">Kelurahan Kabayan</span </h1>
                <p class="text-caption">
                    Punya keluhan? Yuk laporkan ke kami!
                </p>
                <div
                    class="d-flex flex-sm-row flex-column align-items-center mx-auto mx-lg-0 justify-content-center justify-content-lg-start gap-3">
                    @if (Auth::check())
                    <button class="btn btn-get text-white d-inline-flex" data-bs-toggle="modal" data-bs-target="#large">
                        Buat Laporan
                    </button>
                    <!--large size Modal -->
                    <div class="modal fade text-left text-sm font-weight-normal" id="large" tabindex="-1" role="dialog"
                        style="text-align: left!important; font-weight: 400!important;" aria-labelledby="myModalLabel17"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel17">
                                        Form Pengaduan
                                    </h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <form id="form-pengaduan" data-action="{{ route('pengaduan.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="id" />
                                        <input type="hidden" name="status" value="proses" id="status" />

                                        <div class="mb-3">
                                            <label class="form-label">Foto</label>
                                            <input class="form-control" type="file" id="foto" name="foto" />
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
                    @else
                    <button class="btn btn-get text-white d-inline-flex warning">
                        Buat Laporan
                    </button>
                    @endif
                </div>
        </div>

        <!-- Right Column -->
        <div class="right-column d-flex justify-content-center justify-content-lg-start text-center pe-0">
            <img class="d-lg-block d-none hero-right"
                src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header3/Header-3-2.png"
                alt="" />
        </div>
    </div>
</div>

<div id="tata-cara" class="container py-4 py-xl-5">
    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-lg-4" style="margin-top: 24px;">
        <div class="col">
            <div><img class="rounded img-fluid d-block w-100 fit-cover" style="height: 200px;"
                    src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                <div class="py-4">
                    <h4 style="font-family: Poppins, sans-serif;font-weight: bold;color: #243142;">1. Tulis
                        Laporan</h4>
                    <p class="text-caption" style="color: #243142;">Tulis laporan keluhan Anda dengan jelas
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div><img class="rounded img-fluid d-block w-100 fit-cover" style="height: 200px;"
                    src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                <div class="py-4">
                    <h4 style="font-family: Poppins, sans-serif;font-weight: bold;color: #243142;">2. Proses
                        Verifikasi</h4>
                    <p class="text-caption" style="color: #243142;">Tunggu sampai laporan Anda diveerifikasi
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div><img class="rounded img-fluid d-block w-100 fit-cover" style="height: 200px;"
                    src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                <div class="py-4">
                    <h4 style="font-family: Poppins, sans-serif;font-weight: bold;color: #243142;">3. Tindak
                        Lanjut</h4>
                    <p class="text-caption" style="color: #243142;">Laporan Anda sedang dalam tindak lanjut
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div><img class="rounded img-fluid d-block w-100 fit-cover" style="height: 200px;"
                    src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                <div class="py-4">
                    <h4 style="font-family: Poppins, sans-serif;font-weight: bold;color: #243142;">4.
                        Selesai</h4>
                    <p class="text-caption" style="color: #243142;">Laporan pengaduan telah selesai ditindak
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $('.warning').click(function () {
        Swal.fire({
            icon: 'warning',
            title: 'Error',
            text: 'Anda harus login terlebih dahulu!',
            showCancelButton: true,
            confirmButtonText: 'Login',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/login"
            }
        })
    })

    $('#form-pengaduan').on('submit', function (e) {
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
                $('#store').attr('data-bs-dismiss', 'modal')
                $('#store').click()
                $('#store').removeAttr('data-bs-dismiss')

                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Pengaduan berhasil dikirim, silahkan tunggu tanggapan dari admin',
                    showCancelButton: false,
                    confirmButtonText: 'Pergi ke Pengaduan',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/pengaduan"
                    }
                })
            },

            error: function (response) {
            }
        })
    })
</script>
@endsection

@endsection