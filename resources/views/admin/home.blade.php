@extends('layouts.dashboard')

@section('content')
    
    <h1>Benvenuto {{ Auth::user()->name }} nella dashboard</h1>
    <h4>Phone: {{  }}</h4>

@endsection