<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', '/dashboard');
});

// Dashboard > Pengaduan
Breadcrumbs::for('pengaduan', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pengaduan', '/pengaduan');
});

// Dashboard > Pengaduan > Edit
Breadcrumbs::for('pengaduan.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('pengaduan');
    $trail->push('Edit', '/pengaduan/' . $id . '/edit');
});

// Dashboard > Masyarakat
Breadcrumbs::for('masyarakat', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Masyarakat', '/masyarakat');
});

// Dashboard > Masyarakat > Tambah
Breadcrumbs::for('masyarakat.create', function (BreadcrumbTrail $trail) {
    $trail->parent('masyarakat');
    $trail->push('Tambah', '/masyarakat/create');
});

// Dashboard > Masyarakat > Edit
Breadcrumbs::for('masyarakat.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('masyarakat');
    $trail->push('Edit', '/masyarakat/' . $id . '/edit');
});

// Dashboard > Admin
Breadcrumbs::for('admin', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Admin', '/admin');
});

// Dashboard > Admin > Tambah
Breadcrumbs::for('admin.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Tambah', '/admin/create');
});

// Dashboard > Admin > Edit
Breadcrumbs::for('admin.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin');
    $trail->push('Edit', '/admin/' . $id . '/edit');
});

// Dashboard > Staff
Breadcrumbs::for('staff', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Staff', '/staff');
});

// Dashboard > Staff > Tambah
Breadcrumbs::for('staff.create', function (BreadcrumbTrail $trail) {
    $trail->parent('staff');
    $trail->push('Tambah', '/staff/create');
});

// Dashboard > Staff > Edit
Breadcrumbs::for('staff.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('staff');
    $trail->push('Edit', '/staff/' . $id . '/edit');
});

// Pengaduan
Breadcrumbs::for('home.pengaduan', function (BreadcrumbTrail $trail) {
    $trail->push('Pengaduan', '/pengaduan');
});

// Pengaduan > Buat Pengaduan
Breadcrumbs::for('home.pengaduan.add', function (BreadcrumbTrail $trail) {
    $trail->parent('home.pengaduan');
    $trail->push('Buat Pengaduan', '/pengaduan/add');
});

// Pengaduan > Ubah laporan Pengaduan
Breadcrumbs::for('home.pengaduan.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('home.pengaduan');
    $trail->push('Ubah Laporan Pengaduan', '/pengaduan/' . $id . '/edit');
});