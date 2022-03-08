@extends('layouts.dashboard')

@section('content')
    
    <div class="row row-cols-3">

        @forelse ($posts as $post)

            {{-- Single Post --}}
            <div class="col">
                <div class="card mb-5">
                    @if ($post->cover)
                        <img src="{{ asset('storage/' . $post->cover) }}" class="card-img-top cover-img" alt="{{ $post->title }}">
                    @else
                        <div class="cover-not-found cover-img">{{ $post->title }}</div>
                    @endif
                    <div class="card-body">

                        {{-- Card Title --}}
                        <h5 class="card-title">{{ $post->title }}</h5>

                        {{-- Card Content --}}
                        <p class="card-text">
                            @if ( strlen($post->content) > 120)
                                {{ Str::substr($post->content, 0, 120) }}...
                            @else
                                {{ $post->content }}
                            @endif
                        </p>

                        {{-- Btn --}}
                        <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Vai al post</a>
                    </div>
                </div>
            </div>

        @empty
            <span>Non sono presenti post</span>
        @endforelse

        {{-- Pagination Buttons --}}
        {{ $posts->links() }}

    </div>

@endsection