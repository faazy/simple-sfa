<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
    <base href="{{config('app.url')}}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, minimal-ui">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/theme.css')}}">
    <!-- END VENDOR CSS-->

    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("css/style.css")}}">
    <!-- END Custom CSS-->

    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('vendors/js/vendors.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
</head>