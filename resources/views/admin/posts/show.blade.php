@extends('layouts.dashboard')

@section('content')
    
    {{-- Single Card - SHOW --}}
    <div class="card">
        <div class="card-body">

            {{-- Title --}}
            <h1 class="card-title">{{ $post->title }}</h1>

            {{-- Slug --}}
            <h4 class="card-subtitle mb-2 text-muted">Slug: {{ $post->slug }}</h4>

            {{-- Category --}}
            <h5 class="card-subtitle mb-2 text-muted">Categoria: {{ $post->category ? $post->category->name : 'nessuna' }}</h5>

            {{-- Tags --}}
            <h5 class="card-subtitle mb-2 text-muted w-50">
                <span>Tags: </span>
                @forelse ($post->tags as $tag)
                    <a href="#" class="badge rounded-pill bg-light text-dark">{{ $tag->name }}</a>
                @empty
                    nessuno
                @endforelse
            </h5>

            {{-- Content --}}
            <p class="card-text">{{ $post->content }}</p>
            
            {{-- Buttons --}}
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