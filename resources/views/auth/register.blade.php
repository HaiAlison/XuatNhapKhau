@extends('master.masterpage-login')
@section('container')

<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
      <div class="col-lg-7">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">@if(isset($data)) Edit @else Create @endif an Account!</h1>
          </div>
          <br>
          @if(isset($data))
          <form class="user" method="post" action="{{ route('admin.update-account',['role'=>$role,'id'=>$data->id]) }}" >
          @else
          <form class="user" method="post" action="{{ route('admin.do-create-account') }}" >
          @endif
            @csrf
            <div class="form-group row ">
              <div class="col-sm-4 mb-3 mb-sm-0">
                <label>First name</label>
                <input type="text" class="form-control " name="firstname" id="exampleFirstName" placeholder="First Name" @isset($data) value="{{$data->firstname}}" @endisset>
                @if(count($errors)>0)
                <div class="text-danger">
                  {{$errors->first('firstname')}}
                </div>
                @endif
              </div>

              <div class="col-sm-4">
                <label>Middle name</label>
                <input type="text" class="form-control " name="middlename" @isset($data) value="{{$data->middlename}}" @endisset  id="exampleMiddleName" placeholder="Middle Name">
                @if(count($errors)>0)
                <div class="text-danger">
                  {{$errors->first('middlename')}}
                </div>
                @endif
              </div>

              <div class="col-sm-4">
                <label>Last name</label>
                <input type="text" class="form-control " name="lastname" @isset($data) value="{{$data->lastname}}" @endisset  id="exampleLastName" placeholder="Last Name">
                @if(count($errors)>0)
                <div class="text-danger">
                  {{$errors->first('lastname')}}
                </div>
                @endif
              </div>
            </div>
            <div class="form-group row ">
              <div class="col-sm-6  mb-3 mb-sm-0">
                <label>Email</label>
                <input type="email" class="form-control " name="email" @isset($data) value="{{$data->email}}" @endisset id="exampleInputEmail" placeholder="Email Address">
              </div>
              <div class="col-sm-6">
                <label>Role</label>
                @if(isset($role))
                  <select name="role" class="form-control" disabled="true" >
                    {!! $role == 'admin' ? '<option value="admin" selected>Admin</option>
                    <option  value="employee">Employee</option>' : '
                    <option selected value="employee">Employee</option>
                    <option value="admin" >Admin</option>'!!}
                  </select>
                @else
                  <select name="isAdmin" class="form-control" >
                    <option value="0">Employee</option>
                    <option value="1" >Admin</option>
                  </select>
                @endif
              </div>
              @if(count($errors)>0)
              <div class="text-danger">
                {{$errors->first('email')}}
              </div>
              @endif
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label>Password</label>
                <input type="password" class="form-control " name="password" id="exampleInputPassword" placeholder="Password">
                @if(count($errors)>0)
                <div class="text-danger">
                  {{$errors->first('password')}}
                </div>
                @endif
              </div>
              <div class="col-sm-6">
                <label>Password confirmation</label>
                <input type="password" class="form-control " name="password_confirmation" id="exampleRepeatPassword" placeholder="Repeat Password">
                @if(count($errors)>0)
                <div class="text-danger">
                  {{$errors->first('password_confirmation')}}
                </div>
                @endif
              </div>
            </div>
            
            <button type="submit" class="btn btn-primary btn-user btn-block">
             @if(isset($data))Save @else Register Account @endif
            </button>
            
          </form>
          <hr>
          <div class="text-center">
            <a href="{{ route('admin.index') }}">Back to dashboard</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection

