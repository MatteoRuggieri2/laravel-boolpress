@extends('layouts.dashboard')

@section('content')
    
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">{{ $post->title }}</h1>
            <h4 class="card-subtitle mb-2 text-muted">Slug: {{ $post->slug }}</h4>
            <p class="card-text">{{ $post->content }}</p>
            <form class="card-link" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
                @csrf
                @method('DELETE')

                {{-- Edit Button --}}
                <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-outline-primary">Modifica</a>

                {{-- Delete Button --}}
                <button class="btn btn-outline-danger" onclick="return confirm('Sei sicuro di voler eliminare questo post?')">Elimina</button>
            </form>
        </div>
    </div>

@endsection