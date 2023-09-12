<!DOCTYPE html>
  @php
  App::setLocale(userLocal());
  @endphp
  <html lang="{{ userLocal() }}" @if (userLocal()== 'ar' ) dir="rtl"@endif>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> {{ @base_settings('company_name') }} - @yield('title')</title>
  <meta name="keywords" content=" ">
  <meta name="description" content="Petzania">
  @if (env('APP_ENV') == 'server')
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  @endif
  <meta name="base-url" id="base-url" content="{{ env('APP_URL') }}">
  <meta name="deleteText" id="deleteText" content="{{ _trans('common.Delete') }}">
  <meta name="editText" id="editText" content="{{ _trans('common.Edit') }}">
  <meta name="cancelText" id="cancelText" content="{{ _trans('common.Cancel') }}">
  <meta name="yesText" id="yesText" content="{{ _trans('common.Yes') }}">
  <meta name="noText" id="noText" content="{{ _trans('common.No') }}">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->
  
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  
  <link rel="shortcut icon" href="{{ asset('public/theme/assets/images/favicon.png') }}">
  
 
  <link href="{{ asset('public/theme/assets/plugins/@mdi/css/materialdesignicons.min.css') }}" rel="stylesheet" />
  <!-- plugin css -->
  <link href="{{ asset('public/theme/assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
  <link href="{{ asset('public/theme/assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('public/theme/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  <!-- end common css -->

  @if(isRTL())
    
    <link rel="stylesheet" href="{{ asset('public/theme/css/app.rtl.css') }}">
    @else
    <link href="{{ asset('public/theme/css/app.css') }}" rel="stylesheet" />

    @endif 
    <link href="{{ asset('public/css/style2.css') }}" rel="stylesheet" />


  @stack('style')

<script>
  $(documnt).ready(function(){
    $("#wwww").select2();
  });
</script>
</head>
<body data-base-url="{{url('/')}}">

  <input type="text" hidden value="{{ env('APP_URL') }}" id="url">
  <input type="text" hidden value="{{ config('settings.app.company_name') }}" id="site_name">
  <input type="text" hidden value="{{ settings('time_format') }}" id="time_format">
  <input type="text" hidden value="{{ \Carbon\Carbon::now()->format('Y/m/d') }}" id="defaultDate">
  <input type="hidden" id="get_custom_user_url" value="{{ route('user.getUser') }}">
  <input hidden value="{{ _trans('project.Select Employee') }}" id="select_custom_members">
  <input hidden value="{{ auth()->id() }}" id="fire_base_authenticate">
  <input hidden value="{{ _trans('alert.Are you sure?') }}" id="are_you_sure">
  <input hidden value="{{ _trans('alert.You want to delete this record?') }}" id="you_want_delete">
  <input hidden value="{{ _trans('response.Something went wrong') }}" id="something_wrong">
  <input hidden value="{{ _trans('common.Yes') }}" id="yes">
  <input hidden value="{{ _trans('common.Cancel') }}" id="cancel">
  <input hidden value="{{ @settings('currency_symbol') }}" id="currency_symbol">
  <input hidden value="{{ _trans('common.No data found !') }}" id="nothing_show_here">


  <script src="{{ asset('public/theme/assets/js/spinner.js') }}"></script>

  <div class="main-wrapper" id="app">
    @include('backend.layouts.sidebar')
    <div class="page-wrapper">
      @include('backend.layouts.header')
      <div class="page-content">
        @yield('content')
      </div>
      @include('backend.layouts.footer')
    </div>
  </div>

    <!-- base js -->
    <script src="{{ asset('public/theme/js/app.js') }}"></script>
    <script src="{{ asset('public/theme/assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('public/theme/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('public/theme/assets/js/template.js') }}"></script>
    <!-- end common js -->

    @stack('custom-scripts')
</body>
</html>