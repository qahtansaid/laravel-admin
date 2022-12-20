<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('admin.title')}} | {{ trans('admin.login') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  @if(!is_null($favicon = Admin::favicon()))
  <link rel="shortcut icon" href="{{$favicon}}">
  @endif

  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{ admin_asset("vendor/laravel-admin/AdminLTE/bootstrap/css/bootstrap.min.css") }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ admin_asset("vendor/laravel-admin/font-awesome/css/font-awesome.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ admin_asset("vendor/laravel-admin/AdminLTE/dist/css/AdminLTE.min.css") }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ admin_asset("vendor/laravel-admin/AdminLTE/plugins/iCheck/square/blue.css") }}">

  <link href="{{ admin_asset("dastone/assets/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ admin_asset("dastone/assets/css/icons.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ admin_asset("dastone/assets/css/metisMenu.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ admin_asset("dastone/assets/plugins/daterangepicker/daterangepicker.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ admin_asset("dastone/assets/css/app.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ admin_asset("dastone/assets/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ admin_asset("dastone/assets/css/custom.css") }}" rel="stylesheet" type="text/css" />


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="account-body accountbg">


  <div class="container">
      <div class="row vh-100 d-flex justify-content-center">
          <div class="col-12 align-self-center">
              <div class="row">
                  <div class="col-lg-5 mx-auto">
                      <div class="card">
                          <div class="card-body p-0 auth-header-box">
                              <div class="text-center p-3">
                                  <a href="index" class="logo logo-admin">
                                      <img src="{{ URL::asset('assets/images/logo-sm-dark.png') }}" height="50" alt="logo" class="auth-logo">
                                  </a>
                                  <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Lets Get Started Dastone</h4>
                                  <p class="text-muted  mb-0">Sign in to continue to Dastone.</p>
                              </div>
                          </div>
                          <div class="card-body p-0">
                              <ul class="nav-border nav nav-pills" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#LogIn_Tab" role="tab">Log In</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#Register_Tab" role="tab">Register</a>
                                  </li>
                              </ul>
                              <!-- Tab panes -->
                              <div class="tab-content">
                                  <div class="tab-pane active  p-3" id="LogIn_Tab" role="tabpanel">

                                      @if(Session::has('success'))
                                          <div class="alert alert-success text-center">
                                              {{Session::get('success')}}
                                          </div>
                                      @endif
                                      <form class="form-horizontal auth-form" action="{{ admin_url('auth/login') }}" method="post">
                                          @csrf
                                          <div class="form-group mb-2">
                                              <label class="form-label" for="username">Username</label>
                                              <div class="input-group">
                                                  <input name="username" type="username" class="form-control @error('email') is-invalid @enderror" value="" id="username" placeholder="{{ trans('admin.username') }}" autofocus>
                                                  @if($errors->has('username'))
                                                  @foreach($errors->get('username') as $message)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                  @endforeach
                                                  @endif
                                                  
                                              </div>
                                          </div>

                                          <div class="form-group mb-2">
                                              <label class="form-label" for="userpassword">Password</label>
                                              <div class="input-group">
                                                  <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="userpassword" value="" placeholder="{{ trans('admin.password') }}" aria-label="Password" aria-describedby="password-addon">
                                                  @if($errors->has('password'))
                                                    @foreach($errors->get('password') as $message)
                                                      <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
                                                    @endforeach
                                                  @endif
                                              </div>
                                          </div>

                                          <div class="form-group row my-3">
                                              <div class="col-sm-6">
                                                  <div class="custom-control custom-switch switch-success">
                                                      <input class="form-check-input" type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                      <label class="form-check-label" for="remember"> Remember me </label>
                                                  </div>
                                              </div>
                                              <!--end col-->
                                              {{-- <div class="col-sm-6 text-end">
                                                  @if (Route::has('password.request'))
                                                  <a href="{{ route('password.request') }}" class="text-muted font-13">
                                                      <i class="dripicons-lock"></i>
                                                      Forgot password?
                                                  </a>
                                                  
                                                  @endif
                                              </div> --}}
                                              <!--end col-->
                                          </div>
                                          <!--end form-group-->

                                          <div class="form-group mb-0 row">
                                              <div class="col-12">
                                                  <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ms-1"></i></button>
                                              </div>
                                              <!--end col-->
                                          </div>
                                          <!--end form-group-->
                                      </form>
                                      <!--end form-->
                                      <div class="m-3 text-center text-muted">
                                          <p class="mb-0">Do not have an account ? <a href="" class="text-primary ms-2">Free Register</a></p>
                                      </div>
                                      <div class="account-social">
                                          <h6 class="mb-3">Or Login With</h6>
                                      </div>
                                      <div class="btn-group w-100">
                                          <button type="button" class="btn btn-sm btn-outline-secondary">Facebook</button>
                                          <button type="button" class="btn btn-sm btn-outline-secondary">Twitter</button>
                                          <button type="button" class="btn btn-sm btn-outline-secondary">Google</button>
                                      </div>
                                  </div>
                                  <div class="tab-pane px-3 pt-3" id="Register_Tab" role="tabpanel">

                                     {{-- @if(Session::has('success'))
                                          <div class="alert alert-success text-center">
                                              {{Session::get('success')}}
                                          </div>
                                      @endif --}}

                                      <form class="form-horizontal auth-form" method="POST" action="" enctype="multipart/form-data">
                                          @csrf
                                          <div class="form-group mb-2">
                                              <label class="form-label" for="username">Username</label>
                                              <div class="input-group">
                                                  <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="username" name="name" autofocus required placeholder="Enter username">
                                                  @error('name')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>


                                          <div class="form-group mb-2">
                                              <label class="form-label" for="useremail">Email</label>
                                              <div class="input-group">
                                                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="useremail" value="{{ old('email') }}" name="email" placeholder="Enter email" autofocus>
                                                  @error('email')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>


                                          <div class="form-group mb-2">
                                              <label class="form-label" for="userpassword">Password</label>
                                              <div class="input-group">
                                                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" name="password" placeholder="Enter password" autofocus>
                                                  @error('password')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                  @enderror
                                              </div>
                                          </div>


                                          <div class="form-group mb-2">
                                              <label class="form-label" for="conf_password">Confirm Password</label>
                                              <div class="input-group">
                                                  <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmpassword" name="password_confirmation" placeholder="Enter Confirm password" autofocus>
                                                  @error('password_confirmation')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                  @enderror
                                              </div>
                                          </div>


                                          <div class="form-group mb-2">
                                              <label class="form-label" for="mo_number">Mobile Number</label>
                                              <div class="input-group">
                                                  <input type="text" class="form-control @error('mobilenumber') is-invalid @enderror" id="mo_number" name="mobilenumber" placeholder="Enter Mobile Number" autofocus>
                                                  @error('mobilenumber')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                  @enderror
                                              </div>
                                          </div>


                                          <div class="from-group mb-2">
                                              <label class="form-label" for="avatar">Profile Picture</label>
                                              <div class="input-group">
                                                  <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="inputGroupFile02" name="avatar" autofocus>
                                                  <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                              </div>
                                              @error('avatar')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                          </div>

                                          <div class="form-group row my-3">
                                              <div class="col-sm-12">
                                                  <div class="custom-control custom-switch switch-success">
                                                      <input type="checkbox" class="custom-control-input" id="customSwitchSuccess2">
                                                      <label class="form-label text-muted" for="customSwitchSuccess2">You agree to the Dastone <a href="#" class="text-primary">Terms of Use</a></label>
                                                  </div>
                                              </div>
                                              <!--end col-->
                                          </div>
                                          <!--end form-group-->

                                          <div class="form-group mb-0 row">
                                              <div class="col-12">
                                                  <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Register <i class="fas fa-sign-in-alt ms-1"></i></button>
                                              </div>
                                              <!--end col-->
                                          </div>
                                          <!--end form-group-->
                                      </form>
                                      <!--end form-->
                                      <p class="my-3 text-muted">Already have an account ? <a href="{{ url('login') }}" class="text-primary ms-2">Log in</a></p>
                                  </div>
                              </div>
                          </div>

                          <div class="card-body bg-light-alt text-center">
                              <span class="text-muted d-none d-sm-inline-block">Mannatthemes © <script>
                                      document.write(new Date().getFullYear())

                                  </script></span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
{{-- <body class="hold-transition login-page" @if(config('admin.login_background_image'))style="background: url({{config('admin.login_background_image')}}) no-repeat;background-size: cover;"@endif>
<div class="login-box">
  <div class="login-logo">
    <a href="{{ admin_url('/') }}"><b>{{config('admin.name')}}</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">{{ trans('admin.login') }}</p>

    <form action="{{ admin_url('auth/login') }}" method="post">
      <div class="form-group has-feedback {!! !$errors->has('username') ?: 'has-error' !!}">

        @if($errors->has('username'))
          @foreach($errors->get('username') as $message)
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
          @endforeach
        @endif

        <input type="text" class="form-control" placeholder="{{ trans('admin.username') }}" name="username" value="{{ old('username') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback {!! !$errors->has('password') ?: 'has-error' !!}">

        @if($errors->has('password'))
          @foreach($errors->get('password') as $message)
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
          @endforeach
        @endif

        <input type="password" class="form-control" placeholder="{{ trans('admin.password') }}" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          @if(config('admin.auth.remember'))
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" value="1" {{ (!old('username') || old('remember')) ? 'checked' : '' }}>
              {{ trans('admin.remember_me') }}
            </label>
          </div>
          @endif
        </div>
        <div class="col-xs-4">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('admin.login') }}</button>
        </div>
      </div>
    </form>

  </div>
</div>

<script src="{{ admin_asset("vendor/laravel-admin/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js")}}"></script>
<script src="{{ admin_asset("vendor/laravel-admin/AdminLTE/bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{ admin_asset("vendor/laravel-admin/AdminLTE/plugins/iCheck/icheck.min.js")}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' 
    });
  });
</script>
</body> --}}
<script src="{{ admin_asset("dastone/assets/js/jquery.min.js") }}"></script>
    <script src="{{ admin_asset("dastone/assets/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ admin_asset("dastone/assets/js/metismenu.min.js") }}"></script>
    <script src="{{ admin_asset("dastone/assets/js/waves.js") }}"></script>
    <script src="{{ admin_asset("dastone/assets/js/feather.min.js") }}"></script>
    <script src="{{ admin_asset("dastone/assets/js/simplebar.min.js") }}"></script>
    <script src="{{ admin_asset("dastone/assets/js/moment.js") }}"></script>
    <script src="{{ admin_asset("dastone/assets/plugins/daterangepicker/daterangepicker.js") }}"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' 
    });
  });
</script>
</body>
</html>
