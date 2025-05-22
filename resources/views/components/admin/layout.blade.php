<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>

    <title>Care Group</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset('dash/assets/images/favicon.svg') }}" type="image/x-icon"> <!-- [Google Font] Family -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href=" {{ asset('dash/assets/fonts/tabler-icons.min.css') }}" >
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset('dash/assets/fonts/feather.css') }}" >
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset('dash/assets/fonts/fontawesome.css') }}" >
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('dash/assets/fonts/material.css') }}" >
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href=" {{ asset('dash/assets/css/style.css') }}" id="main-style-link" >
    <link rel="stylesheet" href="{{ asset('dash/assets/css/style-preset.css') }}" >

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    {{ $slot }}


<!-- [Page Specific JS] start -->
<script src="{{ asset('dash/assets/js/plugins/apexcharts.min.js') }}"></script>
<script src="{{ asset('dash/assets/js/pages/dashboard-default.js') }}"></script>
<!-- [Page Specific JS] end -->
<!-- Required Js -->
<script src="{{ asset('dash/assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('dash/assets/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('dash/assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('dash/assets/js/fonts/custom-font.js') }}"></script>
<script src="{{ asset('dash/assets/js/pcoded.js') }}"></script>
<script src="{{ asset('dash/assets/js/plugins/feather.min.js') }}"></script>

</body>
<!-- [Body] end -->

</html>
