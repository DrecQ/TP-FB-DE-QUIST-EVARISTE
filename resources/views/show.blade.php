<link rel="stylesheet" href="{{ asset('css/show.css') }}">
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <h2>Commentaires</h2>

    <ul>
        @foreach($post->comments as $comment)
            <li>
                <strong>{{ $comment->author_name }}</strong> : {{ $comment->content }}
                <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>

    <h3>Ajouter un commentaire</h3>
    <form action="{{ route('comments.store', $post) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="author_name">Nom</label>
            <input type="text" class="form-control" id="author_name" name="author_name" value="{{ old('author_name') }}">
        </div>
        <div class="form-group">
            <label for="content">Commentaire</label>
            <textarea class="form-control" id="content" name="content" rows="3">{{ old('content') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>

