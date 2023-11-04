<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>

    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/nav.css', 'resources/js/nav.js'])
</head>

<body>
    @yield('content')
    @stack('scripts')
    @include('sweetalert::alert')
    @vite('resources/js/app.js')

</body>
</body>

</html>
