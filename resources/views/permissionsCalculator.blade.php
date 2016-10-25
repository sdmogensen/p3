@extends('layouts.master')

@section('body')
    <a href='/'>&larr; Back</a>
    <h1>UNIX Permissions Calculator</h1>
    <div class='stronger'>Permission bits</div>
    <form method='POST' action='/permissions-calculator'>
        {{ csrf_field() }}
        <table><tr><td>
            <fieldset><legend class='strong'>Special</legend>
                <label><input type='checkbox' name='input[0]' {{ old('input.0') ? 'checked' : '' }}>setuid</label><br>
                <label><input type='checkbox' name='input[1]' {{ old('input.1') ? 'checked' : '' }}>setgid</label><br>
                <label><input type='checkbox' name='input[2]' {{ old('input.2') ? 'checked' : '' }}>Sticky bit</label>
            </fieldset>
        </td><td>
            <fieldset><legend class='strong'>User</legend>
                <label><input type='checkbox' name='input[3]' {{ old('input.3') ? 'checked' : '' }}>Read</label><br>
                <label><input type='checkbox' name='input[4]' {{ old('input.4') ? 'checked' : '' }}>Write</label><br>
                <label><input type='checkbox' name='input[5]' {{ old('input.5') ? 'checked' : '' }}>Execute</label>
            </fieldset>
        </td><td>
            <fieldset><legend class='strong'>Group</legend>
                <label><input type='checkbox' name='input[6]' {{ old('input.6') ? 'checked' : '' }}>Read</label><br>
                <label><input type='checkbox' name='input[7]' {{ old('input.7') ? 'checked' : '' }}>Write</label><br>
                <label><input type='checkbox' name='input[8]' {{ old('input.8') ? 'checked' : '' }}>Execute</label>
            </fieldset>
        </td><td>
            <fieldset><legend class='strong'>Other</legend>
                <label><input type='checkbox' name='input[9]' {{ old('input.9') ? 'checked' : '' }}>Read</label><br>
                <label><input type='checkbox' name='input[10]' {{ old('input.10') ? 'checked' : '' }}>Write</label><br>
                <label><input type='checkbox' name='input[11]' {{ old('input.11') ? 'checked' : '' }}>Execute</label>
            </fieldset>
        </td></tr></table>
        <br>
        <input type='submit' class='button' value='Generate Absolute Notation (octal)'>
    </form>
    {!! $errors !!}
    <br>
    <div class='octal'> {{ $octal }} </div>
@endsection
