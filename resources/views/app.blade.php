<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{mix('/css/app.css')}}">
        <link href="{{ mix('/css/vuexy.css') }}" rel="stylesheet">
        <script src="{{mix('/js/app.js')}}" defer></script>
        <title>Laravel</title>
        @routes
    </head>
    <body class="antialiased font-sans text-gray-700">
        @inertia
    </body>
</html>
