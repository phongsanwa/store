<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('store_backend/images/favicon.ico')}}">

    <link rel="stylesheet" href="{{ asset('store_frontend/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('store_frontend/css/plugin/owl.carousel.min.2.3.4.css') }}">
    <link rel="stylesheet" href="{{ asset('store_frontend/css/plugin/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('store_frontend/css/plugin/font-awesome.min.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    {{--Styles custom--}}
    @yield('styles')
</head>

<body data-topbar="dark">
    <main class="wrapper-content">
        @yield('contents')
    </main>
<!-- JAVASCRIPT -->
<script src="{{ asset('store_frontend/js/plugin/jquery.min.js') }}"></script>
<script src="{{ asset('store_frontend/js/plugin/owl.carousel.min.js') }}"></script>

<!-- JS Plugins Init. -->
<script src="{{ asset('store_frontend/js/main.js') }}"></script>
{{--Scripts link to file or js custom--}}
@yield('scripts')

</body>

</html>
