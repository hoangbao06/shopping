<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="{{asset('assets2')}}/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets2')}}/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Paper Kit 2 PRO by Creative Tim</title>

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
<body class="full-screen register">
	<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
		<div class="container">
			<div class="navbar-translate">
				<div class="navbar-header">
					<a class="navbar-brand" href="../presentation.html" style="margin-left: 450px"></a>
				</div>
				<button class="navbar-toggler navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
				</button>
			</div>

		</div>
	</nav>

    <div class="wrapper">
        <div class="page-header" style="background-image: url('{{asset('assets2')}}/img/sections/soroush-karimi.jpg');">
            <div class="filter"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-7 col-12 ml-auto">
							<div class="info info-horizontal">
								<div class="icon">
									
								</div>
								<div class="description">

								</div>
							</div>
							<div class="info info-horizontal">
								
								<div class="icon"> <i class="fa fa-file"></i></div>
								<h3> Đăng Kí Tài Khoản </h3>
								<p>Vui lòng điền đầy đủ Thông tin</p>
							<div class="info info-horizontal"></div></div></div>
							
						<div class="col-md-4 col-sm-5 col-12 mr-auto">
							<div class="card card-register">
								<h3 class="card-title text-center">Register</h3>
								<div class="social">
									<button href="#paper-kit" class="btn btn-just-icon btn-facebook"><i class="fa fa-facebook"></i></button>
									<button href="#paper-kit" class="btn btn-just-icon btn-google"><i class="fa fa-google"></i></button>
									<button href="#paper-kit" class="btn btn-just-icon btn-twitter"><i class="fa fa-twitter"></i></button>
								</div>

								<div class="division">
									<div class="line l"></div>
									<span>or</span>
									<div class="line r"></div>
								</div>
								<form class="register-form" method="post" action="{{ route('dangkyProcess')}}">
                                    @csrf

									<input type="text" class="form-control" placeholder="Email" name="email" id="email">
									<span style="color: red;display: none" id="error-email">Không Được Để Trống</span>

                                    <input type="text" class="form-control" placeholder="Name" name="ten" id="name">
									<span style="color:black;display: none" id="error-name">Vui Lòng Điền Tên </span>

									<input type="password" class="form-control" placeholder="Password" id="pass">
									<span style="color:black;display: none" id="error-pass">Chưa Điền nhập Mật Khẩu </span>

									<input type="password" class="form-control" placeholder="Confirm Password" name="pass" id="Repass">
									<span style="color:black;display: none" id="error-Repass">Vui lòng nhập lại Mật Khẩu </span>
								
                                    <input type="number" class="form-control" placeholder="Phone Number" name="sdt" id="sdt">
									<span style="color:black;display: none" id="error-phone">Bạn Chưa Nhập Số Điện Thoại </span>

                                    <input type="text" class="form-control" placeholder="Address" name="diachi" id="adderss">
									<span style="color:black;display: none" id="error-adderss">Bạn Chưa Nhập Địa Chỉ</span>
                                    <input type="hidden" class="form-control" placeholder="Address" name="idKhachHang">
									
									<button onclick="return kiemTraDangKi();"  class="btn btn-block btn-round">Đăng Kí</button>
								</form>
								<div class="login">
									<p>Already have an account? <a href="#0">Log in</a>.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
            <div class="demo-footer text-center">
                    <h6>&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim</h6>
            </div>
        </div>
    </div>

</body>

<!-- Core JS Files -->

<script src="{{asset('assets2')}}/js/validateDangKi.js" type="text/javascript"></script>
<script src="{{asset('assets2')}}/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="{{asset('assets2')}}/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="{{asset('assets2')}}/js/popper.js" type="text/javascript"></script>
<script src="{{asset('assets2')}}/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Plugins for Select -->
<script src="{{asset('assets2')}}/js/bootstrap-select.js"></script>

<!--  Plugins for DateTimePicker -->
<script src="{{asset('assets2')}}/js/moment.min.js"></script>
<script src="{{asset('assets2')}}/js/bootstrap-datetimepicker.min.js"></script>

<!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets2')}}/js/paper-kit.js?v=2.1.0"></script>
</html>