<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title')</title>
    <!-- Include CSS/JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    @include('layouts.partials.user-nav')

    <div class="container">
        @yield('content')
    </div>
</body>
</html>

