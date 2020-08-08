
<!doctype html>
<html lang="zxx">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<!-- Bootstrap Min CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
	<!-- Meanmenu Min CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
	<!-- Boxicons Min CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/boxicons.min.css') }}">
	<!-- Magnific Popup Min CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
	<!-- Owl Carousel Min CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
	<!-- Flaticon CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
	<!-- Odometer CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/odometer.css') }}">
	<!-- Slick CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
	<!-- Style CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
	<!-- Fontawesome -->
	<link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

	<title>StartP - IT Startups and Digital Services HTML Template</title>

	<link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
	@yield('css')
</head>

<body>

	<!-- Start Preloader Area -->
	<div class="preloader">
		<div class="spinner"></div>
	</div>
	<!-- End Preloader Area -->

	<!-- Start Navbar Area -->
	<header id="header" class="headroom">
		<div class="startp-responsive-nav">
			<div class="container">
				<div class="startp-responsive-menu">
					<div class="logo">
						<a href="index.html">
							<img src="{{ asset('assets/img/logo.png') }}" alt="logo">
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="startp-nav">
			<div class="container">
				<nav class="navbar navbar-expand-md navbar-light">
					<a class="navbar-brand" href="index.html"><img src="{{ asset('assets/img/logo.png') }}" alt="logo"></a>

					<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
						<ul class="navbar-nav nav ml-auto">
							<li class="nav-item"><a href="{{ route('user.index') }}" class="nav-link  
								{!! (Request::is('user/index') ? 'active' : '') !!}" >Home </a>
							</li>

							<li class="nav-item"><a href="{{ route('user.order') }}" class="nav-link
								{!! (Request::is('user/order') ? 'active' : '') !!}">Order </a>
							</li>

							<li class="nav-item"><a href="#" class="nav-link">Shipment </a>
							</li>

							<li class="nav-item"><a href="{{ route('user.view-detail') }}" class="nav-link ">View Detail </a>
							</li>

							<li class="nav-item"><a href="#" class="nav-link">Payment<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
								<ul class="dropdown_menu">
									<li class="nav-item"><a href="#" class="nav-link">Payment Overseas </a>
									</li>

									<li class="nav-item"><a href=" {{ route('user.payment-local') }}" class="nav-link">Payment Local </a>
									</li>
								</ul>
							</li>
							<li class="nav-item"><a href="#" class="nav-link">Report<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
								<ul class="dropdown_menu">
									<li class="nav-item"><a href="{{ route('user.order-report') }}" class="nav-link">Order Invoice</a>
									</li>
									<li class="nav-item"><a href=" {{ route('user.payment-local') }}" class="nav-link">Payment Overseas Report</a>
									</li>
									<li class="nav-item"><a href=" {{ route('user.local-report') }}" class="nav-link">Payment Local Report</a>
									</li>
								</ul>
							</li>

							<div class="topbar-divider d-none d-sm-block"></div>

							<li class="nav-item dropdown no-arrow" style="padding-top: 0">
								<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="mr-2 d-none d-lg-inline text-gray-800 small">{{auth('web')->user()->firstname}} {{ auth('web')->user()->lastname }}</span>
									<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
								</a>
								<!-- Dropdown - User Information -->
								<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
									<a class="dropdown-item" href="#">
										<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
										Profile
									</a>
									<a class="dropdown-item" href="#">
										<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
										Settings
									</a>
									<a class="dropdown-item" href="#">
										<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
										Activity Log
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
										<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
										Logout
									</a>
								</div>
							</li>
						</ul>
					</div>

					<div class="others-option">

						<!-- <a href="{{ route('user.logout') }}" class="btn btn-light">Log out</a> -->
					</div>
				</nav>
			</div> 
		</div>
	</header>
	<!-- End Navbar Area -->

	<!-- Start Page Title -->
	<div class="page-title-area">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container" >
					@yield('content')
					<div id="success" style="width: 300px; position: fixed; left: 0; bottom: 0;"></div>
				</div>
			</div>
		</div>

		<div class="shape1"><img src="{{ asset('assets/img/shape1.png') }}" alt="shape"></div>
		<div class="shape2 rotateme"><img src="{{ asset('assets/img/shape2.svg') }}" alt="shape"></div>
		<div class="shape3"><img src="{{ asset('assets/img/shape3.svg') }}" alt="shape"></div>
		<div class="shape4"><img src="{{ asset('assets/img/shape4.svg') }}" alt="shape"></div>
		<div class="shape5"><img src="{{ asset('assets/img/shape5.png') }}" alt="shape"></div>
		<div class="shape6 rotateme"><img src="{{ asset('assets/img/shape4.svg') }}" alt="shape"></div>
		<div class="shape7"><img src="{{ asset('assets/img/shape4.svg') }}" alt="shape"></div>
		<div class="shape8 rotateme"><img src="{{ asset('assets/img/shape2.svg') }}" alt="shape"></div>
	</div>
	<div>
	@yield('report')
	</div>
	<!-- End Page Title -->
	@if(session('success'))
	<div class="alert alert-success text-center" id="div">
		{{session('success')}}
	</div>
	@endif


	<!-- Start Footer Area -->
	<footer class="footer-area bg-f7fafd">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<div class="logo">
							<a href="#"><img src="{{ asset('assets/img/logo.png') }}" alt="logo"></a>
						</div>
						<p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-footer-widget pl-5">
						<h3>Company</h3>
						<ul class="list">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Services</a></li>
							<li><a href="#">Features</a></li>
							<li><a href="#">Our Pricing</a></li>
							<li><a href="#">Latest News</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h3>Support</h3>
						<ul class="list">
							<li><a href="#">FAQ's</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Terms & Condition</a></li>
							<li><a href="#">Community</a></li>
							<li><a href="#">Contact Us</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h3>Address</h3>

						<ul class="footer-contact-info">
							<li><i data-feather="map-pin"></i> 27 Division St, New York, NY 10002, USA</li>
							<li><i data-feather="mail"></i> Email: <a href="#">startp@gmail.com</a></li>
							<li><i data-feather="phone-call"></i> Phone: <a href="#">+ (321) 984 754</a></li>
						</ul>
						<ul class="social-links">
							<li><a href="#" class="facebook"><i data-feather="facebook"></i></a></li>
							<li><a href="#" class="twitter"><i data-feather="twitter"></i></a></li>
							<li><a href="#" class="instagram"><i data-feather="instagram"></i></a></li>
							<li><a href="#" class="linkedin"><i data-feather="linkedin"></i></a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-12 col-md-12">
					<div class="copyright-area">
						<p>Copyright @2020 StartP. All rights reserved</p>
					</div>
				</div>
			</div>
		</div>

		<img src="{{ asset('assets/img/map.png') }}" class="map" alt="map">
		<div class="shape1"><img src="{{ asset('assets/img/shape1.png') }}" alt="shape"></div>
		<div class="shape8 rotateme"><img src="{{ asset('assets/img/shape2.svg') }}" alt="shape"></div>
	</footer>
	<!-- End Footer Area -->
	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" style="margin-top: 200px;" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="{{ route('user.logout') }}">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<div class="go-top"><i data-feather="arrow-up"></i></div>

	<!-- Jquery Min JS -->
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<!-- Popper Min JS -->
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<!-- Bootstrap Min JS -->
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<!-- Meanmenu Min JS -->
	<script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
	<!-- WOW Min JS -->
	<script src="{{ asset('assets/js/wow.min.js') }}"></script>
	<!-- Magnific Popup Min JS -->
	<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
	<!-- Appear Min JS -->
	<script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
	<!-- Odometer Min JS -->
	<script src="{{ asset('assets/js/odometer.min.js') }}"></script>
	<!-- Slick Min JS -->
	<script src="{{ asset('assets/js/slick.js') }}"></script>
	<!-- Headroom JS -->
	<script src="{{ asset('assets/js/headroom.js') }}"></script>
	<!-- Owl Carousel Min JS -->
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<!-- Feather Icon Min JS -->
	<script src="{{ asset('assets/js/feather.min.js') }}"></script>
	<!-- Form Validator Min JS -->
	<script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
	<!-- Contact Form Min JS -->
	<script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
	<!-- StartP Map JS FILE -->
	<script src="{{ asset('assets/js/startp-map.js') }}"></script>
	<!-- Main JS -->
	<script src="{{ asset('assets/js/main.js') }}"></script>
	@yield('script')
	<script>
		$('.alert').delay(3000).fadeOut('slow');
		$('.text-danger').delay(3000).fadeOut('slow');
	</script>
</body>
</html>