<!doctype html>

<head>
    @include('Admin.Layout.Component.head')

    @yield('css')
</head>

<body>
    @include('Admin.Layout.Component.sidebar')

    <div id="right-panel" class="right-panel">

        @include('Admin.Layout.Component.header')

        @include('Admin.Layout.Component.breadcrumb')

        @yield('content')

        @include('Admin.Layout.Component.footer')

        @yield('js')
    </div>
</body>

</html>
