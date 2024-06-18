@extends('layout.post-layout')

@section('content')
    <div class="container text-justify justify-content-center m-25">
        <div class="row my-5 justify-content-center">

            <div class="d-flex justify-content-center">
                <h2>Category {{ $category->name }}</h2>
            </div>
            <form action="{{ route('categories', $category->slug) }}" class="d-flex ms-auto p-2" role="search">
                <input class="form-control form-control-sm me-2" type="search" placeholder="Cari Artikel" aria-label="Search"
                    name="search" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                {{-- <button class="btn btn-primary btn-sm" type="submit">Search</button> --}}
            </form>
            <b>
                <hr>
            </b>
            @foreach ($posts as $post)
                <div class="col-md-3 mt-4">
                    @if ($post->image)
                        <div>
                            <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid"
                                style="border-radius: 5px;">
                        </div>
                    @else
                        <img src="https://picsum.photos/600/400" alt="" class="img-fluid"
                            style="border-radius: 5px">
                    @endif
                </div>
                <div class="col-md-8 mt-4">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/{{ $post->slug }}"
                                style="text-decoration:none">{{ $post->title }}</a></h5>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
