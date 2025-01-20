@extends('welcome')

@section('posts')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Genero</th>
                <th scope="col">Diretor</th>
                <th scope="col">Recomendo</th>
                <th scope="col">Não Recomendo</th>
                <th scope="col">Ações</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->genre }}</td>
                    <td>{{ $post->director }}</td>
                    <td>{{ $post->vote->up_vote }}</td>
                    <td>{{ $post->vote->down_vote }}</td>
                    <td class="align-middle">
                        <a class="btn btn-primary" title="Editar" href="{{ route('post.edit', ['id' => $post->id]) }}"> <i class="bi bi-pencil-fill"></i></a>
                        <a class="btn btn-danger" title="Excluir" href="{{ route('post.destroy', ['id' => $post->id])}}"><i class="bi bi-trash-fill"></i></a>
                        <a class="btn btn-warning" title="Copncluir"><i class="bi bi-lock-fill"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
