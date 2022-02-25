@extends('layouts.dashboard')

@section('content')
    
    <div class="row row-cols-3">

        @forelse ($posts as $post)

            {{-- Single Post --}}
            <div class="col">
                <div class="card mb-5">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">
                            @if ( strlen($post->content) > 120)
                                {{ Str::substr($post->content, 0, 120) }}...
                            @else
                                {{ $post->content }}
                            @endif
                        </p>
                        <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Vai al post</a>
                    </div>
                </div>
            </div>

        @empty
            <span>Non sono presenti post</span>
        @endforelse

    </div>

@endsection