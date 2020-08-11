<<<<<<< Updated upstream
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Welcome</title>
	<base href="{{asset('./')}}">
	<!-- Custom fonts for this template-->
	<link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- JQuery Core to use datetimepicker-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" ></script>

    <!-- Transition js -->
    <script  src="{{asset('assets/js/transition.min.js')}}"/></script> 
    <!-- Collapse -->
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery.collapsible/1.2/jquery.collapsible.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery.collapsible/1.2/jquery.collapsible.min.js"></script>
	<!-- Custom styles for this template-->
	<link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
	@yield('css')
</head>
<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">SB User <sup>2</sup></div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="index.html">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Interface
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fas fa-fw fa-cog"></i>
					<span>Components</span>
				</a>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Custom Components:</h6>
						<a class="collapse-item" href="buttons.html">Buttons</a>
						<a class="collapse-item" href="cards.html">Cards</a>
					</div>
				</div>
			</li>

			<!-- Nav Item - Utilities Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
					<i class="fas fa-fw fa-wrench"></i>
					<span>Utilities</span>
				</a>
				<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Custom Utilities:</h6>
						<a class="collapse-item" href="utilities-color.html">Colors</a>
						<a class="collapse-item" href="utilities-border.html">Borders</a>
						<a class="collapse-item" href="utilities-animation.html">Animations</a>
						<a class="collapse-item" href="utilities-other.html">Other</a>
					</div>
				</div>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Addons
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
					<i class="fas fa-fw fa-folder"></i>
					<span>Pages</span>
				</a>
				<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Login Screens:</h6>
						<a class="collapse-item" href="login.html">Login</a>
						<a class="collapse-item" href="register.html">Register</a>
						<a class="collapse-item" href="forgot-password.html">Forgot Password</a>
						<div class="collapse-divider"></div>
						<h6 class="collapse-header">Other Pages:</h6>
						<a class="collapse-item" href="404.html">404 Page</a>
						<a class="collapse-item" href="blank.html">Blank Page</a>
					</div>
				</div>
			</li>

			<!-- Nav Item - Charts -->
			<li class="nav-item">
				<a class="nav-link" href="charts.html">
					<i class="fas fa-fw fa-chart-area"></i>
					<span>Charts</span></a>
			</li>

				<!-- Nav Item - Tables -->
			<li class="nav-item">
				<a class="nav-link" href="tables.html">
					<i class="fas fa-fw fa-table"></i>
					<span>Tables</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

			@if(session('success'))
            <div class="alert alert-success" id="div">
            {{session('success')}}
            </div>
            @endif
                
		</ul>
		<!-- End of Sidebar -->

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">

				<!-- Main Content -->
				<div id="content">

					<!-- Topbar -->
					<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

						<!-- Sidebar Toggle (Topbar) -->
						<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
							<i class="fa fa-bars"></i>
						</button>

						<!-- Topbar Search -->
						<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
							<div class="input-group">
								<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
								<div class="input-group-append">
									<button class="btn btn-primary" type="button">
										<i class="fas fa-search fa-sm"></i>
									</button>
								</div>
							</div>
						</form>

						<!-- Topbar Navbar -->
						<ul class="navbar-nav ml-auto">

							<!-- Nav Item - Search Dropdown (Visible Only XS) -->
							<li class="nav-item dropdown no-arrow d-sm-none">
								<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-search fa-fw"></i>
								</a>
								<!-- Dropdown - Messages -->
								<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
									<form class="form-inline mr-auto w-100 navbar-search">
										<div class="input-group">
											<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
											<div class="input-group-append">
												<button class="btn btn-primary" type="button">
													<i class="fas fa-search fa-sm"></i>
												</button>
											</div>
										</div>
									</form>
								</div>
							</li>

							<!-- Nav Item - Alerts -->
							<li class="nav-item dropdown no-arrow mx-1">
								<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-bell fa-fw"></i>
									<!-- Counter - Alerts -->
									<span class="badge badge-danger badge-counter">3+</span>
								</a>
								<!-- Dropdown - Alerts -->
								<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
									<h6 class="dropdown-header">
										Alerts Center
									</h6>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="mr-3">
											<div class="icon-circle bg-primary">
												<i class="fas fa-file-alt text-white"></i>
											</div>
										</div>
										<div>
											<div class="small text-gray-500">December 12, 2019</div>
											<span class="font-weight-bold">A new monthly report is ready to download!</span>
										</div>
									</a>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="mr-3">
											<div class="icon-circle bg-success">
												<i class="fas fa-donate text-white"></i>
											</div>
										</div>
										<div>
											<div class="small text-gray-500">December 7, 2019</div>
											$290.29 has been deposited into your account!
										</div>
									</a>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="mr-3">
											<div class="icon-circle bg-warning">
												<i class="fas fa-exclamation-triangle text-white"></i>
											</div>
										</div>
										<div>
											<div class="small text-gray-500">December 2, 2019</div>
											Spending Alert: We've noticed unusually high spending for your account.
										</div>
									</a>
									<a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
								</div>
							</li>

							<!-- Nav Item - Messages -->
							<li class="nav-item dropdown no-arrow mx-1">
								<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-envelope fa-fw"></i>
									<!-- Counter - Messages -->
									<span class="badge badge-danger badge-counter">7</span>
								</a>
								<!-- Dropdown - Messages -->
								<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
									<h6 class="dropdown-header">
										Message Center
									</h6>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="dropdown-list-image mr-3">
											<img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
											<div class="status-indicator bg-success"></div>
										</div>
										<div class="font-weight-bold">
											<div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
											<div class="small text-gray-500">Emily Fowler · 58m</div>
										</div>
									</a>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="dropdown-list-image mr-3">
											<img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
											<div class="status-indicator"></div>
										</div>
										<div>
											<div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
											<div class="small text-gray-500">Jae Chun · 1d</div>
										</div>
									</a>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="dropdown-list-image mr-3">
											<img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
											<div class="status-indicator bg-warning"></div>
										</div>
										<div>
											<div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
											<div class="small text-gray-500">Morgan Alvarez · 2d</div>
										</div>
									</a>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="dropdown-list-image mr-3">
											<img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
											<div class="status-indicator bg-success"></div>
										</div>
										<div>
											<div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
											<div class="small text-gray-500">Chicken the Dog · 2w</div>
										</div>
									</a>
									<a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
								</div>
							</li>

							<div class="topbar-divider d-none d-sm-block"></div>

							<!-- Nav Item - User Information -->
							<li class="nav-item dropdown no-arrow">
								<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth('web')->user()->firstname}}</span>
=======

<!doctype html>
<html lang="zxx">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
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
	</head>
	@yield('css')
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

								<li class="nav-item"><a href="#" class="nav-link">Payment Overseas </a>
								</li>

								<li class="nav-item"><a href="#" class="nav-link">Payment Local </a>
								</li>
								
							 	<div class="topbar-divider d-none d-sm-block"></div>

							 	<li class="nav-item dropdown no-arrow" style="padding-top: 0">
								<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="mr-2 d-none d-lg-inline text-gray-800 small">{{auth('web')->user()->firstname}} {{ auth('web')->user()->lastname }}</span>
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream

						</ul>

					</nav>
					<!-- End of Topbar -->

					<!-- Begin Page Content -->

					<div class="container-fluid">

      				<main role="main" class="px-4">
						<!-- Page Heading -->
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
						</div>
						@yield('content')
					</main>
					</div>
					<!-- /.container-fluid -->
					
				</div>
				<!-- End of Main Content -->

					
				<!-- Footer -->
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright &copy; Your Website 2019</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->

			</div>
			<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
=======
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
                    <div class="container col-12" >
                    	@yield('content')
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
        <!-- End Page Title -->

        

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
>>>>>>> Stashed changes
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
<<<<<<< Updated upstream
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
=======
					<button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
>>>>>>> Stashed changes
					<a class="btn btn-primary" href="{{ route('user.logout') }}">Logout</a>
				</div>
			</div>
		</div>
	</div>

<<<<<<< Updated upstream
	<!-- Bootstrap core JavaScript-->
	<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>

<script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/src/js/bootstrap-datetimepicker.js"></script>



<link href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css
" rel="stylesheet"/>

	<script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

	<!-- Custom scripts for all pages-->
	<script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>




	<!-- hide alert -->
	<script>
	$('#div').delay(3000).fadeOut('slow');
	</script>
	@yield('script')
</body>
=======
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
		<script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/src/js/bootstrap-datetimepicker.js"></script>
		<link href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css
		" rel="stylesheet"/>
		@yield('script')
	</body>
</html>
>>>>>>> Stashed changes
