<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('vendor/stisla/dist/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/stisla/dist/modules/fontawesome/css/all.min.css')}}">

    <!-- Plugins -->
  <link rel="stylesheet" href="{{asset('vendor/stisla/dist/modules/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/stisla/dist/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/stisla/dist/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/stisla/dist/modules/select2/dist/css/select2.min.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('vendor/stisla/dist/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/stisla/dist/css/components.css')}}">
    @yield('customcss')
  </head>
