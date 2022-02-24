@extends('layouts.dashboard')

@section('content')

    <h1>Lista delle categorie</h1>
    
    {{-- Categories list --}}
    <div class="list-group">
        
        @forelse ($categories as $category)
            <a href="#" class="list-group-item list-group-item-action">{{ $category->name }}</a>
        @empty
            Non ci sono categorie
        @endforelse
    </div>

@endsection