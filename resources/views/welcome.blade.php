@extends('layouts.master')

@section('body')

    <h1>Developer's Best Friend</h1>
    <br>
    <a href='/lorem-ipsum'><h2>Lorem Ipsum Generator</h2></a>
    <p>Create random filler text.</p>
    <br>
    <a href='/user-generator'><h2>Random User Generator</h2></a>
    <p>Create random user data.</p>
    <br>
    <a href='/password-generator'><h2>XKCD Password Generator</h2></a>
    <p>Generate an XKCD style password.</p>
    <br>
    <a href='/permissions-calculator'><h2>UNIX Permissions Calculator</h2></a>
    <p>Convert to or decode the octal representation of the UNIX permissions bits.</p>

@endsection
