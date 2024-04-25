@extends('layout.dashboard-layout')

@section('title', 'Daftar Ulang - ')

@section('nama'){{ $profile->nama_d }}@endsection

@section('content')
    This is {{ $profile->nama_d }}'s registration page
@endsection
