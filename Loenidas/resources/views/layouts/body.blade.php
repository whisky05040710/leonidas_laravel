<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta name="description" content="POS - Bootstrap Admin Template" />
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive" />
    <meta name="author" content="Dreamguys - Bootstrap Admin Template" />
    <meta name="robots" content="noindex, nofollow" />
    <title>Leonidas Restaurant</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" />


    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>
    <div class="main-wrapper">
        @include('includes.header')
        @include('includes.sidebar')

        @yield('content')

    </div>

</body>
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{ asset("assets/js/jquery-3.6.0.min.js") }}"></script>

<script src="{{ asset("assets/js/feather.min.js")}} "></script>

<script src="{{ asset("assets/js/jquery.slimscroll.min.js") }}"></script>

<script src="{{ asset("assets/js/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("assets/js/dataTables.bootstrap4.min.js") }}"></script>

<script src="{{ asset("assets/js/bootstrap.bundle.min.js") }}"></script>

<script src="{{ asset("assets/plugins/select2/js/select2.min.js") }}"></script>

<script src="{{ asset("assets/js/moment.min.js") }}"></script>
<script src="{{ asset("assets/js/bootstrap-datetimepicker.min.js") }}"></script>

<script src="{{ asset("assets/plugins/sweetalert/sweetalert2.all.min.js") }}"></script>
<script src="{{ asset("assets/plugins/sweetalert/sweetalerts.min.js") }}"></script>

<script src="{{ asset("assets/js/script.js") }}"></script>



</html>
