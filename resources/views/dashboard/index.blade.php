@extends('layouts.dashboard')

@section('styles')
<link rel="stylesheet" href="assets/css/shared/iconly.css">
@endsection

@section('content')
<div class="page-heading">
  <h3>{{ $title }}</h3>
</div>
<div class="page-content">
  <section class="row">
    <div class="col-12">
      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                  <div class="stats-icon purple mb-2">
                    <i class="iconly-boldDocument"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold">Pengaduan Selesai</h6>
                  <h6 class="font-extrabold mb-0">{{ $count['pengaduan_selesai'] }}</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                  <div class="stats-icon blue mb-2">
                    <i class="iconly-boldDocument"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold">Pengaduan Proses</h6>
                  <h6 class="font-extrabold mb-0">{{ $count['pengaduan_proses'] }}</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                  <div class="stats-icon purple mb-2">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold">
                    Jumlah Users
                  </h6>
                  <h6 class="font-extrabold mb-0">{{ $count['users'] }}</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                  <div class="stats-icon blue mb-2">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold">Jumlah User Masyarakat</h6>
                  <h6 class="font-extrabold mb-0">{{ $count['masyarakat'] }}</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                  <div class="stats-icon green mb-2">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold">Jumlah User Staff</h6>
                  <h6 class="font-extrabold mb-0">{{ $count['staff'] }}</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                  <div class="stats-icon red mb-2">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold">Jumlah User Admin</h6>
                  <h6 class="font-extrabold mb-0">{{ $count['admin'] }}</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>
@endsection

@section('js')
<!-- Need: Apexcharts -->
<script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="assets/js/pages/dashboard.js"></script>
@endsection