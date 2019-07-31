<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Dashio - Bootstrap Admin Template</title>

    <!-- Favicons -->
    <link href="{{ asset('admin/dashio/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('admin/dashio/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('admin/dashio/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('admin/dashio/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="{{ asset('admin/dashio/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/dashio/css/style-responsive.css') }}" rel="stylesheet">

    <!-- =======================================================
      Template Name: Dashio
      Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
      Author: TemplateMag.com
      License: https://templatemag.com/license/
    ======================================================= -->
</head>

<body>
<!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
<div id="login-page">
    <div class="container">


        @if(\Session::has('error'))
            <div class="alert alert-danger">
                {{\Session::get('error')}}
            </div>
        @endif
        <form class="form-login" action="{{ route('postForm') }}" method="POST">
            @csrf
            <h2 class="form-login-heading">sign in now</h2>

            <div class="login-wrap">
                <input type="text" class="form-control" name='email' placeholder="Email" autofocus>
                <br>
                <input type="password" class="form-control" name='password' placeholder="Password">
                <br>

                <button class="btn btn-theme btn-block" href="" type="submit"><i class="fa fa-lock"></i> SIGN IN
                </button>
                <hr>

            </div>

        </form>
    </div>
</div>
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('admin/dashio/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/dashio/lib/bootstrap/js/bootstrap.min.js') }}"></script>
<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="{{ asset('admin/dashio/lib/jquery.backstretch.min.js') }}"></script>
<script>
    $.backstretch("{{ asset('admin/dashio/img/login-bg.jpg') }}", {
        speed: 100
    });
</script>
</body>

</html>
