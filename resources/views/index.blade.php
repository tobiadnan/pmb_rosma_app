@extends('layout.post-layout')

@section('content')
    <div class="container text-justify justify-content-center m-25">
        <div class="row mt-5">
            <div class="d-flex justify-content-center">
                <h2>{{ $page }}</h2>
            </div>
            <form action="{{ route('posts') }}" class="d-flex ms-auto p-2" role="search">
                <input class="form-control form-control-sm me-2" type="search" placeholder="Cari Artikel" aria-label="Search"
                    name="search" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                {{-- <button class="btn btn-primary btn-sm" type="submit">Search</button> --}}
            </form>

            <b>
                <hr>
            </b>

            @foreach ($posts as $post)
                <div class="col-md-4 ">
                    <div class="card mb-3">
                        @if ($post->image)
                            <div style="max-height: 200px; overflow:hidden">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid"
                                    style="border-radius: 5px;">
                            </div>
                        @else
                            <div>
                                <img src="https://picsum.photos/1200/600" alt="" class="img-fluid"
                                    style="border-radius: 5px">
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title"><a href="/{{ $post->slug }}"
                                    style="text-decoration: none">{{ $post->title }}</a></h5>
                            <p class="card-text">
                                {{ $post->excerpt }}
                            </p>
                            <p class="card-text">
                                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center my-2 paginaton">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
