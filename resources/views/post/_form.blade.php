<form method="post" action="{{ $post ? route('post.update', $post) : route('post.store') }}"
    enctype="multipart/form-data">
    @csrf
    @if ($post)
        @method('PUT')
        <input type="hidden" name="id" value="{{ $post->id }}">
    @endif
    <div class="row d-grid">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" class="form-control"
                value="{{ $post ? $post->name : old('name', $post->name ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genero</label>
            <input type="text" name="genre" id="genre" class="form-control"
                value="{{ $post ? $post->genre : old('genre', $post->genre ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">
                Descrição
            </label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $post->description ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">
                Filme ou Série
            </label>
            <select class="form-select" aria-label="Selecione" name="Tipo">
                <option value="movie" {{ $post->type == 'movie' ? 'selected' : '' }}>Filme</option>
                <option value="series" {{ $post->type == 'series' ? 'selected' : '' }}>Série</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="director" class="form-label">Diretor</label>
            <input type="text" name="director" id="director" class="form-control"
                value="{{ $post ? $post->director : old('director', $post->director ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="release_date" class="form-label">Data de Lançamento</label>
            <input type="date" class="form-control" id="release_date" name="release_date" value="{{ \Carbon\Carbon::parse($post->release_date)->format('Y-m-d') }}">
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duração (minutos)</label>
            <input type="text" name="duration" id="duration" class="form-control"
                value="{{ $post ? $post->duration : old('duration', $post->duration ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Sua avaliação (nota de 1 a 5)</label>
            <input type="text" name="rating" id="rating" class="form-control"
                value="{{ $post ? $post->rating : old('rating', $post->rating ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="poster_image" class="form-label">Imagem do Poster (salvar link)</label>
            <input type="text" name="poster_image" id="poster_image" class="form-control"
                value="{{ $post ? $post->poster_image : old('poster_image', $post->poster_image ?? '') }}">
        </div>

        <div class="form-actions text-right">
            <button type="submit" class="btn btn-success button-save-form ladda-button" data-style="zoom-out">
                <i class="la la-check-square-o"></i> Salvar
            </button>
        </div>
    </div>
</form>
