<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>GWYN</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ url('public') }}/admin/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ url('public') }}/admin/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('public') }}/admin/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('public') }}/admin/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('public') }}/admin/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ url('public') }}/admin/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ url('public') }}/admin/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ url('public') }}/admin/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('public') }}/admin/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ url('public') }}/admin/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('public') }}/admin/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ url('public') }}/admin/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('public') }}/admin/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{ url('public') }}/admin/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ url('public') }}/admin/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ url('public') }}/admin/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="{{ url('public') }}/admin/css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="{{ url('public') }}/admin/css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="{{ url('public') }}/admin/css/examples.css" rel="stylesheet">
    <link href="{{ url('public') }}/admin/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    <!-- JS -->
    <!-- CoreUI and necessary plugins-->
    <script src="{{ url('public') }}/admin/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="{{ url('public') }}/admin/vendors/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="{{ url('public') }}/admin/vendors/chart.js/js/chart.min.js"></script>
    <script src="{{ url('public') }}/admin/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="{{ url('public') }}/admin/vendors/@coreui/utils/js/coreui-utils.js"></script>
    <!-- Costum Plugins -->
    <script type="text/javascript" src="{{ url('public') }}/admin/vendors/jquery.min.js"></script>
    <!-- Selelct 2-->
    <link rel="stylesheet" type="text/css" href="{{ url('public') }}/admin/vendors/select2/css/select2.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public') }}/admin/vendors/select2/css/select2-bootstrap.css">
    <script src="{{ url('public') }}/admin/vendors/select2/js/select2.full.min.js" type="text/javascript" charset="utf-8">
    </script>
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="{{ url('public') }}/admin/vendors/datatables/datatablefix.min.css" />
    <script type="text/javascript" src="{{ url('public') }}/admin/vendors/datatables/datatablefix.min.js"></script>
    <script type="text/javascript" src="{{ url('public') }}/admin/vendors/jqueryvalidation.min.js"></script>
    <script type="text/javascript" src="{{ url('public') }}/admin/vendors/jqueryvalidation.min.js"></script>
    <script type="text/javascript" src="{{ url('public') }}/admin/vendors/bootbox.min.js"></script>
    <script type="text/javascript" src="{{ url('public') }}/admin/vendors/jquery.priceformat.js"></script>
    <script type="text/javascript" src="{{ url('public') }}/admin/vendors/moment.js"></script>
    <script type="text/javascript" src="{{ url('public') }}/admin/vendors/moment-timezone.js"></script>

    <script type="text/javascript">
        const global = $(document);
        const domain = "{{ url('/') }}";
        const token = localStorage.getItem('_token');
        const c_username = localStorage.getItem('_username');
        const host = window.location.protocol + "//" + window.location.host;


        if ('serviceWorker' in navigator) {
            // Recommended to register onLoad
            window.addEventListener('load', function() {
                console.log("host", host);
                navigator.serviceWorker.register("{{ url('public') }}//admin/js/sw.js");
            });
        }
    </script>
</head>
