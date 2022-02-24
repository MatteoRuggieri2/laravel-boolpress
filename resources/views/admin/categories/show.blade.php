@extends('layouts.dashboard')

@section('content')

    <h1>{{$category->name}}</h1>
    
    {{-- Post list --}}
    <div class="row row-cols-3">

        @forelse ($posts as $post)

            {{-- Single Post --}}
            <div class="col">
                <div class="card mb-5">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::substr($post->content, 0, 120) }}...</p>
                        <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Vai al post</a>
                    </div>
                </div>
            </div>

        @empty
            <span>Non sono presenti post con questa categoria</span>
        @endforelse

    </div>

@endsection