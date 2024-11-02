<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pageTitle ?? config('app.name', 'SMEF Suppliers Platform for Women Entrepreneurs') }}</title>

    <link rel="shortcut icon" href="{{ asset('assets/theme/images/favicon.ico') }}"/>

    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/base/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/dist/css/select2.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/admin/css/font-awesome.min.css') }}">--}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    @yield('page_vendor_css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/theme.css') }}">
    @yield('page_css')
    <script>
        window.Laravel = {!! json_encode([
                'siteUrl' => env('APP_URL')
            ]) !!};
    </script>
</head>

<body>