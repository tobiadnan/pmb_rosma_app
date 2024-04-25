@extends('layout.dashboard-layout')

@section('title', 'Home - ')

@section('nama'){{ $profile->nama_d }}@endsection
@section('style')

@endsection
@section('content')
    <div class="position-fixed end-0 px-3" style="width: 50%;" id="custom-alert">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Perhatian!!</strong> Hi {{ $profile->nama_d }}, Sepertinya kamu belum menyelesaikan registrasi. Pastikan
            kamu sudah melengkapi dan memilih jalur dan program studi yang sesuai dan klik "Selesaikan Daftar" yah..
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <div class="p-3">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/profiles/' . $profile->profile_pict) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $profile->nama_d }} {{ $profile->nama_b }}</h5>
                <p class="card-text">Pastikan kamu sudah melengkapi dan memilih jalur dan program studi yang sesuai dan
                    lakukan pembayaran administrasi yah...</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">An item</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                var alertElement = document.getElementById('custom-alert');
                alertElement.remove();
            }, 5000); // 5000 milliseconds = 5 detik
        });
    </script>
@endsection
