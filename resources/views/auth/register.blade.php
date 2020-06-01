@extends('masterpages.masterpage-login')
@section('container')

<div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" action="{{ route('do-register') }}" >
                @csrf
                <div class="form-group row ">
                  <div class="col-sm-3 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="fname" id="exampleFirstName" placeholder="First Name">
                    @if(count($errors)>0)
                        <div class="text-danger">
                            {{$errors->first('firstname')}}
                        </div>
                    @endif
                  </div>
                  
                  <div class="col-sm-3">
                    <input type="text" class="form-control form-control-user" name="mname"  id="exampleMiddleName" placeholder="Middle Name">
                    @if(count($errors)>0)
                        <div class="text-danger">
                            {{$errors->first('middlename')}}
                        </div>
                    @endif
                  </div>

                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="lname"  id="exampleLastName" placeholder="Last Name">
                    @if(count($errors)>0)
                        <div class="text-danger">
                            {{$errors->first('lastname')}}
                        </div>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" placeholder="Email Address">
                  @if(count($errors)>0)
                        <div class="text-danger">
                            {{$errors->first('email')}}
                        </div>
                  @endif
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                    @if(count($errors)>0)
                        <div class="text-danger">
                            {{$errors->first('password')}}
                        </div>
                    @endif
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="password_confirmation" id="exampleRepeatPassword" placeholder="Repeat Password">
                    @if(count($errors)>0)
                        <div class="text-danger">
                            {{$errors->first('password_confirmation')}}
                        </div>
                    @endif
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="#">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="{{ route('login')}}">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
@endsection
 
