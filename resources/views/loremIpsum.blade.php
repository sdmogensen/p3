@extends('layouts.master')

@section('body')
    <a href='/'>&larr; Back</a>
    <h1>Lorem Ipsum Generator</h1>
    <form method='POST' action='/lorem-ipsum'>
        {{ csrf_field() }}
        <label class='strong'>How many paragraphs?
            <input type='text' class='input' name='numberOfParagraphs'
            value='{{ old('numberOfParagraphs') }}' maxlength='2' autofocus>
        </label>(Max: 99)<br><br>
        <input type='submit' class='button' value='Generate Lorem Ipsum'>
    </form>

    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class='error'>{{ $error }}</div>
        @endforeach
    @endif

    {!! $text !!}

@endsection
