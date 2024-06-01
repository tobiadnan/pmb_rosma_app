@extends('layout.dashboard-layout')

@section('title')
    Register - PMB
@endsection
<!--Main layout-->
@section('content')
    <div class="position-fixed end-0 px-3" style="width: 50%; z-index: 1050;display: none;" id="alertContainer">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <!-- Section: Tabel list camaba -->
    <section class="mb-4">
        <div class="card">
            <div class="card-header py-3">
                <h5 class="mb-0 text-center"><strong>Belum Konfirmasi Pendaftaran</strong></h5>
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
