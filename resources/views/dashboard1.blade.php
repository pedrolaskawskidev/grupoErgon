@extends('welcome')


@section('posts')
    <h3>lllllllllllllllllllll</h3>
    {{ Auth::user()->name }}
    {{-- {{ $posts }} --}}
    {{-- @foreach ($posts as $post) --}}
    {{-- <div class="card" style="width: 18rem;">
        <img src="{{ $post->poster_image }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $post->name }}</h5>
            <p class="card-text">{{ $post->description }}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ $post->director }}</li>
            <li class="list-group-item">{{ $post->genre }}</li>
            <li class="list-group-item">{{ $post->release_date }}</li>
        </ul>
        <div class="card-body">
            <a href="#" class="card-link">{{ $post->rating }}k</a>
            <a href="#" class="card-link">{{ $post->type ? 'Filme' : 'Série' }}</a>
        </div>
    </div> --}}
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ $post->poster_image }}" class="card-img-top" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->name }}</h5>
                    <p class="card-text">{{ $post->description }}</p>
                    <p class="card-text">
                        <small class="text-body-secondary">{{ $post->director }}</small>
                    </p>
                    <p class="card-text">
                        <small class="text-body-secondary">{{ $post->genre }}</small>
                    </p>
                    <p class="card-text">
                        <small class="text-body-secondary">{{ $post->release_date }}</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
    {{-- {{dd($post)}} --}}
    {{-- @endforeach --}}
@endsection
