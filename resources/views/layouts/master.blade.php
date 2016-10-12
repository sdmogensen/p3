<!DOCTYPE html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Developer's Best Friend' --}}
        @yield('title','Developer\'s Best Friend')
    </title>

    <meta charset='utf-8'>
    <link href="/css/foobooks.css" type='text/css' rel='stylesheet'>
    <link href="/css/styles.css" type='text/css' rel='stylesheet'>
    
    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>

    {{-- Main page content will be yielded here --}}
    @yield('body')

</body>
</html>
