<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="base-url" content="{{ env('APP_URL') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ @base_settings('company_name') }} - @yield('title')</title>
    @if (env('APP_ENV') == 'server')
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @endif
    <link rel="shortcut icon" href="{{ company_fav_icon(@base_settings('company_icon')) }}" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/vendors/') }}/fontawesome/css/all.min.css">
    <!-- Line Awesome -->
    <link rel="stylesheet" href="{{ asset('public/vendors/') }}/lineawesome/css/line-awesome.min.css">
    <!--  Bootstrap 5 -->
    <link rel="stylesheet" href="{{ asset('public/vendors/') }}/bootstrap/css/bootstrap.min.css">
    <!--  sweet-alert -->
    <link rel="stylesheet" href="{{ asset('public/vendors/') }}/sweet-alert/css/sweet-alert.min.css">
    <!-- style -->
    <link rel="stylesheet" href="{{ url('public/css/style.css') }}">


    <!-- plugin css -->
    <link href="{{ asset('public/theme/assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/theme/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
    <!-- end plugin css -->

    @stack('plugin-styles')

    <!-- common css -->
    <link href="{{ asset('public/theme/css/app.css') }}" rel="stylesheet" />
    <!-- end common css -->

    @stack('style')

</head>

<body>
    <!-- MAIN_CONTENT_START -->
    <div class="main-wrapper" id="app">
        <div class="page-wrapper full-page">
          @yield('content')
        </div>
      </div>


    <!-- base js -->
    <script src="{{ asset('public/theme/js/app.js') }}"></script>
    <script src="{{ asset('public/theme/assets/plugins/feather-icons/feather.min.js') }}"></script>
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('public/theme/assets/js/template.js') }}"></script>
    <!-- end common js -->

    @stack('custom-scripts')



    <!--/ MAIN_CONTENT_END -->
    <script src="{{ asset('public/vendors/') }}/sweet-alert/js/sweetalert2@11.min.js"></script>
    @yield('script')
</body>
