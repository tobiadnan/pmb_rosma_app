@extends('layout.dashboard-layout')

@section('title')
    Register - PMB
@endsection
<!--Main layout-->
@section('content')
    <!-- Section: Tabel list camaba -->
    <section class="mb-4">
        <div class="card">
            <div class="card-header py-3">
                <h5 class="mb-0 text-center"><strong>Sudah Terverifikasi</strong></h5>
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
