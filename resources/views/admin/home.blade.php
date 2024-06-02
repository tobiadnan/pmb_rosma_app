@extends('layout.dashboard-layout')

@section('title')
    Dashboard - PMB
@endsection
@section('style')
    <style>
        .card-link:hover .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        }
    </style>
@endsection
<!--Main layout-->
@section('content')
    <!--Section: card total registewr-->
    <section>
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                <a href="{{ route('admin.all_register') }}" class="card-link text-decoration-none">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div class="align-self-center">
                                    <i class="far fa-user text-success fa-3x"></i>
                                </div>
                                <div class="text-end">
                                    <h2>{{ $totalPendaftar }}</h2>
                                    <p class="mb-0">Sudah Terverifikasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                <a href="{{ route('admin.waiting_verif') }}" class="card-link text-decoration-none">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div class="align-self-center">
                                    <i class="far fa-user text-danger fa-3x"></i>
                                </div>
                                <div class="text-end">
                                    <h2>{{ $totalBelumApprove }}</h2>
                                    <p class="mb-0">Menunggu Verifikasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                <a href="{{ route('admin.unconfirmed') }}" class="card-link text-decoration-none">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div class="align-self-center">
                                    <i class="far fa-user text-primary fa-3x"></i>
                                </div>
                                <div class="text-end">
                                    <h2>{{ $totalBelumVerifikasi }}</h2>
                                    <p class="mb-0">Belum Konfirmasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                <a href="{{ route('admin.unuploaded') }}" class="card-link text-decoration-none">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div class="align-self-center">
                                    <i class="far fa-user text-warning fa-3x"></i>
                                </div>
                                <div class="text-end">
                                    <h2>{{ $totalBelumUnggahBerkas }}</h2>
                                    <p class="mb-0">Belum Unggah Berkas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!--Section: card total registewr-->

    <!-- Section: Tabel list camaba -->
    <section class="mb-4">
        <div class="card">
            <div class="card-header py-3">
                <h5 class="mb-0 text-center"><strong>Data Pendaftar</strong></h5>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
    <!-- Section: Tabel list camaba -->
    <!--Main layout-->
@endsection

@section('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endsection
