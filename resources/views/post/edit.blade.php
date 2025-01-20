@extends('welcome')


@section('post.show')
    <div class="card">
        <div class="card-body">
            @include('post._form', ['post' => $post])
        </div>
    </div>
@endsection