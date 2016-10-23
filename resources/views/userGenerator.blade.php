@extends('layouts.master')

@section('body')
    <a href='/'>&larr; Back</a>
    <h1>Random User Generator</h1>
    <form method='POST' action='/user-generator'>
        {{ csrf_field() }}
        <label class='strong' for='users'>How many users?</label>
        <input type='text' class='input' name='numberOfUsers'
            value='{{ old('numberOfUsers') }}' maxlength='2'
            id='users' autofocus> (Max: 99)
        <br>
        <input type='checkbox' name= 'birthdate' id='birthdate' {{ old('birthdate') ? 'checked' : '' }}>
        <label for='birthdate'>Include birthdate?</label>
        <br>
        <input type='checkbox' name= 'profile' id='profile' {{ old('profile') ? 'checked' : '' }}>
        <label for='profile'>Include profile?</label>
        <br><br>
        <input type='submit' class='button' value='Generate Random Users'>
    </form>

    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
            <p class='error'>{{ $error }}</p>
        @endforeach
    @endif

    {!! $users !!}

@endsection
