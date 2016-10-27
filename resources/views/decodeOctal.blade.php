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
    <div class='stronger'>Permissions (in octal notation)</div>
    <form method='POST' action='/permissions-calculator/decode'>
        {{ csrf_field() }}
        <input type='text' class='octalInput' name='octalCode' value='{{ old('octalCode') }}' maxlength='4' autofocus><br><br>
        <input type='submit' class='button' value='Show Permission Bits'>
    </form>

    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class='error'>{{ $error }}</div>
        @endforeach
    @endif
    {!! $bitErrors !!}<br>

    @if($bits)
        <table class='table'>
            <tr>
                <td class='tableHeader'>Special</td>
                <td class='tableHeader'>User</td>
                <td class='tableHeader'>Group</td>
                <td class='tableHeader'>Other</td>
            </tr>
            <tr>
                {!! $bits[0] ? '<td class=\'green\'>setuid is set</td>' : '<td class=\'red\'>setuid is unset</td>' !!}
                {!! $bits[3] ? '<td class=\'green\'>can read</td>' : '<td class=\'red\'>cannot read</td>' !!}
                {!! $bits[6] ? '<td class=\'green\'>can read</td>' : '<td class=\'red\'>cannot read</td>' !!}
                {!! $bits[9] ? '<td class=\'green\'>can read</td>' : '<td class=\'red\'>cannot read</td>' !!}
            </tr>
            <tr>
                {!! $bits[1] ? '<td class=\'green\'>setgid is set</td>' : '<td class=\'red\'>setgid is unset</td>' !!}
                {!! $bits[4] ? '<td class=\'green\'>can write</td>' : '<td class=\'red\'>cannot write</td>' !!}
                {!! $bits[7] ? '<td class=\'green\'>can write</td>' : '<td class=\'red\'>cannot write</td>' !!}
                {!! $bits[10] ? '<td class=\'green\'>can write</td>' : '<td class=\'red\'>cannot write</td>' !!}
            </tr>
            <tr>
                {!! $bits[2] ? '<td class=\'green\'>sticky bit is set</td>' : '<td class=\'red\'>sticky bit is unset</td>' !!}
                {!! $bits[5] ? '<td class=\'green\'>can execute</td>' : '<td class=\'red\'>cannot execute</td>' !!}
                {!! $bits[8] ? '<td class=\'green\'>can execute</td>' : '<td class=\'red\'>cannot execute</td>' !!}
                {!! $bits[11] ? '<td class=\'green\'>can execute</td>' : '<td class=\'red\'>cannot execute</td>' !!}
            </tr>
        </table>
    @endif

@endsection
