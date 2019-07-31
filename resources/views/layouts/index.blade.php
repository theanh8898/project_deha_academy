<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>TheAnh Laptops</title>

    <!-- Favicons -->
    <link href="{{ asset('admin/dashio/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('admin/dashio/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    {{-- <link href="../../dashio/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href=" {{ asset('admin/dashio/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://codeseven.github.io/toastr/build/toastr.min.css">
    <!--external css-->
    <link href="{{ asset('admin/dashio/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/dashio/css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/dashio/lib/gritter/css/jquery.gritter.css')}}"/>
    <!-- Custom styles for this template -->
    <link href="{{ asset('admin/dashio/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/dashio/css/style-responsive.css')}}" rel="stylesheet">
    <script src="{{ asset('admin/dashio/lib/chart-master/Chart.js')}}"></script>


    <style>
        .panel-heading {
            padding: 0;
        }

        .panel-heading ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .panel-heading li {
            float: left;
            border-right: 1px solid #bbb;
            display: block;
            padding: 14px 16px;
            text-align: center;
        }

        .panel-heading li:last-child:hover {
            background-color: #ccc;
        }

        .panel-heading li:last-child {
            border-right: none;
        }

        .panel-heading li a:hover {
            text-decoration: none;
        }

        .table.table-bordered tbody td {
            vertical-align: baseline;
        }


    </style>

    <!-- =======================================================
      Template Name: Dashio
      Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
      Author: TemplateMag.com
      License: https://templatemag.com/license/
    ======================================================= -->
</head>

<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
@include('layouts.header')
<!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
@include('layouts.menu')
<!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
@yield('content')
<!--main content end-->
    <!--footer start-->
@include('layouts.footer')
<!--footer end-->
</section>


<!-- Jquery -->
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<!-- Bootstrap JavaScript -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>
<!-- toastr notifications -->
<!-- icheck checkboxes -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('admin/dashio/lib/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('admin/dashio/lib/bootstrap/js/bootstrap.min.js') }}"></script>
<script class="include" type="text/javascript"
        src="{{ asset('admin/dashio/lib/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('admin/dashio/lib/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('admin/dashio/lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/dashio/lib/jquery.sparkline.js') }}"></script>
<!--common script for all pages-->
<script src="{{ asset('admin/dashio/lib/common-scripts.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/dashio/lib/gritter/js/jquery.gritter.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/dashio/lib/gritter-conf.js') }}"></script>
<!--script for this page-->
<script src="{{ asset('admin/dashio/lib/sparkline-chart.js') }}"></script>
<script src="{{ asset('admin/dashio/lib/zabuto_calendar.js') }}"></script>

<script src="{{asset('/js/AjaxLaptoptype.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/AjaxLaptop.js')}}" type="text/javascript"></script>


</body>

</html>
