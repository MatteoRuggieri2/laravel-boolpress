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
    
    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Title</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection