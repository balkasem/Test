@extends('layouts.master')

@section('title')
    {{ $name }}
@endsection

@push('head')
    {{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
    <link href='/css/books/show.css' type='text/css' rel='stylesheet'>
@endpush

@section('content')
    <h1>{{ $name }}</h1>

    <p>
        Details about this refugee will go here... {{ $name }}
    </p>
@endsection