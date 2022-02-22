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
                        <p class="card-text">{{ Str::substr($post->content, 0, 120) }}...</p>
                        <a href="#" class="btn btn-primary">Vai al post</a>
                    </div>
                </div>
            </div>

        @empty
            <span>Non sono presenti post</span>
        @endforelse

    </div>

@endsection