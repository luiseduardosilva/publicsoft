<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="/">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>
        <title>Laravel</title>
    </head>
    <body>
        <app-root></app-root>
        <script type="text/javascript" src="{{asset('js/runtime.js')}}">
        </script><script type="text/javascript" src="{{asset('js/es2015-polyfills.js')}}" nomodule>
        </script><script type="text/javascript" src="{{asset('js/polyfills.js')}}">
        </script><script type="text/javascript" src="{{asset('js/styles.js')}}">
        </script><script type="text/javascript" src="{{asset('js/vendor.js')}}">
        </script><script type="text/javascript" src="{{asset('js/main.js')}}">
        </script><script type="text/javascript" src="{{asset('js/jquery.mask.js')}}">
        </script>
    </body>
</html>
