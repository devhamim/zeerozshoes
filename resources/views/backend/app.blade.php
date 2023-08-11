<!DOCTYPE html>
<html lang="en" data-menu="flush-menu" data-nav-size="nav-default">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard | Revel eCommerce Admin</title>
    
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="{{ asset('backend') }}/dashboad/assets/vendor/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/dashboad/assets/vendor/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/dashboad/assets/vendor/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/dashboad/assets/vendor/css/daterangepicker.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/dashboad/assets/vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/dashboad/assets/css/style.css">
    <link rel="stylesheet" id="primaryColor" href="{{ asset('backend') }}/dashboad/assets/css/orange-color.css">
    <link rel="stylesheet" id="rtlStyle" href="#">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <style>
        /* Tag badge style */
        .tag-badge {
            display: inline-block;
            padding: 5px 10px;
            margin-right: 5px;
            background-color: #fe5502;
            color: #fff;
            border-radius: 20px;
        }

        /* Tag container style */
        #tagContainer {
            margin: 10px 0;
        }
    </style>
</head>
<body class="body-padding body-p-top light-theme">

    <!-- header start -->
    @include('backend.layouts.header')
    <!-- header end -->

    <!-- main sidebar start -->
    @include('backend.layouts.sidebar')
    <!-- main sidebar end -->

    <!-- main content start -->
    @yield('content')
    <!-- main content end -->
    
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    <script src="{{ asset('backend') }}/dashboad/assets/vendor/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('backend') }}/dashboad/assets/vendor/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/dashboad/assets/vendor/js/jquery.overlayScrollbars.min.js"></script>
    <script src="{{ asset('backend') }}/dashboad/assets/vendor/js/apexcharts.js"></script>
    <script src="{{ asset('backend') }}/dashboad/assets/vendor/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/dashboad/assets/vendor/js/moment.min.js"></script>
    <script src="{{ asset('backend') }}/dashboad/assets/vendor/js/daterangepicker.js"></script>
    <script src="{{ asset('backend') }}/dashboad/assets/js/dashboard.js"></script>
    <script src="{{ asset('backend') }}/dashboad/assets/js/main.js"></script>


    {{-- summer note --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    @yield('footer_script')

    @include('sweetalert::alert')

</body>

</html>