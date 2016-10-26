@extends('layouts.master')

@section('body')
    <a href='/'>&larr; Back</a>
    <h1>XKCD Password Generator</h1>
    <form method='POST' action='/password-generator'>
        {{ csrf_field() }}
        <label class='strong'>Number of words
            <input type='text' class='input' name='numberOfWords'
            value='{{ old('numberOfWords') }}' maxlength='1' autofocus>
        </label>(Max: 9)
        <br>
        <label>
            <input type='checkbox' name= 'number' {{ old('number') ? 'checked' : '' }}>Add a number?
        </label><br>
        <label>
            <input type='checkbox' name= 'symbol' {{ old('symbol') ? 'checked' : '' }}>Add a symbol?
        </label><br><br>
        <input type='submit' class='button' value='Generate Password'>
    </form>

    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class='error'>{{ $error }}</div>
        @endforeach
    @endif

    {!! $password !!}

@endsection
