@extends('layouts.master')

@section('body')
    <a href='/'>&larr; Back</a>
    <h1>Random User Generator</h1>
    <form method='POST' action='/user-generator'>
        {{ csrf_field() }}
        <label class='strong'>How many users?<input type='text' class='input' name='numberOfUsers'
            value='{{ old('numberOfUsers') }}' maxlength='2' autofocus></label> (Max: 99)
        <br>
        Include:
        <br>
        <label><input type='checkbox' name= 'company' {{ old('company') ? 'checked' : '' }}>Company name</label>
        <br>
        <label><input type='checkbox' name= 'birthdate' {{ old('birthdate') ? 'checked' : '' }}>Birthdate</label>
        <br>
        <label><input type='checkbox' name= 'address' {{ old('address') ? 'checked' : '' }}>Address</label>
        <br>
        <label><input type='checkbox' name= 'phoneNumber' {{ old('phoneNumber') ? 'checked' : '' }}>Phone number</label>
        <br>
        <label><input type='checkbox' name= 'email' {{ old('email') ? 'checked' : '' }}>Email</label>
        <br>
        <label><input type='checkbox' name= 'profile' {{ old('profile') ? 'checked' : '' }}>Profile</label>
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
