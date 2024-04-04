<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'LSFC')</title>
    @include('layouts.admin.libs.csslib')

    @livewireStyles()
    <style>
        .image-container {
            width: 100%;
            height: 0;
            padding-bottom: 100%;
            /* This creates a square aspect ratio */
            position: relative;
            overflow: hidden;
        }

        .image-container img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ensures the image covers the container without stretching */
        }
    </style>
</head>

<body class="toggle-sidebxar">
    @if (!request()->is('admin/login') && !request()->is('admin/register'))
        @include('layouts.admin.navbar')
        @include('layouts.admin.sidebar')
    @endif

    @if (!request()->is('admin/login') && !request()->is('admin/register'))
        <main id="main" class="main ">
            @yield('content')
        </main><!-- End #main -->
    @else
        <main>
            @yield('content')
        </main><!-- End #main -->
    @endif
    @livewireScripts


    @include('layouts.admin.libs.jslib')

</body>

</html>
