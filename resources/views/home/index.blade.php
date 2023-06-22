@extends('layouts.home')

@section('title', 'Pengaduan Masyarakat Kelurahan Kabayan')
@section('content')
    <div class="m-2 m-sm-4 m-md-0">
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
                            <a href="/pengaduan/add" class="btn btn-get text-white d-inline-flex">
                                Buat Pengaduan
                            </a>
                        @else
                            <button class="btn btn-get text-white d-inline-flex warning">
                                Buat Pengaduan
                            </button>
                        @endif
                    </div>
            </div>

            <!-- Right Column -->
            <div class="right-column d-flex justify-content-center justify-content-lg-start text-center">
                {{-- <img class="d-lg-block d-none hero-right rounded-3" src="{{ asset('images/kelurahan kabayan.jpg') }}"
                    alt="kelurahan" height="460" width="100%" style="object-fit: cover;" /> --}}
                <div id="carouselExampleIndicators" class="carousel slide w-100" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="5000">
                            <img src="{{ asset('images/carousel/slide_1.jpg') }}" height="460" width="100%" class="d-lg-block d-none hero-right rounded-3" alt="Slide 1" style="object-fit: cover;">
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                            <img src="{{ asset('images/carousel/slide_2.jpg') }}" height="460" width="100%" class="d-lg-block d-none hero-right rounded-3" alt="Slide 2" style="object-fit: cover;">
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                            <img src="{{ asset('images/carousel/slide_3.jpg') }}" height="460" width="100%" class="d-lg-block d-none hero-right rounded-3" alt="Slide 3" style="object-fit: cover;">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="tata-cara" class="container py-4 py-xl-5">
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-lg-4" style="margin-top: 24px;">
            <div class="col">
                <div><img class="rounded img-fluid d-block m-auto fit-cover" style="height: 200px;"
                        src="{{ asset('images/tulis laporan.png') }}">
                    <div class="py-4">
                        <h4 style="font-family: Poppins, sans-serif;font-weight: bold;color: #243142;">1. Tulis
                            Laporan</h4>
                        <p class="text-caption" style="color: #243142;">Tulis laporan keluhan Anda dengan jelas
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div><img class="rounded img-fluid d-block m-auto fit-cover" style="height: 200px;"
                        src="{{ asset('images/proses verifikasi.png') }}">
                    <div class="py-4">
                        <h4 style="font-family: Poppins, sans-serif;font-weight: bold;color: #243142;">2. Laporan Diproses
                        </h4>
                        <p class="text-caption" style="color: #243142;">Tunggu sampai laporan Anda diverifikasi
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div><img class="rounded img-fluid d-block m-auto fit-cover" style="height: 200px;"
                        src="{{ asset('images/tindak lanjut.png') }}">
                    <div class="py-4">
                        <h4 style="font-family: Poppins, sans-serif;font-weight: bold;color: #243142;">3. Tindak
                            Lanjut</h4>
                        <p class="text-caption" style="color: #243142;">Laporan Anda sedang dalam tindak lanjut
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div><img class="rounded img-fluid d-block m-auto fit-cover" style="height: 200px;"
                        src="{{ asset('images/selesai.png') }}">
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
        $('.warning').click(function() {
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

        $('#foto').change(function() {
            const file = this.files[0]
            if (file) {
                let reader = new FileReader()
                reader.onload = function(event) {
                    $('#preview').attr('src', event.target.result)
                }
                reader.readAsDataURL(file)
            }
        })
    </script>
@endsection

@endsection
