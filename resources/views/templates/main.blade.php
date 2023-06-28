<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Presto.it</title>
    <link rel="icon" href="favicon.ico" >
    @vite(['resources\css\app.css', 'resources\js\app.js'])
    @livewireStyles
</head>

<body>

    <x-navbar />
    {{ $slot }}
    @livewireScripts
</body>
</html>
