@extends('layouts.master')

@section('body')
    <a href='/'>&larr; Back</a>
    <h1>UNIX Permissions Calculator</h1>
    <table>
        <tr>
            <td><a href='/permissions-calculator' class='stronger'>Encode Octal</a></td>
            <td>&nbsp;</td>
            <td><a href='/permissions-calculator/decode' class='stronger'>Decode Octal</a></td>
        </tr>
    </table><br>
    <div class='stronger'>Permission bits</div>
    <form method='POST' action='/permissions-calculator'>
        {{ csrf_field() }}
        <table>
            <tr>
                <td>
                    <fieldset><legend class='strong'>Special</legend>
                    <label><input type='checkbox' name='input[0]' {{ old('input.0') ? 'checked' : '' }}>setuid</label><br>
                    <label><input type='checkbox' name='input[1]' {{ old('input.1') ? 'checked' : '' }}>setgid</label><br>
                    <label><input type='checkbox' name='input[2]' {{ old('input.2') ? 'checked' : '' }}>sticky bit</label>
                    </fieldset>
                </td>
                <td>
                    <fieldset><legend class='strong'>User</legend>
                    <label><input type='checkbox' name='input[3]' {{ old('input.3') ? 'checked' : '' }}>read</label><br>
                    <label><input type='checkbox' name='input[4]' {{ old('input.4') ? 'checked' : '' }}>write</label><br>
                    <label><input type='checkbox' name='input[5]' {{ old('input.5') ? 'checked' : '' }}>execute</label>
                    </fieldset>
                </td>
                <td>
                    <fieldset><legend class='strong'>Group</legend>
                    <label><input type='checkbox' name='input[6]' {{ old('input.6') ? 'checked' : '' }}>read</label><br>
                    <label><input type='checkbox' name='input[7]' {{ old('input.7') ? 'checked' : '' }}>write</label><br>
                    <label><input type='checkbox' name='input[8]' {{ old('input.8') ? 'checked' : '' }}>execute</label>
                    </fieldset>
                </td>
                <td>
                    <fieldset><legend class='strong'>Other</legend>
                    <label><input type='checkbox' name='input[9]' {{ old('input.9') ? 'checked' : '' }}>read</label><br>
                    <label><input type='checkbox' name='input[10]' {{ old('input.10') ? 'checked' : '' }}>write</label><br>
                    <label><input type='checkbox' name='input[11]' {{ old('input.11') ? 'checked' : '' }}>execute</label>
                    </fieldset>
                </td>
            </tr>
        </table><br>
        <input type='submit' class='button' value='Generate Octal Notation'>
    </form>

    {!! $errors !!}<br>

    <div class='octal'> {{ $octal }} </div>

@endsection
