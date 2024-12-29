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

    <body  style="overflow: hidden;">        
        <div class="bg-overlay image-wrap" style="background: url('layout-member/images/bg/03.jpg') center;"></div>
        <div class="bg-overlay bg-gradient-overlay"></div>
        <section class="bg-home zoom-image d-flex align-items-center">
            <div class="container ">
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
                        
                            <form method="POST" action="{{ route('register') }}" class="user">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <!-- <a href="index.blade.php"><img src="images/logo-icon-80.png" class="mb-4 d-block mx-auto" alt=""></a> -->
                                <h5 class="mb-3">Registrasi Akun</h5>
                            
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                                    <label for="floatingInput">Nama Lengkap</label>
                                </div>
                                
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control"  name="no_telepon" placeholder="{{ __('Nomor Telepon') }}" value="{{ old('no_telepon') }}" required>
                                    <label for="floatingInput">Nomor Telepon</label>
                                </div>

                                <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="Laki-Laki" {{ old('jenis_kelamin') }}>Laki-Laki</option>
                                            <option value="Perempuan" {{ old('jenis_kelamin') }}>Perempuan</option>
                                        </select>
                                </div>

                                <div class="form-floating mb-2">
                                    <input type="email" class="form-control" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
                                    <label for="floatingEmail">Email</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="{{ __('Password') }}" required>
                                    <label for="floatingPassword">Password</label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
                                    <label for="floatingPassword">Re-enter Password</label>
                                </div>
                
                                <button class="btn btn-primary w-100" type="submit">{{ __('Register') }}</button>

                                <div class="col-12 text-center mt-3">
                                    <span><span class="text-muted me-2">Already have an account ? </span> <a href="{{ route('login') }}" class="text-dark fw-medium"> {{ __('Login!') }}</a></span>
                                </div><!--end col-->
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