@extends('layouts.home')

@section('title', 'Pengaduan Masyarakat Kelurahan Kabayan')

@section('styles')
    <style>
        /* The actual timeline (the vertical ruler) */
        .main-timeline-2 {
            position: relative;
        }

        /* The actual timeline (the vertical ruler) */
        .main-timeline-2::after {
            content: "";
            position: absolute;
            width: 3px;
            background-color: #4E91F9;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }

        /* Container around content */
        .timeline-2 {
            position: relative;
            background-color: inherit;
            width: 50%;
        }

        /* The circles on the timeline */
        .timeline-2::after {
            content: "";
            position: absolute;
            width: 25px;
            height: 25px;
            right: -11px;
            background-color: #4E91F9;
            top: 15px;
            border-radius: 50%;
            z-index: 1;
        }

        /* Place the container to the left */
        .left-2 {
            padding: 0px 40px 20px 0px;
            left: 0;
        }

        /* Place the container to the right */
        .right-2 {
            padding: 0px 0px 20px 40px;
            left: 50%;
        }

        /* Add arrows to the left container (pointing right) */
        .left-2::before {
            content: " ";
            position: absolute;
            top: 18px;
            z-index: 1;
            right: 30px;
            border: medium solid white;
            border-width: 10px 0 10px 10px;
            border-color: transparent transparent transparent white;
        }

        /* Add arrows to the right container (pointing left) */
        .right-2::before {
            content: " ";
            position: absolute;
            top: 18px;
            z-index: 1;
            left: 30px;
            border: medium solid white;
            border-width: 10px 10px 10px 0;
            border-color: transparent white transparent transparent;
        }

        /* Fix the circle for containers on the right side */
        .right-2::after {
            left: -14px;
        }

        /* Media queries - Responsive timeline on screens less than 600px wide */
        @media screen and (max-width: 600px) {

            /* Place the timelime to the left */
            .main-timeline-2::after {
                left: 31px;
            }

            /* Full-width containers */
            .timeline-2 {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }

            /* Make sure that all arrows are pointing leftwards */
            .timeline-2::before {
                left: 60px;
                border: medium solid white;
                border-width: 10px 10px 10px 0;
                border-color: transparent white transparent transparent;
            }

            /* Make sure all circles are at the same spot */
            .left-2::after,
            .right-2::after {
                left: 18px;
            }

            .left-2::before {
                right: auto;
            }

            /* Make all right containers behave like the left ones */
            .right-2 {
                left: 0%;
            }
        }
    </style>
@endsection

@section('content')
    <div class="m-2 m-sm-4 m-md-0">
        <div class="mx-auto d-flex flex-lg-row flex-column hero bg-white shadow rounded-3" style="padding-bottom: 4rem;">
            <section class="w-100">
                <h1 class="title-text-big text-center">
                    Tata Cara<br class="d-lg-block d-none" />
                    <span style="color: #4E91F9">Pengaduan</span>
                </h1>
                <div class="container py-5">
                    <div class="main-timeline-2">
                        <div class="timeline-2 left-2">
                            <div class="card shadow-lg">
                                <img src="{{ asset('images/tulis laporan.png') }}" class="card-img-top"
                                    alt="Responsive image" style="background: #4E91F9; height: 200px; object-fit: contain;">
                                <div class="card-body p-4">
                                    <h4 class="fw-bold mb-4">1. Tulis Laporan</h4>
                                    <p class="mb-0">Tulis laporan keluhan Anda dengan jelas</p>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-2 right-2">
                            <div class="card shadow-lg">
                                <img src="{{ asset('images/proses verifikasi.png') }}" class="card-img-top"
                                    alt="Responsive image" style="background: #4E91F9; height: 200px; object-fit: contain;">
                                <div class="card-body p-4">
                                    <h4 class="fw-bold mb-4">2. Laporan Diproses</h4>
                                    <p class="mb-0">Tunggu sampai laporan Anda diverifikasi</p>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-2 left-2">
                            <div class="card shadow-lg">
                                <img src="{{ asset('images/tindak lanjut.png') }}" class="card-img-top"
                                    alt="Responsive image" style="background: #4E91F9; height: 200px; object-fit: contain;">
                                <div class="card-body p-4">
                                    <h4 class="fw-bold mb-4">3. Tindak Lanjut</h4>
                                    <p class="mb-0">Laporan Anda sedang dalam tindak lanjut</p>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-2 right-2">
                            <div class="card shadow-lg">
                                <img src="{{ asset('images/selesai.png') }}" class="card-img-top"
                                    alt="Responsive image" style="background: #4E91F9; height: 200px; object-fit: contain;">
                                <div class="card-body p-4">
                                    <h4 class="fw-bold mb-4">4. Selesai</h4>
                                    <p class="mb-0">Laporan pengaduan telah selesai ditindak</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
