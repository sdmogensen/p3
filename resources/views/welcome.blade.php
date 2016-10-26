@extends('layouts.master')

@section('body')

    <h1>Developer's Best Friend</h1>
    <br>
    <a href='/lorem-ipsum'><h2>Lorem Ipsum Generator</h2></a>
    <div>Create random filler text.</div>
    <br>
    <a href='/user-generator'><h2>Random User Generator</h2></a>
    <div>Create random user data.</div>
    <br>
    <a href='/password-generator'><h2>XKCD Password Generator</h2></a>
    <div>Generate an XKCD style password.</div>
    <br>
    <a href='/permissions-calculator'><h2>UNIX Permissions Calculator</h2></a>
    <div>Encode or decode the octal representation of the UNIX permissions bits.</div>

@endsection
