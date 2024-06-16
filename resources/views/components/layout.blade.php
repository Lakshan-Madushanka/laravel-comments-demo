<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Comments Demo App</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css'])
    @commentsStyles
    <!-- Styles -->
    <style>
    </style>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<x-nav/>
<div class="max-w-screen-lg my-8 mx-auto p-2">
    {{$slot}}
</div>

@commentsScripts
</body>
</html>
