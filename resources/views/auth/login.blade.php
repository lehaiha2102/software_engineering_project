<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="user/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="user/style.css" type="text/css" />
	<link rel="stylesheet" href="user/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="user/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="user/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="user/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="user/css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Đăng nhập</title>
    <style>
        body {
            background-image: url('/user/images/backgroundimage.jpg');
        }
    </style>
</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap py-0">

				<div class="section dark p-0 m-0 h-100 position-absolute"></div>

				<div class="section bg-transparent min-vh-100 p-0 m-0 d-flex">
					<div class="vertical-middle">
						<div class="container py-5">

							<div class="text-center">
								<a href="{{route('home')}}"><img src="/photos/logo_new.png" alt="Canvas Logo" style="height: 100px;"></a>
							</div>

							<div class="card mx-auto rounded-0 border-0" style="max-width: 400px;">
								<div class="card-body" style="padding: 40px;">
									<form id="login-form" name="login-form" class="mb-0"method="POST" action="{{ route('login') }}">
                                        @csrf

										<div class="row">
											<div class="col-12 form-group">
												<label for="login-form-username">Tên đăng nhập:</label>
                                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

											<div class="col-12 form-group">
												<label for="login-form-password">Mật khẩu:</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror</div>

											<div class="col-12 form-group mb-0">
												<button type="submit" class="button button-3d button-black m-0 btn btn-danger" id="login-form-submit" name="login-form-submit" value="login">Đăng nhập</button>
											</div>
										</div>
									</form>
								</div>
							</div>



						</div>
					</div>
				</div>

			</div>
		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="/user/js/jquery.js"></script>
	<script src="/user/js/plugins.min.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="/user/js/functions.js"></script>

</body>
</html>
