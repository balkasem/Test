{{-- /resources/views/books/create.blade.php --}}
@extends('layouts.master')

@section('title')
    New book
@endsection

@section('content')
    <h1>Add a new refugee</h1>

    <form method='POST' action='/Test/public/Refugees'>
        {{ csrf_field() }}

        <fieldset>
            <label for='firstName'>First Name</label>
            <input type='text' name='firstName' id='firstName' value='{{ old('firstName') }}' >
            <label for='lastName'>Last Name</label>
            <input type='text' name='lastName' id='lastName' value='{{ old('lastName') }}' >

            <label for='firstName'>birth Year</label>
            <input type='text' name='birthYear' id='birthYear' value='{{ old('birthYear') }}' >
            <label for='firstName'>City</label>
            <input type='text' name='city' id='city' value='{{ old('city') }}' >
            <label for='firstName'>Cell Number</label>
            <input type='text' name='cell_phone' id='cell_phone' value='{{ old('cell_phone') }}' >
        </fieldset>

        <input type='submit' value='Add book'>
    </form>
    @if(count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection