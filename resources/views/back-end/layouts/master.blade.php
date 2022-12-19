<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title') - Dason</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    @yield('meta')
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('store_frontend/img/logo-sm.svg')}}">
    <!-- Bootstrap Css -->
    <link href="{{ asset('store_backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('store_backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('store_backend/css/fontAwesome/fontawesome.5.15.3.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- DataTable css -->
    <link href="{{ asset('store_backend/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('store_backend/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('store_backend/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('store_backend/css/style.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    {{--Styles custom--}}
    @yield('styles')

</head>

<body data-topbar="dark">
    <div id="layout-wrapper">
        @include('back-end.layouts.header')
        @include('back-end.layouts.vertical-menu')
        <div class="main-content">
            @yield('content')
            @include('back-end.layouts.footer')
        </div>
        @include('back-end.layouts.right-bar')
    </div>
    <div class="overlay-block"></div>
    <!-- JAVASCRIPT -->

    <script src="{{ asset('store_frontend/js/plugin/jquery.min.js') }}"></script>
    <script src="{{ asset('store_backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('store_backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('store_backend/js/jquery.number.min.js') }}"></script>
    <script src="{{ asset('store_backend/js/metisMenu.min.js') }}"></script>
    {{--    <script src="{{ asset('store_backend/js/simplebar.min.js') }}"></script>--}}
    <script src="{{ asset('store_backend/js/waves.min.js') }}"></script>
    <script src="{{ asset('store_backend/js/feather.min.js') }}"></script>
    <script src="{{ asset('store_backend/js/ckeditor/4.1/ckeditor.js') }}"></script>
    <!-- DataTable js -->
    <script src="{{ asset('store_backend/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('store_backend/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('store_backend/js/app.js') }}"></script>
    <script src="{{ asset('store_backend/js/main.js') }}"></script>
    @yield('scripts')
</body>
</html>
