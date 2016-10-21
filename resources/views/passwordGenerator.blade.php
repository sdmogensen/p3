@extends('layouts.master')

@section('body')
    <a href='/'>&larr; Back</a>
    <h1>XKCD Password Generator</h1>
    <form method='POST' action='/password-generator'>
        {{ csrf_field() }}
        <label class='strong' for='words'> Number of words </label>
        <input type='text' class='input' name='numberOfWords'
            value='{{ $numberOfWords or '' }}' maxlength='1'
            id='words' autofocus> (Max: 9)
        <br>
        <input type='checkbox' name= 'number' id='number' {{ @$number? 'checked' : '' }}>
        <label for='number'>Add a number?</label>
        <br>
        <input type='checkbox' name= 'symbol' id='symbol' {{ @$symbol? 'checked' : '' }}>
        <label for='symbol'>Add a symbol?</label>
        <br><br>
        <input type='submit' class='button' value='Generate Password'>
    </form>

    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
            <p class='error'>{{ $error }}</p>
        @endforeach
    @endif
    
    {!! $password or '' !!}

@stop
