<link rel="stylesheet" href="{{ asset('css/create.css') }}">
<div class="container">
    <h1>Créer un nouvel article</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea class="form-control" id="content" name="content" rows="5">{{ old('content') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>

