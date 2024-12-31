@extends('layouts.member')

@section('content')
    <!-- Hero Start -->
    <section class="position-relative mt-5 pt-4">
        <div class="container-fluid px-lg-5 px-2 mt-2">
            <div class="bg-half-260 d-table w-100 shadow rounded-3 overflow-hidden" id="home">
                <div class="bg-overlay" style="background: url('{{ asset('layout-member/images/bg/03.jpg') }}') top no-repeat fixed;" id="hero-images"></div>
                <div class="bg-overlay bg-black opacity-50"></div>

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-heading">
                                <h4 class="heading fw-bold text-white title-dark mb-3">Ayo Berorganisasi!</h4>
                                    <p class="para-desc text-white title-dark mb-0">Silahkan cari UKM yang ingin diikuti</p>  

                                    <div class="subscribe-form mt-4">  
                                        <form class="me-auto" action="{{ route('ukm.search') }}" method="GET">  
                                            <div class="mb-0">  
                                                <input type="text" id="help" name="name" class="shadow rounded-3 bg-white" required placeholder="Nama UKM">  
                                                <button type="submit" class="btn btn-primary rounded-3">Search</button>  
                                            </div>  
                                        </form>  
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div><!--end container-->
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- Hero End -->

    <!-- Start -->
    <section class="section pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 mt-sm-0 pt-sm-0">
                    <div class="features-absolute">
                        <div class="row row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-1 g-4 mt-0">


                            <div class="col">  
                                <div class="categories position-relative overflow-hidden rounded-3 shadow">  
                                    <img src="{{ asset('layout-member/images/property/UKM Sosial.jpg') }}" class="img-fluid" alt="">
                                    <div class="p-3">  
                                        <a href="{{ route('ukm.listByCategory', ['kategori' => 'sosial']) }}" class="title text-dark fs-5 fw-medium">UKM Sosial</a>  
                                        <p class="text-muted small mb-0">{{ $ukmCounts['sosial'] }} UKM</p>  
                                    </div>  
                                </div>  
                            </div>



                            <div class="col">  
                                <div class="categories position-relative overflow-hidden rounded-3 shadow">  
                                    <img src="{{ asset('layout-member/images/property/UKM Kesenian.jpg') }}" class="img-fluid" alt="">
                                    <div class="p-3">  
                                        <a href="{{ route('ukm.listByCategory', ['kategori' => 'kesenian']) }}" class="title text-dark fs-5 fw-medium">UKM Kesenian</a>  
                                        <p class="text-muted small mb-0">{{ $ukmCounts['kesenian'] }} UKM</p>  
                                    </div>  
                                </div>  
                            </div>


                            <div class="col">  
                                <div class="categories position-relative overflow-hidden rounded-3 shadow">  
                                    <img src="{{ asset('layout-member/images/property/UKM Penalaran.jpg') }}" class="img-fluid" alt=""> 
                                    <div class="p-3">  
                                        <a href="{{ route('ukm.listByCategory', ['kategori' => 'penalaran']) }}" class="title text-dark fs-5 fw-medium">UKM Penalaran</a>  
                                        <p class="text-muted small mb-0">{{ $ukmCounts['penalaran'] }} UKM</p>  
                                    </div>  
                                </div>  
                            </div>


                            <div class="col">  
                                <div class="categories position-relative overflow-hidden rounded-3 shadow">  
                                    <img src="{{ asset('layout-member/images/property/UKM Olahraga.jpg') }}" class="img-fluid" alt="">  
                                    <div class="p-3">  
                                        <a href="{{ route('ukm.listByCategory', ['kategori' => 'olahraga']) }}" class="title text-dark fs-5 fw-medium">UKM Olahraga</a>  
                                        <p class="text-muted small mb-0">{{ $ukmCounts['olahraga'] }} UKM</p>  
                                    </div>  
                                </div>  
                            </div>



                            <div class="col">  
                                <div class="categories position-relative overflow-hidden rounded-3 shadow">  
                                    <img src="{{ asset('layout-member/images/property/UKM Kerohanian.jpg') }}" class="img-fluid" alt=""> 
                                    <div class="p-3">  
                                        <a href="{{ route('ukm.listByCategory', ['kategori' => 'kerohanian']) }}" class="title text-dark fs-5 fw-medium">UKM Kerohanian</a>  
                                        <p class="text-muted small mb-0">{{ $ukmCounts['kerohanian'] }} UKM</p>  
                                    </div>  
                                </div>  
                            </div>

                        </div><!--end row-->
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="about-left">
                        <div class="position-relative shadow p-2 rounded-top-pill rounded-5 bg-white img-one">
                            <img src="{{ asset('layout-member/images/hero.jpg') }}" class="img-fluid rounded-top-pill rounded-5" alt="work-image">

                            <!-- <div class="cta-video">
                                <a href="#!" data-type="youtube" data-id="yba7hPeTSjk" class="avatar avatar-md-md rounded-pill shadow card d-flex justify-content-center align-items-center lightbox">
                                    <i class="mdi mdi-play mdi-24px text-primary"></i>
                                </a>
                            </div> -->

                            <div class="position-absolute top-0 start-0 z-n1">
                                <img src="{{ asset('layout-member/images/svg/dots.svg') }}" class="avatar avatar-xl-large" alt="">
                            </div>
                        </div>

                        <div class="img-two shadow rounded-3 overflow-hidden p-2 bg-white">
                            <img src="{{ asset('layout-member/images/svg/session_Flatline.svg') }}" class="img-fluid rounded-3" alt="work-image">
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-6 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="section-title ms-lg-5">
                        <h6 class="text-primary fw-medium mb-2">Our story: AktiviTelU</h6>
                        <h4 class="title mb-3">Engagement. <br> Collaboration. Connection.</h4>
                        <p class="text-muted para-desc mb-0"> AktiviTelU mengembangkan sebuah platform yang dirancang sebagai 'gerbang virtual' untuk menghubungkan mahasiswa Telkom University dengan beragam aktivitas dan organisasi di kampus. Platform ini memudahkan mahasiswa untuk mengakses dan berpartisipasi dalam kegiatan dengan mudah dan mandiri. AktiviTelU menghadirkan aktivitas yang beragam, kolaborasi antar mahasiswa, dan koneksi yang memperkaya pengalaman di kampus. AktiviTelU adalah redefinisi kegiatan mahasiswa di era digital.</p>

                        <!-- <div class="mt-4">
                            <a href="aboutus.html" class="btn btn-pills btn-primary">Read More <i class="mdi mdi-arrow-right align-middle"></i></a>
                        </div> -->
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title mb-3">Featured UKM</h4>
                        <p class="text-muted para-desc mb-0 mx-auto">List seluruh UKM yang ada di Telkom University.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row g-4 mt-0">
                @foreach ($ukms as $ukm)
                    <div class="col-lg-6 col-12">
                        <div class="card property property-list border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="d-md-flex">
                                <div class="property-image position-relative overflow-hidden shadow flex-md-shrink-0 rounded-3 m-2">
                                    <img src="{{ asset($ukm->logo_ukm) }}" class="img-fluid h-100 w-100" alt="">
                                    <!-- <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul> -->
                                </div>
                                <div class="card-body content p-3">
                                    <a href="UKM-detail.blade.php" class="title fs-5 text-dark fw-medium">
                                        {{ $ukm->nama_ukm }}
                                    </a>

                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-account-check fs-5 me-2 text-primary"></i>
                                            <span class="text-muted fs-6">{{ $ukm->members_count }} Orang</span>
                                        </li>

                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-content-paste fs-5 me-2 text-primary"></i>
                                        <span class="text-muted fs-6">{{ $ukm->kegiatan_count }} Proker</span>
                                        </li>
                                    </ul>
                                    <a href="{{ route('home.ukm', ['ukm' => $ukm->id]) }}" class="btn btn-primary w-100">Detail UKM</a>
                                </div>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                @endforeach

                <!-- <div class="col-12 mt-4 pt-2">
                    <div class="text-center">
                        <a href="list.blade.php" class="mt-3 fs-6 text-primary">View More UKM <i class="mdi mdi-arrow-right align-middle"></i></a>
                    </div>
                </div> -->
            </div><!--end row-->
        </div><!--end container-->


        
        <div class="container-fluid mt-100 mt-60">
            <div class="position-relative overflow-hidden rounded-4 shadow py-5" style="background: url('{{ asset('layout-member/images/bg/05.jpg') }}') center center fixed;">
                <div class="bg-overlay"></div>
                <div class="container">
                    <div class="row">

                      <div class="col py-4">  
                          <div class="counter-box text-center">  
                              <h1 class="mb-0 text-white fw-bold"><span class="counter-value" data-target="{{ $ukmcount }}">{{ $ukmcount }}</span></h1>  
                              <h6 class="counter-head text-white fs-5 fw-semibold mb-0">UKM</h6>  
                          </div><!--end counter box-->  
                      </div><!--end col-->  

                      <div class="col py-4">  
                          <div class="counter-box text-center">  
                              <h1 class="mb-0 text-white fw-bold"><span class="counter-value" data-target="5">5</span></h1>  
                              <h6 class="counter-head text-white fs-5 fw-semibold mb-0">Kategori</h6>  
                          </div><!--end counter box-->  
                      </div><!--end col-->  

                      <div class="col py-4">  
                          <div class="counter-box text-center">  
                              <h1 class="mb-0 text-white fw-bold"><span class="counter-value" data-target="{{ $kegiatan }}">{{ $kegiatan }}</span></h1>  
                              <h6 class="counter-head text-white fs-5 fw-semibold mb-0">Kegiatan</h6>  
                          </div>  
                      </div>  

                      <div class="col py-4">  
                          <div class="counter-box text-center">  
                              <h1 class="mb-0 text-white fw-bold"><span class="counter-value" data-target="{{ $event }}">{{ $event }}</span></h1>  
                              <h6 class="counter-head text-white fs-5 fw-semibold mb-0">Event</h6>  
                          </div>  
                      </div>
                      
                    </div><!--end row-->
                </div><!--end container-->
            </div>
        </div><!--end container fluid-->

        <div class="container mt-100 mt-60">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title mb-3">Developer</h4>
                        <p class="text-muted para-desc mb-0 mx-auto">Seseorang yang ingin mendapatkan IPK 4</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row g-4 mt-0">
                <!-- First row with 3 items -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card team team-primary text-center">
                        <div class="card-img team-image d-inline-block mx-auto rounded-pill avatar avatar-ex-large overflow-hidden">
                            <img src="{{ asset('layout-member/images/client/01.jpg') }}" class="img-fluid" alt="">
                            <div class="card-overlay avatar avatar-ex-large rounded-pill"></div>
                            <ul class="list-unstyled team-social mb-0">
                                <!-- <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-sm btn-pills btn-icon"><i data-feather="facebook" class="icons fea-social"></i></a></li> -->
                                <li class="list-inline-item"><a href="https://www.instagram.com/kresn.mw/" class="btn btn-sm btn-pills btn-icon"><i data-feather="instagram" class="icons fea-social"></i></a></li>
                                <!-- <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-sm btn-pills btn-icon"><i data-feather="twitter" class="icons fea-social"></i></a></li> -->
                            </ul>
                        </div>
                        <div class="content mt-3">
                            <a href="page-team-detail.blade.php" class="text-dark h5 mb-0 title">Kresna Mukti</a>
                            <h6 class="text-muted mb-0 fw-normal">Fullstack Developer</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card team team-primary text-center">
                        <div class="card-img team-image d-inline-block mx-auto rounded-pill avatar avatar-ex-large overflow-hidden">
                            <img src="{{ asset('layout-member/images/client/02.jpg') }}" class="img-fluid" alt="">
                            <div class="card-overlay avatar avatar-ex-large rounded-pill"></div>
                            <ul class="list-unstyled team-social mb-0">
                                <!-- <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-sm btn-pills btn-icon"><i data-feather="facebook" class="icons fea-social"></i></a></li> -->
                                <li class="list-inline-item"><a href="https://www.instagram.com/laviioo/" class="btn btn-sm btn-pills btn-icon"><i data-feather="instagram" class="icons fea-social"></i></a></li>
                                <!-- <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-sm btn-pills btn-icon"><i data-feather="twitter" class="icons fea-social"></i></a></li> -->
                            </ul>
                        </div>
                        <div class="content mt-3">
                            <a href="page-team-detail.blade.php" class="text-dark h5 mb-0 title">Lavio Putra</a>
                            <h6 class="text-muted mb-0 fw-normal">Fullstack Developer</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card team team-primary text-center">
                        <div class="card-img team-image d-inline-block mx-auto rounded-pill avatar avatar-ex-large overflow-hidden">
                            <img src="{{ asset('layout-member/images/client/03.jpg') }}" class="img-fluid" alt="">
                            <div class="card-overlay avatar avatar-ex-large rounded-pill"></div>
                            <ul class="list-unstyled team-social mb-0">
                                <!-- <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-sm btn-pills btn-icon"><i data-feather="facebook" class="icons fea-social"></i></a></li> -->
                                <li class="list-inline-item"><a href="https://www.instagram.com/kevinhisham/" class="btn btn-sm btn-pills btn-icon"><i data-feather="instagram" class="icons fea-social"></i></a></li>
                                <!-- <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-sm btn-pills btn-icon"><i data-feather="twitter" class="icons fea-social"></i></a></li> -->
                            </ul>
                        </div>
                        <div class="content mt-3">
                            <a href="page-team-detail.blade.php" class="text-dark h5 mb-0 title">Kevin Hisham Dewanto</a>
                            <h6 class="text-muted mb-0 fw-normal">Fullstack Developer</h6>
                        </div>
                    </div>
                </div>
            </div><!--end row-->

            <div class="row g-4 mt-0">
                <!-- Second row with 2 items -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card team team-primary text-center">
                        <div class="card-img team-image d-inline-block mx-auto rounded-pill avatar avatar-ex-large overflow-hidden">
                            <img src="{{ asset('layout-member/images/client/04.jpg') }}" class="img-fluid" alt="">
                            <div class="card-overlay avatar avatar-ex-large rounded-pill"></div>
                            <ul class="list-unstyled team-social mb-0">
                                <!-- <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-sm btn-pills btn-icon"><i data-feather="facebook" class="icons fea-social"></i></a></li> -->
                                <li class="list-inline-item"><a href="https://www.instagram.com/rafifdzaky/" class="btn btn-sm btn-pills btn-icon"><i data-feather="instagram" class="icons fea-social"></i></a></li>
                                <!-- <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-sm btn-pills btn-icon"><i data-feather="twitter" class="icons fea-social"></i></a></li> -->
                            </ul>
                        </div>
                        <div class="content mt-3">
                            <a href="page-team-detail.blade.php" class="text-dark h5 mb-0 title">Rafif Dzaky</a>
                            <h6 class="text-muted mb-0 fw-normal">Fullstack Developer</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card team team-primary text-center">
                        <div class="card-img team-image d-inline-block mx-auto rounded-pill avatar avatar-ex-large overflow-hidden">
                            <img src="{{ asset('layout-member/images/client/05.jpg') }}" class="img-fluid" alt="">
                            <div class="card-overlay avatar avatar-ex-large rounded-pill"></div>
                            <ul class="list-unstyled team-social mb-0">
                                <!-- <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-sm btn-pills btn-icon"><i data-feather="facebook" class="icons fea-social"></i></a></li> -->
                                <li class="list-inline-item"><a href="https://www.instagram.com/haidirr.ali/" class="btn btn-sm btn-pills btn-icon"><i data-feather="instagram" class="icons fea-social"></i></a></li>
                                <!-- <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-sm btn-pills btn-icon"><i data-feather="twitter" class="icons fea-social"></i></a></li> -->
                            </ul>
                        </div>
                        <div class="content mt-3">
                            <a href="page-team-detail.blade.php" class="text-dark h5 mb-0 title">Haidir Ali</a>
                            <h6 class="text-muted mb-0 fw-normal">Fullstack Developer</h6>
                        </div>
                    </div>
                </div>
            </div><!--end row-->


        <!-- <div class="container mt-100 mt-60">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title mb-3">Blogs or News</h4>
                        <p class="text-muted para-desc mb-0 mx-auto">Tempat dimana UKM Membuat Blog untuk proker yang telah dikerjakannya.</p>
                    </div>
                </div>
            </div>end row -->

            <!-- <div class="row g-4 mt-0">
                <div class="col-lg-4 col-md-6">
                    <div class="card blog blog-primary shadow rounded-3 overflow-hidden border-0">
                        <div class="card-img blog-image position-relative overflow-hidden rounded-0">
                            <div class="position-relative overflow-hidden">
                                <img src="images/property/1.jpg" class="img-fluid" alt="">
                                <div class="card-overlay"></div>
                            </div>

                            <div class="blog-tag p-3">
                                <a href="" class="badge bg-primary">Towntor</a>
                            </div>
                        </div>

                        <div class="card-body content p-0">
                            <div class="p-4">
                                <a href="blog-detail.html" class="title fw-medium fs-5 text-dark">Skills That You Can Learn In The Real Estate Market</a>
                                <p class="text-muted mt-2">The most well-known dummy text is the 'Lorem Ipsum', in the 16th century.</p>

                                <a href="" class="text-dark read-more">Read More <i class="mdi mdi-chevron-right align-middle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>end col -->

                <!-- <div class="col-lg-4 col-md-6">
                    <div class="card blog blog-primary shadow rounded-3 overflow-hidden border-0">
                        <div class="card-img blog-image position-relative overflow-hidden rounded-0">
                            <div class="position-relative overflow-hidden">
                                <img src="images/property/2.jpg" class="img-fluid" alt="">
                                <div class="card-overlay"></div>
                            </div>

                            <div class="blog-tag p-3">
                                <a href="" class="badge bg-primary">Towntor</a>
                            </div>
                        </div>

                        <div class="card-body content p-0">
                            <div class="p-4">
                                <a href="blog-detail.html" class="title fw-medium fs-5 text-dark">Learn The Truth About Real Estate Industry</a>
                                <p class="text-muted mt-2">The most well-known dummy text is the 'Lorem Ipsum', in the 16th century.</p>

                                <a href="" class="text-dark read-more">Read More <i class="mdi mdi-chevron-right align-middle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>end col -->

                <!-- <div class="col-lg-4 col-md-6">
                    <div class="card blog blog-primary shadow rounded-3 overflow-hidden border-0">
                        <div class="card-img blog-image position-relative overflow-hidden rounded-0">
                            <div class="position-relative overflow-hidden">
                                <img src="images/property/3.jpg" class="img-fluid" alt="">
                                <div class="card-overlay"></div>
                            </div>

                            <div class="blog-tag p-3">
                                <a href="" class="badge bg-primary">Towntor</a>
                            </div>
                        </div>

                        <div class="card-body content p-0">
                            <div class="p-4">
                                <a href="blog-detail.html" class="title fw-medium fs-5 text-dark">10 Quick Tips About Business Development</a>
                                <p class="text-muted mt-2">The most well-known dummy text is the 'Lorem Ipsum', in the 16th century.</p>

                                <a href="" class="text-dark read-more">Read More <i class="mdi mdi-chevron-right align-middle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>end container -->

        <div class="container mt-100 mt-60">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h4 class="title mb-3">Have Question ? Get in touch!</h4>
                        <p class="text-muted para-desc mb-0 mx-auto">Jangan sungkan untuk ajukan pertanyaan kepada kami!</p>
                        <div class="mt-4 pt-2">
                            <a href="https://www.instagram.com/direct/t/119805539410904" class="btn btn-pills btn-primary"><span class="h5 mb-0 me-1"><i data-feather="mail" class="fea icon-sm"></i></span> Contact us</a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->

        <!-- Footer End -->

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top rounded-pill fs-5"><i data-feather="arrow-up" class="fea icon-sm align-middle"></i></a>
        <!-- Back to top -->

        <!-- JAVASCRIPTS -->
	    <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Tiny slider -->
        <script src="js/tiny-slider.js"></script>
        <!-- Tobii -->
        <script src="js/tobii.min.js"></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
	    <!-- Custom -->
	    <script src="js/plugins.init.js"></script>
	    <script src="js/app.js"></script>
        <script>  
        $(document).ready(function() {  
            // Mengecek apakah ada session error  
            @if (session('error'))  
                alert("{{ session('error') }}"); // Menampilkan pesan error  
            @endif  
        });  
    </script>  
    </body>
</html>