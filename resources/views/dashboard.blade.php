@extends('welcome')


@section('dashboard')
    @foreach ($posts as $post)
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <img src="{{ $post->poster_image }}" class="card-img-top rounded">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->name }}</h5>
                        <p class="card-text">{{ $post->description }}</p>
                        <div class="row justify-content-evenly">
                            <div class="col-md-5">
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
                            <div class="col-md-6 text-end p-2">
                                @if (!($post->closed == 1 && request()->url() == url('/dashboard') || ( $post->closed == 1 && request()->url() == url('/following'))))
                                    <div>
                                        <button type="button" class="btn vote-btn btn-outline-success btn-sm m-1"
                                            data-post-id="{{ $post->id }}" data-post-owner="{{ $post->owner->id }}"
                                            value="up_vote">Recomendo</button>
                                        <button type="button" class="btn vote-btn btn-outline-danger btn-sm m-1"
                                            data-post-id="{{ $post->id }}" data-post-owner="{{ $post->owner->id }}"
                                            value="down_vote">Não Recomendo</button>
                                        <div id="post-{{ $post->id }}">
                                            <button type="button" class="btn follow-btn btn-outline-primary btn-sm m-1"
                                                data-post-id="{{ $post->id }}"
                                                data-post-owner="{{ $post->owner->id }}">{{ $post->is_followed_by_auth == 1 ? 'Seguindo' : 'Seguir' }}</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row m-1">
                    <div class="text-end" id="post-{{ $post->id }}">
                        <span class="badge rounded-pill text-bg-success"><i class="bi bi-emoji-laughing-fill"></i> <span
                                class="up-vote-count"> {{ $post->vote->up_vote ?? 0 }}</span></span>
                        <span class="badge rounded-pill text-bg-danger"><i class="bi bi-emoji-angry-fill"></i> <span
                                class="down-vote-count"> {{ $post->vote->down_vote ?? 0 }}</span></span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('js')
    <script>
        $(document).on('click', '.vote-btn', function() {
            var vote_type = $(this).attr('value');
            var id_post = $(this).data('post-id');
            var post_owner = $(this).data('post-owner');
            var user_id = userId;

            $.ajax({
                url: '/posts/vote',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    vote_type: vote_type,
                    id_post: id_post,
                    owner_id: post_owner,
                    user_id: user_id,
                },
                success: function(response) {
                    $(`#post-${id_post} .up-vote-count`).text(response.up_vote);
                    $(`#post-${id_post} .down-vote-count`).text(response.down_vote);
                    $(`#post-${id_post} .follow-btn`).text('Seguindo');

                },
                error: function() {
                    alert('Erro ao registrar o voto. Tente novamente.');
                }
            });
        });

        $(document).on('click', '.follow-btn', function() {
            var id_post = $(this).data('post-id');
            var owner_id = $(this).data('post-owner');
            var user_id = userId;

            $.ajax({
                url: '/posts/follow',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id_post: id_post,
                    owner_id: owner_id,
                    user_id: user_id,
                },
                success: function(response) {
                    console.log(response.message)
                    $(`#post-${id_post} .follow-btn`).text('Seguindo');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status === 400) {
                        $(`#post-${id_post} .follow-btn`).text('Seguir');
                    } else {
                        alert('Erro desconhecido.')
                    }
                }
            });
        })
    </script>
@endpush
