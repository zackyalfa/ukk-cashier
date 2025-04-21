@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="main-content-table">
    <section class="section">
        <div class="margin-content">
            <div class="container-sm">
                <div class="section-header">
                    <h1>Selamat Datang, {{ substr(auth()->user()->name, 0, 15) }}!</h1>
                </div>

                <div class="row mt-4">
                    <!-- Kartu Produk -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card card-statistic-1 shadow-lg animated-card">
                            <div class="card-icon bg-gradient-success text-white">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Produk</h4>
                                </div>
                                <div class="card-body">
                                    {{ $productCount }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kartu Penjualan -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card card-statistic-1 shadow-lg animated-card">
                            <div class="card-icon bg-gradient-warning text-white">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Penjualan</h4>
                                </div>
                                <div class="card-body">
                                    {{ $salesCount }}
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (auth()->user()->role == 'superadmin')
                    <!-- Kartu User -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card card-statistic-1 shadow-lg animated-card">
                            <div class="card-icon bg-gradient-primary text-white">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>User</h4>
                                </div>
                                <div class="card-body">
                                    {{ $userCount }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Kartu Member -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card card-statistic-1 shadow-lg animated-card">
                            <div class="card-icon bg-gradient-danger text-white">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Member</h4>
                                </div>
                                <div class="card-body">
                                    {{ $memberCount }}
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
