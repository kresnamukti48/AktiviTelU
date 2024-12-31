@extends('layouts.member')

@section('content')
        <!-- Hero Start -->
        <section class="bg-half-170 d-table w-100" style="background: url('images/bg/03.jpg');">
            <div class="bg-overlay bg-gradient-overlay-2"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-12">
                        <div class="title-heading text-center">
                            <p class="text-white-50 para-desc mx-auto mb-0">Daftar lengkap</p>
                            <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Unit Kegiatan Mahasiswa</h5>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- Hero End -->

        <!-- Start -->
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="features-absolute">
                            <div class="card border-0 bg-white shadow mt-5">
                                <form class="card-body text-start">
                                    <div class="registration-form text-dark text-start">
                                        <div class="row g-lg-0">
                                            <div class=" col-md-6 col-12">
                                                <div class="mb-3 mb-sm-0">
                                                    <label class="form-label d-none fs-6">Search :</label>
                                                    <div class="filter-search-form position-relative filter-border">
                                                        <i data-feather="search" class="fea icon-ex-md icons"></i>
                                                        <input name="name" type="text" id="job-keyword" class="form-control filter-input-box bg-light border-0" placeholder="Cari UKM" >
                                                    </div>
                                                </div>
                                            </div><!--end col-->
                                            
                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3 mb-sm-0">
                                                    <label class="form-label d-none fs-6">Kategori UKM:</label>
                                                    <div class="filter-search-form position-relative filter-border">
                                                        <i data-feather="home" class="fea icon-ex-md icons"></i>
                                                        <select class="form-select" id="choices-catagory-buy">
                                                            <option>UKM Sosial</option>
                                                            <option>UKM Kesenian</option>
                                                            <option>UKM Penalaran</option>
                                                            <option>UKM Olahraga</option>
                                                            <option>UKM Kerohanian</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><!--end col-->
<!-- 
                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="mb-3 mb-sm-0">
                                                    <label class="form-label d-none fs-6">Price :</label>
                                                    <div class="filter-search-form position-relative">
                                                        <i data-feather="dollar-sign" class="fea icon-ex-md icons"></i>
                                                        <select class="form-select" id="choices-min-price-buy">
                                                            <option>Price</option>
                                                            <option>500</option>
                                                            <option>1000</option>
                                                            <option>2000</option>
                                                            <option>3000</option>
                                                            <option>4000</option>
                                                            <option>5000</option>
                                                            <option>6000</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>end col -->

                                            <div class="col-lg-3 col-md-6 col-12">
                                                <input type="submit" id="search" name="search" style="height: 60px;" class="btn btn-primary searchbtn w-100" value="Search">
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div>
                                </form><!--end form-->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end container-->

            <div class="container">
                <div class="row g-4 mt-0">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card property border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="property-image position-relative overflow-hidden shadow">
                                <img src="images/property/1.jpg" class="img-fluid" alt="">
                                <!-- <ul class="list-unstyled property-icon">
                                    <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                    <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                    <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                </ul> -->
                            </div>
                            <div class="card-body content p-4">
                                <a href="UKM-detail.html" class="title fs-5 text-dark fw-medium">Embun</a>

                                <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-check fs-5 me-2 text-primary"></i>
                                        <span class="text-muted">321 Orang</span>
                                    </li>
    
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-multiple fs-4 me-2 text-primary"></i>
                                        <span class="text-muted">4 Divisi</span>
                                    </li>
    
                                    <li class="d-flex align-items-center">
                                        <i class="mdi mdi-account-multiple fs-4 me-2 text-primary"></i>
                                        <span class="text-muted">6 Proker</span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                    <li class="list-inline-item mb-0">
                                        <span class="text-muted">Kategori UKM</span>
                                        <p class="fw-medium mb-0">UKM Kesenian</p>
                                    </li>
                                </ul>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card property border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="property-image position-relative overflow-hidden shadow">
                                <img src="images/property/2.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="card-body content p-4">
                                <a href="property-detail.html" class="title fs-5 text-dark fw-medium">Balon Kata</a>
                                <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-check fs-5 me-2 text-primary"></i>
                                        <span class="text-muted">321 Orang</span>
                                    </li>
    
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-multiple fs-4 me-2 text-primary"></i>
                                        <span class="text-muted">4 Divisi</span>
                                    </li>
    
                                    <li class="d-flex align-items-center">
                                        <i class="mdi mdi-account-multiple fs-4 me-2 text-primary"></i>
                                        <span class="text-muted">6 Proker</span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                    <li class="list-inline-item mb-0">
                                        <span class="text-muted">Kategori UKM</span>
                                        <p class="fw-medium mb-0">UKM Kesenian</p>
                                    </li>
                                </ul>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card property border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="property-image position-relative overflow-hidden shadow">
                                <img src="images/property/3.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="card-body content p-4">
                                <a href="property-detail.html" class="title fs-5 text-dark fw-medium">Keluarga Besar Mahasiswa Sulawesi</a>
                                <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-check fs-5 me-2 text-primary"></i>
                                        <span class="text-muted">321 Orang</span>
                                    </li>
    
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-multiple fs-4 me-2 text-primary"></i>
                                        <span class="text-muted">4 Divisi</span>
                                    </li>
    
                                    <li class="d-flex align-items-center">
                                        <i class="mdi mdi-account-multiple fs-4 me-2 text-primary"></i>
                                        <span class="text-muted">6 Proker</span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                    <li class="list-inline-item mb-0">
                                        <span class="text-muted">Kategori UKM</span>
                                        <p class="fw-medium mb-0">UKM Kesenian</p>
                                    </li>
                                </ul>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card property border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="property-image position-relative overflow-hidden shadow">
                                <img src="images/property/4.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="card-body content p-4">
                                <a href="property-detail.html" class="title fs-5 text-dark fw-medium">Lot 21 ROYAL OAK DR, Prairieville, LA 70769, USA</a>
                                <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-check fs-5 me-2 text-primary"></i>
                                        <span class="text-muted">321 Orang</span>
                                    </li>
    
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-multiple fs-4 me-2 text-primary"></i>
                                        <span class="text-muted">4 Divisi</span>
                                    </li>
    
                                    <li class="d-flex align-items-center">
                                        <i class="mdi mdi-account-multiple fs-4 me-2 text-primary"></i>
                                        <span class="text-muted">6 Proker</span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                    <li class="list-inline-item mb-0">
                                        <span class="text-muted">Kategori UKM</span>
                                        <p class="fw-medium mb-0">UKM Kesenian</p>
                                    </li>
                                </ul>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card property border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="property-image position-relative overflow-hidden shadow">
                                <img src="images/property/5.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="card-body content p-4">
                                <a href="property-detail.blade.php" class="title fs-5 text-dark fw-medium">710 BOYD DR, Unit #1102, Baton Rouge, LA 70808, USA</a>
                                <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-check fs-5 me-2 text-primary"></i>
                                        <span class="text-muted">321 Orang</span>
                                    </li>
    
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-multiple fs-4 me-2 text-primary"></i>
                                        <span class="text-muted">4 Divisi</span>
                                    </li>
    
                                    <li class="d-flex align-items-center">
                                        <i class="mdi mdi-account-multiple fs-4 me-2 text-primary"></i>
                                        <span class="text-muted">6 Proker</span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                    <li class="list-inline-item mb-0">
                                        <span class="text-muted">Kategori UKM</span>
                                        <p class="fw-medium mb-0">UKM Kesenian</p>
                                    </li>
                                </ul>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card property border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="property-image position-relative overflow-hidden shadow">
                                <img src="images/property/6.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="card-body content p-4">
                                <a href="property-detail.blade.php" class="title fs-5 text-dark fw-medium">5133 MCLAIN WAY, Baton Rouge, LA 70809, USA</a>
                                <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-check fs-5 me-2 text-primary"></i>
                                        <span class="text-muted">321 Orang</span>
                                    </li>
    
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-multiple fs-4 me-2 text-primary"></i>
                                        <span class="text-muted">4 Divisi</span>
                                    </li>
    
                                    <li class="d-flex align-items-center">
                                        <i class="mdi mdi-account-multiple fs-4 me-2 text-primary"></i>
                                        <span class="text-muted">6 Proker</span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                    <li class="list-inline-item mb-0">
                                        <span class="text-muted">Kategori UKM</span>
                                        <p class="fw-medium mb-0">UKM Kesenian</p>
                                    </li>
                                </ul>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card property border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="property-image position-relative overflow-hidden shadow">
                                <img src="images/property/7.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="card-body content p-4">
                                <a href="property-detail.blade.php" class="title fs-5 text-dark fw-medium">1574 Sharlo Ave, Baton Rouge, LA 70820, USA</a>
                                <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-check fs-5 me-2 text-primary"></i>
                                        <span class="text-muted">321 Orang</span>
                                    </li>
    
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-multiple fs-4 me-2 text-primary"></i>
                                        <span class="text-muted">4 Divisi</span>
                                    </li>
    
                                    <li class="d-flex align-items-center">
                                        <i class="mdi mdi-account-multiple fs-4 me-2 text-primary"></i>
                                        <span class="text-muted">6 Proker</span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                    <li class="list-inline-item mb-0">
                                        <span class="text-muted">Kategori UKM</span>
                                        <p class="fw-medium mb-0">UKM Kesenian</p>
                                    </li>
                                </ul>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card property border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="property-image position-relative overflow-hidden shadow">
                                <img src="images/property/8.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="card-body content p-4">
                                <a href="property-detail.blade.php" class="title fs-5 text-dark fw-medium">2528 BOCAGE LAKE DR, Baton Rouge, LA 70809, USA</a>
                                <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-check fs-5 me-2 text-primary"></i>
                                        <span class="text-muted">321 Orang</span>
                                    </li>
    
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-multiple fs-4 me-2 text-primary"></i>
                                        <span class="text-muted">4 Divisi</span>
                                    </li>
    
                                    <li class="d-flex align-items-center">
                                        <i class="mdi mdi-account-multiple fs-4 me-2 text-primary"></i>
                                        <span class="text-muted">6 Proker</span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                    <li class="list-inline-item mb-0">
                                        <span class="text-muted">Kategori UKM</span>
                                        <p class="fw-medium mb-0">UKM Kesenian</p>
                                    </li>
                                </ul>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card property border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="property-image position-relative overflow-hidden shadow">
                                <img src="images/property/9.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="card-body content p-4">
                                <a href="property-detail.blade.php" class="title fs-5 text-dark fw-medium">1533 NICHOLSON DR, Baton Rouge, LA 70802, USA</a>
                                <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-check fs-5 me-2 text-primary"></i>
                                        <span class="text-muted">321 Orang</span>
                                    </li>
    
                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-multiple fs-4 me-2 text-primary"></i>
                                        <span class="text-muted">4 Divisi</span>
                                    </li>
    
                                    <li class="d-flex align-items-center">
                                        <i class="mdi mdi-account-multiple fs-4 me-2 text-primary"></i>
                                        <span class="text-muted">6 Proker</span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                    <li class="list-inline-item mb-0">
                                        <span class="text-muted">Kategori UKM</span>
                                        <p class="fw-medium mb-0">UKM Kesenian</p>
                                    </li>
                                </ul>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-12 mt-4 pt-2">
                        <ul class="pagination justify-content-center mb-0">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="mdi mdi-chevron-left fs-6"></i></span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="mdi mdi-chevron-right fs-6"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

        <!-- Footer Start -->
        <section class="bg-building-pic d-table w-100" style="background: url('images/building.png') bottom no-repeat;"></section>
        <footer class="bg-footer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-py-60 footer-border">
                            <div class="row d-flex">
                                <div class="col-lg-5 col-12 mb-0 mb-md-4 pb-0 pb-md-2 ">
                                    <a href="#" class="logo-footer">
                                        <img src="images/logo-light.png" alt="">
                                    </a>
                                    <p class="mt-4">AktiviTelU ini memudahkan mahasiswa untuk mengakses dan berpartisipasi dalam kegiatan dengan mudah dan mandiri.</p>
                                    <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                                        <li class="list-inline-item"><a href="https://1.envato.market/towntor" target="_blank" class="rounded-3"><i data-feather="shopping-cart" class="fea icon-sm align-middle" title="Buy Now"></i></a></li>
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
	    <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Tobii -->
        <script src="js/tobii.min.js"></script>
        <!-- Choice js -->
        <script src="js/choices.min.js"></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
	    <!-- Custom -->
	    <script src="js/plugins.init.js"></script>
	    <script src="js/app.js"></script>
    </body>
</html>