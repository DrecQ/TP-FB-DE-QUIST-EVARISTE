<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div class="container">
    <h1>Liste des articles</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Créer un nouvel article</a>

    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Réactions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td><strong>{{ $post->comments_count }} commentaire(s)</strong></td>
                    <td>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
</div>

