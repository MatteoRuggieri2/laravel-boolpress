@extends('layouts.dashboard')

@section('content')
    
    {{-- Dashboard --}}
    <h1>Benvenuto {{ $user->name }} nella dashboard</h1>
    
    @if ($userInfo)
        <h3>I tuoi dati:</h3>
        <h5>Email: {{ $user->email }}</h5>
        <h5>Phone: {{ $userInfo->phone }}</h5>
        <h5>Address: {{ $userInfo->address }}</h5>
    @endif

@endsection