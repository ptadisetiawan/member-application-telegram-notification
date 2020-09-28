<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>@yield('title')</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="{{asset('vendor/stisla/dist/modules/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/stisla/dist/modules/fontawesome/css/all.min.css')}}">

<!-- Plugins -->
<link rel="stylesheet" href="{{asset('vendor/stisla/dist/modules/bootstrap-social/bootstrap-social.css')}}">
<link rel="stylesheet" href="{{asset('vendor/stisla/dist/modules/jquery-selectric/selectric.css')}}">

<!-- Template CSS -->
<link rel="stylesheet" href="{{asset('vendor/stisla/dist/css/style.css')}}">
<link rel="stylesheet" href="{{asset('vendor/stisla/dist/css/components.css')}}">
@yield('customcss')
</head>

<body>
<div id="app">
    <section class="section">
        @yield('content')
    </section>
</div>
@include('sweetalert::alert')
<!-- General JS Scripts -->
<script src="{{asset('vendor/stisla/dist/modules/jquery.min.js')}}"></script>
<script src="{{asset('vendor/stisla/dist/modules/popper.js')}}"></script>
<script src="{{asset('vendor/stisla/dist/modules/tooltip.js')}}"></script>
<script src="{{asset('vendor/stisla/dist/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/stisla/dist/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('vendor/stisla/dist/modules/moment.min.js')}}"></script>
<script src="{{asset('vendor/stisla/dist/js/stisla.js')}}"></script>

<!-- Plugins -->
<script src="{{asset('vendor/stisla/dist/modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
<script src="{{asset('vendor/stisla/dist/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{asset('vendor/stisla/dist/js/scripts.js')}}"></script>
<script src="{{asset('vendor/stisla/dist/js/custom.js')}}"></script>
@yield('customjs')
</body>
</html>
