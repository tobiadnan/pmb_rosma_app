@extends('layout.dashboard-layout')

@section('title')
    Dashboard - PMB
@endsection
<!--Main layout-->
@section('content')
    <!--Section: card total registewr-->
    <section>
        <div class="row">
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-md-1">
                            <div class="d-flex flex-row">
                                <div class="align-self-center">
                                    <i class="far fa-user text-info fa-3x me-4"></i>
                                </div>
                                <div>
                                    <h4>Total Pendaftar</h4>
                                    <p class="mb-0">Calon mahasiswa yang sudah melakukan pendaftaran</p>
                                </div>
                            </div>
                            <div class="align-self-center">
                                <h1 class="h1 mb-0">{{ $totalPendaftar }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between px-md-1">
                            <div class="align-self-center">
                                <i class="far fa-user text-warning fa-3x"></i>
                            </div>
                            <div class="text-end">
                                <h2>{{ $totalBelumVerifikasi }}</h2>
                                <p class="mb-0">Belum Konfirmasi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-4">
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
            </div>
        </div>
    </section>
    <!--Section: card total registewr-->

    <!-- Section: Tabel list camaba -->
    <section class="mb-4">
        <div class="card">
            <div class="card-header py-3">
                <h5 class="mb-0 text-center"><strong>Data Calon Mahasiswa</strong></h5>
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
    <script></script>
    {{-- <script>
        $(document).ready(function() {
            $('#profiles-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.home') }}',
                columns: [{
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    }, // Kolom Nomor (No)
                    {
                        data: 'nama_d',
                        name: 'nama'
                    }, // Kolom Nama Mahasiswa
                    {
                        data: 'profiles.created_at',
                        name: 'created_at'
                    }, // Kolom Tanggal Registrasi
                    {
                        data: 'prodi',
                        name: 'prodi'
                    }, // Kolom Prodi
                    {
                        data: 'jalur',
                        name: 'jalur'
                    }, // Kolom Jalur
                    {
                        data: 'status',
                        name: 'status'
                    } // Kolom Status
                ],
                rowCallback: function(row, data, index) {
                    var table = $('#profiles-table').DataTable();
                    var currentPage = table.page();
                    var number = index + 1 + (currentPage * table.page.len());
                    $('td:eq(0)', row).html(number);
                }
            });
        });
    </script> --}}
@endsection
