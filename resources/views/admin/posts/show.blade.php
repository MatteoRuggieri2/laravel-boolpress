@extends('layouts.dashboard')

@section('content')
    
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">{{ $post->title }}</h1>
            <h4 class="card-subtitle mb-2 text-muted">Slug: {{ $post->slug }}</h4>
            <p class="card-text">{{ $post->content }}</p>
            <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="card-link">Modifica</a>
            <a href="#" class="card-link">Elimina</a>
        </div>
    </div>

@endsection