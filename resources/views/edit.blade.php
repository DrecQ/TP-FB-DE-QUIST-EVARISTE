<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
<div class="container">
    <h1>Modifier l'article</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea class="form-control" id="content" name="content" rows="5">{{ old('content', $post->content) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

