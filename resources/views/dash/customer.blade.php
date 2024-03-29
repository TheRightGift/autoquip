<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{env('APP_NAME')}} | Dashboard - {{auth()->user()->name }} </title>

        <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/autoquip.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dash.css') }}">
        <link rel="stylesheet" href="{{ asset('fonts/material-icons.css') }}">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="app">       
            

            <dashboard-component></dashboard-component>
        </div>
        
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/materialize.min.js') }}"></script>
        <script src="{{ asset('js/autoquip.js') }}"></script>
    </body>
</html>
