<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>AktiviTelU</title>
	    <meta name="version" content="1.0.0" />
	    <!-- favicon -->
        <link href="images/logo-icon-40.png" rel="shortcut icon">
        <!-- <link rel="icon" type="layout-member/image/favicon.png" href="{{ asset('favicon.png') }}"> -->
		<!-- Bootstrap core CSS -->
	    <link href="{{ asset('layout-member/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" />
        <!-- Slider -->
        <link href="{{ asset('layout-member/css/tiny-slider.css') }}" rel="stylesheet" />
        <!-- Tobii -->
        <link href="{{ asset('layout-member/css/tobii.min.css') }}" rel="stylesheet" type="text/css" />
	    <!--Material Icon -->
        <link href="{{ asset('layout-member/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
	    <!-- Custom  Css -->
	    <link href="{{ asset('layout-member/css/style.css') }}" rel="stylesheet" type="text/css" id="theme-opt" />
	</head>

	<body>
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <!-- <div class="container">                 -->
                <div class="menu-extras">
                    <div class="menu-item">
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </div>
                </div>
                
                <ul class="buy-button list-inline mb-0">
                    <li class="list-inline-item ps-1 mb-0">
                        <div class="dropdown">
                            
                            <button type="button" class="dropdown-toggle btn btn-sm btn-icon btn-pills btn-primary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="search" class="icons"></i>
                            </button>

                            <div class="dropdown-menu dd-menu dropdown-menu-end bg-white rounded-3 border-0 mt-3 p-0" style="width: 240px;">
                                <div class="search-bar">
                                    <div id="itemSearch" class="menu-search mb-0">
                                        <form role="search" method="get" id="searchItemform" class="searchform">
                                            <input type="text" class="form-control rounded-3 border" name="s" id="searchItem" placeholder="Search...">
                                            <input type="submit" id="searchItemsubmit" value="Search">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-inline-item">
                        <a href="{{ route('home.biodata') }}" class="btn ">Tiket  <i data-feather="user" class="icons"></i></a>
                    </li>

                    <li class="list-inline-item">
                        <a href="{{ route('logout') }}" class="btn ">Logout</a>
                    </li>

                </ul>
                
                <!-- <div id="navigation"> -->
                    <ul class="navigation-menu nav-left">
                    <li>
                        <a class="logo center" href="{{ route('home') }}">
                            <img src="{{ asset('layout-member/images/logo-dark.png') }}" class="logo-light-mode" alt="">
                            <!-- <img src="{{ asset('layout-member/images/logo-light.png') }}" class="logo-dark-mode" alt=""> -->
                        </a>
                    </li>
                        <li class="has-submenu parent-menu-item">
                            <!-- javascript:void(0) -->
                            <a href="index.blade.php">Kategori</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="list.blade.php" class="sub-menu-item">UKM Sosial</a></li>
                                <li><a href="list.blade.php" class="sub-menu-item">UKM Kesenian</a></li>
                                <li><a href="list.blade.php" class="sub-menu-item">UKM Penalaran</a></li>
                                <li><a href="list.blade.php" class="sub-menu-item">UKM Olahraga</a></li>
                                <li><a href="list.blade.php" class="sub-menu-item">UKM Kerohanian</a></li>
                                <li><a href="list.blade.php" class="sub-menu-item">Lainnya</a></li>
                            </ul>
                        </li>
                        
                        <li class="list-inline-item">
                            <a href="{{ route('home.event') }}" class="btn ">Event</a>
                        </li>

                        <!-- <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Pages</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Auth Pages </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="auth-login.blade.php" class="sub-menu-item">Login</a></li>
                                        <li><a href="auth-signup.blade.php" class="sub-menu-item">Signup</a></li>
                                        <li><a href="auth-re-password.blade.php" class="sub-menu-item">Login as Admin</a></li>
                                        <li><a href="auth-re-password.blade.php" class="sub-menu-item">Login as Pengurus UKM</a></li>
                                        <li><a href="tambah-UKM.blade.php" class="sub-menu-item">Tambah UKM</a></li>
                                        <li><a href="tambah-kegiatan.blade.php" class="sub-menu-item">Tambah Kegiatan UKM</a></li>
                                        <li><a href="tambah-event.blade.php" class="sub-menu-item">Tambah Event</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                <!-- </div> -->
            </div>
        </header>
        <!-- Navbar End -->

        @yield('content')

        <!-- Footer Start -->
        <section class="bg-building-pic d-table w-100" style="background: url('{{ asset('layout-member/images/building.png') }}') bottom no-repeat;"></section>

        <footer class="bg-footer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-py-60 footer-border">
                            <div class="row d-flex">
                                <div class="col-lg-5 col-12 mb-0 mb-md-4 pb-0 pb-md-2 ">
                                    <a href="#" class="logo-footer">
                                        <img src="{{ asset('layout-member/images/logo-light.png') }}" alt="">
                                    </a>
                                    <p class="mt-4">AktiviTelU ini memudahkan mahasiswa untuk mengakses dan berpartisipasi dalam kegiatan dengan mudah dan mandiri.</p>
                                    <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                                        <!-- <li class="list-inline-item"><a href="https://1.envato.market/towntor" target="_blank" class="rounded-3"><i data-feather="shopping-cart" class="fea icon-sm align-middle" title="Buy Now"></i></a></li> -->
                                    </ul>
                                </div>

                                <div class="col-lg-5 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0 float-end p-2 ms-auto">
                                    <h5 class="footer-head">Contact Details</h5>

                                    <div class="d-flex mt-4">
                                        <i data-feather="map-pin" class="fea icon-sm text-primary mt-1 me-3"></i>
                                        <div class="">
                                            <p class="mb-2">Jl. Telekomunikasi. 1, Terusan Buahbatu - <br> Bojongsoang,Telkom University, Sukapura Kec. <br>Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257
                                            <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5068.360574943197!2d107.63149195990101!3d-6.972987141768293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9adf177bf8d%3A0x437398556f9fa03!2sTelkom%20University!5e1!3m2!1sen!2sid!4v1729069172269!5m2!1sen!2sid" data-type="iframe" class="text-primary lightbox"><br>View on Google map</a>
                                        </div>
                                    </div>
                                </div><!--end col-->


                            </div><!--end row-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="footer-py-30 footer-bar">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class="text-center">
                                <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> AktiviTelU. Design with <i class="mdi mdi-heart text-danger"></i> by Lavio, Kresna, Rafif, Ali, and Kevin</a>.</p>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div>
        </footer><!--end footer-->
        <!-- Footer End -->

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top rounded-pill fs-5"><i data-feather="arrow-up" class="fea icon-sm align-middle"></i></a>
        <!-- Back to top -->

        <!-- JAVASCRIPTS -->
	    <script src="{{ asset('layout-member/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Tiny slider -->
        <script src="{{ asset('layout-member/js/tiny-slider.js') }}"></script>
        <!-- Tobii -->
        <script src="{{ asset('layout-member/js/tobii.min.js') }}"></script>
        <!-- Icons -->
        <script src="{{ asset('layout-member/js/feather.min.js') }}"></script>
	    <!-- Custom -->
	    <script src="{{ asset('layout-member/js/plugins.init.js') }}"></script>
	    <script src="{{ asset('layout-member/js/app.js') }}"></script>
    </body>
</html>