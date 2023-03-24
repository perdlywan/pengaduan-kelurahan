<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Dashboard > Pengaduan
Breadcrumbs::for('pengaduan', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pengaduan', route('pengaduan.index'));
});