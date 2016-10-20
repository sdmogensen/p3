@extends('layouts.master')

@section('body')
        <a href='/'>&larr; Back</a>
        <h1>Lorem Ipsum Generator</h1>
        <form method='POST' action='/lorem-ipsum'>
            {{ csrf_field() }}
            <label for='paragraphs'>How many paragraphs?</label>
    		<input type='text' class='input' name='numberOfParagraphs'
                value='{{ $numberOfParagraphs or '' }}' maxlength='2'
                id='paragraphs' autofocus> (Max: 99)
            <br><br>
            <input type='submit' class='button' value='Generate Lorem Ipsum'>
        </form>

        @if(count($errors) > 0)
            @foreach ($errors->all() as $error)
                <p class='error'>{{ $error }}</p>
            @endforeach
        @endif

        {!! $text  or '' !!}
@stop
