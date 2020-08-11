<<<<<<< Updated upstream
@extends('master.masterpage-login')
@section('container')
	    <!-- Outer Row -->
	    <div class="row justify-content-center">

	      <div class="col-xl-10 col-lg-6 col-md-9">

	        <div class="card o-hidden border-0 shadow-lg my-5">
	          <div class="card-body p-0">
	            <!-- Nested Row within Card Body -->
	            <div class="row">
	              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
	              <div class="col-lg-12">
	                <div class="p-5">
	                  <div class="text-center">
	                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
	                  </div>
	                  	<form class="user" action="{{ route('do-login') }}" method="POST" >
		                  	@csrf
		                  	@if(session('error'))
		                		<div class="alert alert-danger">
		                		{{session('error')}}
		                		</div>
	                		@endif
		                    <div class="form-group">
		                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
		                    </div>
		                    <div class="form-group">
		                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password">
		                    </div>
		                    <div class="form-group">
		                      <div class="custom-control custom-checkbox small">
		                        <input type="checkbox" class="custom-control-input" name="remember" id="customCheck">
		                        <label class="custom-control-label" for="customCheck">Remember Me</label>
		                      </div>
		                    </div>
		                    <button type="submit" class="btn btn-primary btn-user btn-block">
		                      Login
		                    </button>
	                  	</form>
	                  <hr>
	                  <!-- <div class="text-center">
	                    <a class="small" href="{{ route('register') }}">Create an Account!</a>
	                  </div> -->
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>

	      </div>

	    </div>
@endsection
=======
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Upvex - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}"/>


        <!-- App css -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    </head>
    <body class="authentication-bg authentication-bg-pattern">
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body" style="padding: 2.25rem!important">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="#">
                                        <span><img src="{{asset('assets/img/logo-dark.png')}}" alt="" height="26"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Hellu everyone</p>
                                </div>

								<h5 class="auth-title p-1">Sign In</h5>
                                <form action="{{route('do-login')}}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="text" name="email" id="email" required="" placeholder="Nhập tên tài khoản">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="mat_khau">Password</label>
                                        <input class="form-control" type="password" required="" id="mat_khau" placeholder="Mật khẩu" name="password">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox checkbox-info">
                                            <input type="checkbox" name="remember" class="custom-control-input" id="checkbox-signin">
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>
                                   
                                    @if(session('error')) <div class="alert alert-danger">
                                    {{session('error')}} </div>
                                    @endif
                                   
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-danger btn-block" type="submit">Login</button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
        <footer class="footer footer-alt">
            2019 &copy; Upvex theme by <a href="" class="text-muted">Coderthemes</a> 
        </footer>

        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/app.min.js')}}"></script>
        
    </body>
</html>
>>>>>>> Stashed changes
