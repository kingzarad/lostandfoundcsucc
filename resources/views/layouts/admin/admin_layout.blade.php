<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'LSFC')</title>
    @include('layouts.admin.libs.csslib')
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
    @include('layouts.admin.libs.jslib')
</body>

</html>
