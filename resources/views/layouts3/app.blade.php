<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{asset('assets2')}}/img/favicon.ico">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets2')}}/img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title> Trang Chủ</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="{{asset('assets2')}}/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('assets2')}}/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>
    <link href="{{asset('assets2')}}/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('assets2')}}/css/nucleo-icons.css" rel="stylesheet">

</head>

<body class="ecommerce">
    <div class="wrapper">
        {{-- sidebar --}}
        <div class="main-panel">
                {{-- navbar --}}
            @include('layouts3.navbar')
            @yield('content')
                {{-- footer --}}
        </div>
    </div>
!-- wrapper -->

</body>

<!-- Core JS Files -->
<script src="{{asset('assets2')}}/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="{{asset('assets2')}}/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="{{asset('assets2')}}/js/popper.js" type="text/javascript"></script>
<script src="{{asset('assets2')}}/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Plugin for Switches -->
<script src="{{asset('assets2')}}/js/bootstrap-switch.min.js"></script>

<!--  Plugins for Slider -->
<script src="{{asset('assets2')}}/js/nouislider.js"></script>

<!--  Plugins for Select -->
<script src="{{asset('assets2')}}/js/bootstrap-select.js"></script>

<!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets2')}}/js/paper-kit.js?v=2.1.0"></script>

</html>