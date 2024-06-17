@extends('layout.dashboard-layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h2>Semua Post</h2>

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <a class="btn btn-primary mb-4" href="/admin/posts/create" role="button"><i
                                class="fa-solid fa-plus"></i> Tambah Post</a>
                        <table id="table_id" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $post->title }}</td>
                                        {{-- <td>{{ $post->category->name }}</td> --}}
                                        <td>
                                            <a class="btn btn-primary btn-sm mb-1" href="/admin/posts/{{ $post->slug }}"
                                                role="button"><i class="fa-solid fa-eye"></i></a>

                                            <a class="btn btn-warning btn-sm mb-1"
                                                href="/admin/posts/{{ $post->slug }}/edit" role="button"><i
                                                    class="fa-solid fa-pen-to-square fa-fw me-3"></i></a>

                                            <form action="/admin/posts/{{ $post->slug }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-sm mb-1"
                                                    onclick="return confirm('Apakah Yakin Ingin Menghapus Post ?')"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
