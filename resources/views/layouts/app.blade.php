<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta name="description" content="HRMS - Payroll" />
    <meta name="keywords" content="HRMS - Payroll" />
    <meta name="author" content="HRMS - Payroll" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} | Java</title>

    <link rel="shortcut icon" type="image/x-icon" href="/img/jativision.png" />

    <link rel="stylesheet" href="/css/bootstrap.min.css" />

    <link rel="stylesheet" href="/plugins/fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="/plugins/fontawesome/css/all.min.css" />

    <link rel="stylesheet" href="/css/line-awesome.min.css" />
    <link rel="stylesheet" href="/css/material.css" />

    <link rel="stylesheet" href="/css/font-awesome.min.css" />

    <link rel="stylesheet" href="/css/line-awesome.min.css" />

    <link rel="stylesheet" href="/plugins/toastr/toastr.min.css" />

    <link rel="stylesheet" href="/plugins/sweetalert2/dist/sweetalert2.min.css" />

    {{ $custom_style }}

    <link rel="stylesheet" href="/css/style.css" />

</head>

<body>
    <div class="main-wrapper">
        <x-header></x-header>

        <x-sidebar></x-sidebar>

        <div class="page-wrapper">
            {{ $slot }}
        </div>
    </div>

    {{-- <x-settings-icon></x-settings-icon> --}}

    <script src="/js/jquery-3.6.0.min.js"></script>

    <script src="/js/bootstrap.bundle.min.js"></script>

    <script src="/js/jquery.slimscroll.min.js"></script>

    <script src="/js/layout.js"></script>
    <script src="/js/theme-settings.js"></script>
    <script src="/js/greedynav.js"></script>

    <script src="/plugins/toastr/toastr.min.js"></script>
    <script src="/plugins/sweetalert2/dist/sweetalert2.min.js"></script>

    {{ $custom_script }}

    <script src="/js/app.js"></script>


</body>

</html>
