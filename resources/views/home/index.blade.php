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
                    <button class="btn btn-get text-white d-inline-flex">
                        Buat Laporan
                    </button>
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
@endsection