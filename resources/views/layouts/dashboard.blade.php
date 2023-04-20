<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    @yield('stylesfirst')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Vendors -->
    <link rel="stylesheet" href="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/iconly/broken.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/iconly/bulk.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/sweetalert2/sweetalert2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app-dark.css') }}">
    @yield('styles')
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            @include('layouts.sidebar')
        </div>
        <div id="main" class="layout-navbar">
            <header>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <img src="{{ asset('/images/logo/logo.png') }}" alt="logo" width="36">

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="ms-auto dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex align-items-center">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600 text-capitalize">{{ Auth::user()->nama }}</h6>
                                            <p class="mb-0 text-sm text-gray-600 text-capitalize">{{ Auth::user()->level
                                                }}</p>
                                        </div>
                                        <div>
                                            <i class="bi bi-person-circle" style="font-size: 36px;"></i>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header text-capitalize">{{ Auth::user()->nama }}</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">
                @yield('content')
            </div>
            <footer style="padding: 0 2rem;">
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Kelurahan Kabayan</p>
                    </div>
                    <div class="float-end">
                        <p>Sistem Informasi Pengaduan Masyarakat</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('/js/app.js') }}"></script>

    <script src="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('/js/main.js') }}"></script>
    @yield('js')
</body>

</html>