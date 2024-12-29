@extends('layouts.auth')

@section('main-content')
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Towntor - Real Estate Bootstrap 5 Landing Template</title>
	    <meta name="description" content="Real Estate Bootstrap 5 Landing Template" />
	    <meta name="keywords" content="Onepage, creative, modern, bootstrap 5, multipurpose, clean, Real Estate, buy, sell, Rent" />
	    <meta name="author" content="Shreethemes" />
	    <meta name="website" content="https://shreethemes.in" />
	    <meta name="email" content="support@shreethemes.in" />
	    <meta name="version" content="1.0.0" />
	    <!-- favicon -->
        <link href="images/favicon.ico" rel="shortcut icon">
		<!-- Bootstrap core CSS -->
	    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
	    <!--Material Icon -->
        <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
	    <!-- Custom  Css -->
	    <link href="css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />

    </head>

    <body style="overflow: hidden;">
        <!-- Start Hero -->
        <div class="bg-overlay image-wrap" style="background: url('layout-member/images/bg/03.jpeg') center;"></div>
        <div class="bg-overlay bg-gradient-overlay"></div>
        <section class="bg-home zoom-image d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="p-4 bg-white rounded-3 shadow-md mx-auto w-100" style="max-width: 400px;">
                            
                        @if ($errors->any())
                                    <div class="alert alert-danger border-left-danger" role="alert">
                                        <ul class="pl-4 my-2">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                        
                        <form method="POST" action="{{ route('login') }}" class="user">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                <a href="index.blade.php"><img src="images/logo-icon-80.png" class="mb-4 d-block mx-auto" alt=""></a>
                                <h5 class="mb-3">Please sign in</h5>
                            
                                <div class="form-floating mb-2">
                                    <input type="email" class="form-control" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autofocus>
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="{{ __('Password') }}" required>
                                    <label for="floatingPassword">Password</label>
                                </div>
                            
                                <div class="d-flex justify-content-between">
                                    <div class="mb-3">
                                        <div class="form-check">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                                        </div>
                                    </div>
                                    <!-- <span class="forgot-pass text-muted mb-0"><a href="auth-reset-password.html" class="text-muted">Forgot password ?</a></span> -->
                                </div>
                
                                <button class="btn btn-primary w-100" type="submit">{{ __('Login') }}</button>

                                @if (Route::has('register'))
                                        <div class="col-12 text-center mt-3">
                                            <span><span class="text-muted me-2">Don't have an account ?</span> <a href="{{ route('register') }}" class="text-dark fw-medium">{{ __('Sign Up!') }}</a></span>
                                        </div><!--end col-->      
                                @endif
                            </form>
                        </div>


                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- ENd Hero -->
        
        <!-- javascript -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
	    <!-- Custom -->
	    <script src="js/plugins.init.js"></script>
	    <script src="js/app.js"></script>
        
    </body>

</html>
@endsection