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
                <h5 class="mb-0 text-center"><strong>Menunggu Verifikasi Admin</strong></h5>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
    <!-- Section: Tabel list camaba -->

    <!--Main layout-->

    {{-- modal --}}
    <div class="modal fade" id="appendixModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Verifikasi '<span id="nama"></span>'</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" id="appendixImage" class="img-fluid" alt="Gambar Lampiran">
                    <p><strong>Prodi:</strong> <span id="prodi"></span></p>
                    <p><strong>Jalur:</strong> <span id="jalur"></span></p>
                    <p><strong>Total Biaya:</strong> Rp. <span id="biaya"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}
@endsection
{{-- /storage/appendix_files/dIzRfT3WEcfQ8P7lndFLgSQnLqcebjl8oYuxdQhv.jpg --}}
@section('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        function openModal(totalBiaya, nama, prodi, jalur, id, ktp) {

            function formatAngka(angka) {
                return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

            var imageUrl = "{{ asset('storage/appendix_files/') }}" + "/" + ktp;
            console.log(imageUrl);

            document.getElementById('appendixImage').src = imageUrl;

            // Tampilkan informasi tambahan di dalam modal
            document.getElementById('nama').textContent = nama;
            document.getElementById('prodi').textContent = prodi;
            document.getElementById('jalur').textContent = jalur;
            document.getElementById('biaya').textContent = formatAngka(totalBiaya);

            // Tampilkan modal
            $('#appendixModal').modal('show');
        }
    </script>
@endsection
