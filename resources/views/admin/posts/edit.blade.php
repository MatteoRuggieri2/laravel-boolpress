@extends('layouts.dashboard')

@section('content')

    {{-- Form Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    {{-- Form --}}
    <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title', $post->title) }}">
        </div>

        {{-- Categories --}}
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Nessuna</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Tags --}}
        <div class="mb-3">
            <span>Tags</span>
            @foreach ($tags as $tag)
                <div class="form-check">

                    {{-- GESTIONE CHECKBOX
                    Se ci sono errori di validazione vuol dire che l'utente ha 
                    modificato il form, quindi metto 'checked' in base a 
                    ciò che si trova nella funzione "old", altrimenti metto 
                    quelli scelti in precedenza (es. alla creazione del post).
                    --}}
                    @if ($errors->any())
                        <input {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} class="form-check-input" name="tags[]" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}">
                    @else
                        <input {{ $post_tags->contains($tag) ? 'checked' : '' }} class="form-check-input" name="tags[]" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}">
                    @endif

                    <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
            @endforeach
        </div>

        {{-- Content --}}
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" placeholder="Content" cols="30" rows="10">{{ old('content', $post->content) }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Salva le modifiche</button>
    </form>

@endsection