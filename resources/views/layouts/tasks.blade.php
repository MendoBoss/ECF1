<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ECF_Tasks</title>
    @vite('resources/css/app.css')
</head>
<body style="width:100%">
    {{-- @include('task.header') --}}
    @yield('content')
    {{-- @include('task.footer') --}}

    @include('task.menu')

</body>
</html>