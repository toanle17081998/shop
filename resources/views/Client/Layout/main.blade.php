<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    @include('Client.Parts.head')
    @yield('css')
</head>

<body class="ssanimsition">

    @include('Client.Parts.header')

    @include('Client.Parts.cart')

    @yield('content')

    @include('Client.Parts.footer')

    @yield('js')
</body>

</html>
