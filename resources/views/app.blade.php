<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <title>Laravel Vue Auth</title>
    </head>
    <body class="bg-gray-200">
        <div id="app"></div>

        <script type="text/javascript">
            var BASE_URL = "{{ URL::to('/') }}/api";
        </script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
