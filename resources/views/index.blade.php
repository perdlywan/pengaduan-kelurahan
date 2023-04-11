<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GetShayna by BuildWith Angga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <section class="h-100 w-100" style="
				box-sizing: border-box;
				position: relative;
				background-color:#f2f7ff;
			">
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

            .header-3-3 .modal-backdrop.show {
                background-color: #000;
                opacity: 0.6;
            }

            .header-3-3 .modal-item.modal {
                top: 2rem;
            }

            .header-3-3 .navbar {
                padding: 2rem 2rem;
            }

            .header-3-3 .navbar-light .navbar-nav .nav-link {
                font: 300 0.875rem/1.5rem Poppins, sans-serif;
                color: #8B9CAF;
                padding: 0rem 1.25rem 0rem 0rem;
                margin-right: 0;
                margin-left: 0;
            }

            .header-3-3 .navbar-light .navbar-nav .nav-link:hover {
                font: 500 0.875rem/1.5rem Poppins, sans-serif;
                color: #243142;
            }

            .header-3-3 .navbar-light .navbar-nav .active {
                position: relative;
                width: fit-content;
            }

            .header-3-3 .navbar-light .navbar-nav .active>.nav-link,
            .header-3-3 .navbar-light .navbar-nav .nav-link.active,
            .header-3-3 .navbar-light .navbar-nav .nav-link.show,
            .header-3-3 .navbar-light .navbar-nav .show>.nav-link {
                font-weight: 500;
            }

            .header-3-3 .navbar-light .navbar-toggler-icon {
                background-image: urlurl("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            }

            .header-3-3 .btn:focus,
            .header-3-3 .btn:active {
                outline: none !important;
            }

            .header-3-3 .btn-fill {
                font: 500 0.875rem/1.25rem Poppins, sans-serif;
                border: 1px solid #4E91F9;
                background-color: #4E91F9;
                border-radius: 999px;
                padding: 0.75rem 1.5rem;
                transition: 0.3s;
            }

            .header-3-3 .btn-fill:hover {
                background-color: #6DA4F9;
                border: 1px solid #6DA4F9;
            }

            .header-3-3 .btn-no-fill {
                font: 500 0.875rem/1.25rem Poppins, sans-serif;
                color: #8B9CAF;
                padding: 0.75rem 2rem;
            }

            .header-3-3 .btn-no-fill:hover {
                color: #243142;
            }

            .header-3-3 .modal-item .modal-dialog .modal-content {
                border-radius: 8px;
            }

            .header-3-3 .responsive li {
                padding: 1rem;
            }

            .header-3-3 .hr {
                padding-left: 2rem;
                padding-right: 2rem;
            }

            .header-3-3 .hero {
                padding: 4rem 2rem;
            }

            .header-3-3 .left-column {
                margin-bottom: 0.75rem;
                width: 100%;
            }

            .header-3-3 .title-text-big {
                font: 600 2rem / normal Poppins, sans-serif;
                margin-bottom: 1.25rem;
                color: #243142;
            }

            .header-3-3 .text-caption {
                font: 300 1rem/1.5rem Poppins, sans-serif;
                letter-spacing: 0.025em;
                color: #8B9CAF;
                margin-bottom: 5rem;
            }

            .header-3-3 .btn-get {
                font: 600 1rem/1.5rem Poppins, sans-serif;
                padding: 1rem 2rem;
                border-radius: 999px;
                border: 1px solid #4E91F9;
                background-color: #4E91F9;
                transition: 0.3s;
            }

            .header-3-3 .btn-get:hover {
                background-color: #6DA4F9;
                border: 1px solid #6DA4F9;
            }

            .header-3-3 .btn-outline {
                font: 400 1rem/1.5rem Poppins, sans-serif;
                padding: 1rem 1.5rem;
                border-radius: 999px;
                background-color: transparent;
                border: 1px solid #A6B1BE;
                color: #A6B1BE;
                transition: 0.3s;
            }

            .header-3-3 .btn-outline:hover {
                border: 1px solid #6DA4F9;
                color: #6DA4F9;
            }

            .header-3-3 .btn-outline:hover div path {
                fill: #6DA4F9;
            }

            .header-3-3 .btn-outline:hover div rect {
                stroke: #6DA4F9;
            }

            .header-3-3 .right-column {
                width: 100%;
            }

            .header-3-3 .hero-right {
                right: 2rem;
                bottom: 0;
            }

            .header-3-3 .card-outer {
                padding-left: 0;
                z-index: 1;
            }

            .header-3-3 .card {
                transition: 0.4s;
                top: 0px;
                left: 0px;
                background-color: #FFFFFF;
                padding: 1.25rem;
                border-radius: 0.75rem;
                width: 100%;
                margin-top: 2.5rem;
                box-shadow: -4px 4px 10px 0px rgba(224, 224, 224, 0.25);
            }

            .header-3-3 .card:hover {
                top: -3px;
                left: -3px;
                transition: 0.4s;
                box-shadow: -4px 8px 15px 0px rgba(167, 167, 167, 0.25);
            }

            .header-3-3 .card-name {
                font: 600 1rem/1.5rem Poppins, sans-serif;
                margin-bottom: 0.25rem;
            }

            .header-3-3 .card-job {
                font: 300 0.75rem/1rem Poppins, sans-serif;
                color: #aaa6a6;
                margin-bottom: 0;
            }

            .header-3-3 .card-price-left {
                font: 500 1rem/1.5rem Poppins, sans-serif;
                margin-bottom: 0.125rem;
                color: #1B8171;
            }

            .header-3-3 .card-caption {
                font: 300 0.75rem/1rem Poppins, sans-serif;
                color: #aaa6a6;
                margin-bottom: 0;
            }

            .header-3-3 .card-price-right {
                font: 500 1rem/1.5rem Poppins, sans-serif;
                margin-bottom: 0.125rem;
                color: #FF7468;
            }

            .header-3-3 .btn-hire {
                font: 600 1rem/1.5rem Poppins, sans-serif;
                padding: 0.75rem 4rem;
                border-radius: 0.75rem;
                margin-bottom: 0.125rem;
                border: 1px solid #4E91F9;
                background-color: #4E91F9;
                transition: 0.3s;
            }

            .header-3-3 .btn-hire:hover {
                background-color: #6DA4F9;
                border: 1px solid #6DA4F9;
            }

            .header-3-3 .form {
                border-radius: 999px;
                background-color: #eef4fd;
                box-sizing: border-box;
                font-size: 14px;
                padding: 0rem 1rem;
                padding-right: 0.5rem;
                outline: none;
            }

            .header-3-3 .form div input[type="text"] {
                background-color: #eef4fd;
                box-sizing: border-box;
                font-size: 14px;
                padding: 0rem 0.5rem;
                outline: none;
                width: 100%;
            }

            .header-3-3 .center-search {
                bottom: 0.5rem;
            }

            @media (min-width: 576px) {
                .header-3-3 .modal-item .modal-dialog {
                    max-width: 95%;
                    border-radius: 12px;
                }

                .header-3-3 .navbar {
                    padding: 2rem;
                }

                .header-3-3 .title-text-big {
                    font-size: 3rem;
                    line-height: 1.2;
                }
            }

            @media (min-width: 768px) {
                .header-3-3 .navbar {
                    padding: 2rem 4rem;
                }

                .header-3-3 .hr {
                    padding-left: 4rem;
                    padding-right: 4rem;
                }

                .header-3-3 .hero {
                    padding: 4rem;
                }

                .header-3-3 .left-column {
                    margin-bottom: 3rem;
                }

                .header-3-3 .hero-right {
                    right: 4rem;
                }

                .header-3-3 .card {
                    margin-left: auto;
                    margin-top: 0;
                }
            }

            @media (min-width: 992px) {

                .header-3-3 .navbar-light .navbar-nav .active:before {
                    content: "";
                    position: absolute;
                    margin-left: auto;
                    margin-right: auto;
                    left: 0;
                    right: 0;
                    text-align: center;
                    bottom: 0;
                    height: 0px;
                    width: 80%;
                    /* or 100px */
                    border-bottom: 2px solid #4E91F9;
                }

                .header-3-3 .navbar {
                    padding: 2rem 6rem;
                }

                .header-3-3 .navbar-light .navbar-nav .nav-link {
                    padding: 0;
                    margin-right: 1rem;
                    margin-left: 1rem;
                }

                .header-3-3 .navbar-light .navbar-nav .active:before {
                    width: 40%;
                }

                .header-3-3 .hr {
                    padding-left: 6rem;
                    padding-right: 6rem;
                }

                .header-3-3 .hero {
                    padding: 4rem 6rem 0rem;
                }

                .header-3-3 .left-column {
                    width: 50%;
                    margin-bottom: 0;
                }

                .header-3-3 .title-text-big {
                    font-size: 3.75rem;
                    line-height: 1.25;
                }

                .header-3-3 .right-column {
                    width: 50%;
                }

                .header-3-3 .hero-right {
                    right: 6rem;
                }

                .header-3-3 .card-outer {
                    padding-left: 4rem;
                }

                .header-3-3 .center-search {
                    left: 48%;
                    top: 50%;
                    bottom: auto;
                    transform: translate(-48%, -50%);
                }

                .header-3-3 .form {
                    width: 340px;
                }
            }

            @media (max-width: 1023px) {
                .header-3-3 .form div input[type="text"] {
                    width: 100%;
                }
            }
        </style>
        <div class="header-3-3 container-xxl mx-auto p-0 position-relative" style="font-family: 'Poppins', sans-serif">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="#" class="text-decoration-none">
                    <img style="margin-right: 0.75rem" src="{{ asset('/images/logo/logo.png') }}" alt="" height="30" />
                    <strong style="color: #243142;">Kelurahan Kabayan</strong>
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="modal"
                    data-bs-target="#targetModal-item">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="modal-item modal fade" id="targetModal-item" tabindex="-1" role="dialog"
                    aria-labelledby="targetModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content bg-white border-0">
                            <div class="modal-header border-0" style="padding: 2rem; padding-bottom: 0">
                                <a class="modal-title" id="targetModalLabel">
                                    <img style="margin-top: 0.5rem"
                                        src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header3/Header-3-6.png"
                                        alt="" />
                                </a>
                                <button type="button" class="close btn-close text-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding: 2rem; padding-top: 0; padding-bottom: 0">
                                <ul class="navbar-nav responsive me-auto mt-2 mt-lg-0">
                                    <li class="nav-item active position-relative">
                                        <a class="nav-link main" style="color: #243142;" href="#">Home</a>
                                    </li>
                                    <li class="nav-item position-relative">
                                        <a class="nav-link" href="#">Feature</a>
                                    </li>
                                    <li class="nav-item position-relative">
                                        <a class="nav-link" href="#">Pricing</a>
                                    </li>
                                    <li class="nav-item position-relative">
                                        <a class="nav-link" href="#">Blog</a>
                                    </li>
                                    <li class="nav-item position-relative">
                                        <a class="nav-link" data-bs-toggle="collapse" href="#collapse" role="button"
                                            aria-expanded="false" aria-controls="collapse">
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.85 1.69346C3.5304 1.69346 1.65 3.57386 1.65 5.89346C1.65 8.21305 3.5304 10.0935 5.85 10.0935C8.1696 10.0935 10.05 8.21305 10.05 5.89346C10.05 3.57386 8.1696 1.69346 5.85 1.69346ZM0.25 5.89346C0.25 2.80066 2.75721 0.293457 5.85 0.293457C8.94279 0.293457 11.45 2.80066 11.45 5.89346C11.45 8.98625 8.94279 11.4935 5.85 11.4935C2.75721 11.4935 0.25 8.98625 0.25 5.89346Z"
                                                    fill="#8B9CAF" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.85503 8.89848C9.12839 8.62512 9.57161 8.62512 9.84497 8.89848L14.045 13.0985C14.3183 13.3718 14.3183 13.8151 14.045 14.0884C13.7716 14.3618 13.3284 14.3618 13.055 14.0884L8.85503 9.88843C8.58166 9.61506 8.58166 9.17185 8.85503 8.89848Z"
                                                    fill="#8B9CAF" />
                                            </svg>
                                        </a>
                                        <form method class="collapse position-absolute form center-search border-0"
                                            id="collapse">
                                            <div class="d-flex">
                                                <input type="text" class="rounded-full border-0 focus:outline-none"
                                                    placeholder="Search" />
                                                <button class="btn" type="button">
                                                    <svg style="width: 20px; height: 20px" data-bs-toggle="collapse"
                                                        href="#collapse" role="button" aria-expanded="false"
                                                        aria-controls="collapse" fill="none" stroke="#273B56"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="modal-footer border-0" style="padding: 2rem; padding-top: 0.75rem">
                                <button class="btn btn-default btn-no-fill">Sign In</button>
                                <button class="btn btn-fill text-white">Register</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        <li class="nav-item active position-relative">
                            <a class="nav-link main=" style="color: #243142;" href="#">Home</a>
                        </li>
                        <li class="nav-item position-relative">
                            <a class="nav-link" href="#">Tata Cara</a>
                        </li>
                    </ul>
                    <a href="/login" class="btn btn-default btn-no-fill">Log In</a>
                    <a href="/register" class="btn btn-fill text-white">Register</a>
                </div>
            </nav>
            <div class="hr">
                <hr style="
							border-color: #F4F4F4;
							background-color: #F4F4F4;
							opacity: 1;
							margin: 0 !important;
						" />
            </div>

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

            <div class="container py-4 py-xl-5">
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
            <footer class="text-center py-4">
                <div class="container">
                    <div class="row row-cols-1 row-cols-lg-3">
                        <div class="col">
                            <p class="text-muted my-2" style="font-family: Nunito, sans-serif;">Copyright&nbsp;© 2023
                                Kelurahan Kabayan</p>
                        </div>
                        <div class="col">
                            <ul class="list-inline my-2">
                                <li class="list-inline-item me-4">
                                    <div class="bs-icon-circle bs-icon-primary bs-icon"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook">
                                            <path
                                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                                            </path>
                                        </svg></div>
                                </li>
                                <li class="list-inline-item me-4">
                                    <div class="bs-icon-circle bs-icon-primary bs-icon"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter">
                                            <path
                                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z">
                                            </path>
                                        </svg></div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="bs-icon-circle bs-icon-primary bs-icon"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram">
                                            <path
                                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                            </path>
                                        </svg></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="list-inline my-2">
                                <li class="list-inline-item"><a class="link-secondary" href="#"
                                        style="font-family: Nunito, sans-serif;">Privacy Policy</a></li>
                                <li class="list-inline-item"><a class="link-secondary" href="#"
                                        style="font-family: Nunito, sans-serif;">Terms of Use</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>