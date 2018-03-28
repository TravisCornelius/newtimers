<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Craft Axe Timers</title>
        <base href="{{URL::asset('/')}}" target="_blank"/>
        <link rel="stylesheet" href="{{ url( 'css/bootstrap.css')}}">
        <script src="{{url('js/jquery.js')}}"></script>

    </head>
    <body>
    @yield('content')
    <script src="{{url('js/bootstrappoppers.js')}}"></script>
    <script src="{{url('js/bootstrap.js')}}"></script>
    </body>
</html>
