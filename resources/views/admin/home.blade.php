@extends('layouts.dashboard')

@section('content')
    
    <h1>Benvenuto {{ Auth::user()->name }} nella dashboard</h1>

@endsection