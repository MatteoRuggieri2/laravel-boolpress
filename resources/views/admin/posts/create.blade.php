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
    <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')

        {{-- Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
        </div>

        {{-- Categories --}}
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Nessuna</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Tags --}}
        <div class="mb-3">
            <span>Tags</span>
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} class="form-check-input" name="tags[]" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}">
                    <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
            @endforeach
        </div>

        {{-- Cover --}}
        <div class="mb-3">
            <label for="image" class="form-label">Cover</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>

        {{-- Content --}}
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" placeholder="Content" cols="30" rows="10">{{ old('content') }}</textarea>
        </div>
        
        {{-- Create Btn --}}
        <button type="submit" class="btn btn-primary">Crea post</button>
    </form>

@endsection