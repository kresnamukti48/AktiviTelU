@extends('layouts.member')

@section('content')
    <!-- Start -->
    <section class="section mt-5 pt-4">
        <div class="container-fluid mt-2">
            <div class="row g-2">
                <div class="col-md-6">
                    <a href="{{ asset('layout-member/images/property/single/1.jpg') }}" class="lightbox" title="">
                        <img src="{{ asset('layout-member/images/property/single/1.jpg') }}" class="img-fluid rounded-3 shadow" alt="">
                    </a>
                </div><!--end col-->

                <div class="col-md-6">
                    <div class="row g-2">
                        <div class="col-6">
                            <a href="{{ asset('layout-member/images/property/single/2.jpg') }}" class="lightbox" title="">
                                <img src="{{ asset('layout-member/images/property/single/2.jpg') }}" class="img-fluid rounded-3 shadow" alt="">
                            </a>
                        </div>

                        <div class="col-6">
                            <a href="{{ asset('layout-member/images/property/single/3.jpg') }}" class="lightbox" title="">
                                <img src="{{ asset('layout-member/images/property/single/3.jpg') }}" class="img-fluid rounded-3 shadow" alt="">
                            </a>
                        </div>

                        <div class="col-6">
                            <a href="{{ asset('layout-member/images/property/single/4.jpg') }}" class="lightbox" title="">
                                <img src="{{ asset('layout-member/images/property/single/4.jpg') }}" class="img-fluid rounded-3 shadow" alt="">
                            </a>
                        </div>

                        <div class="col-6">
                            <a href="{{ asset('layout-member/images/property/single/5.jpg') }}" class="lightbox" title="">
                                <img src="{{ asset('layout-member/images/property/single/5.jpg') }}" class="img-fluid rounded-3 shadow" alt="">
                            </a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success.message') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-error">
                    {{ session('error.message') }}
                </div>
            @endif

            <div class="row g-4">
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="section-title">
                        <h4 class="title mb-0">
                            {{ $ukm->nama_ukm }}
                        </h4>

                        <ul class="list-unstyled mb-0 py-3">
                            <li class="list-inline-item">
                                <span class="d-flex align-items-center me-4">
                                    <i class="mdi mdi-account-check fs-4 me-2 text-primary"></i>
                                    <span class="text-muted fs-5">{{ $ukm->members_count }} Orang</span>
                                </span>
                            </li>


                            <li class="list-inline-item">
                                <span class="d-flex align-items-center">
                                    <i class="mdi mdi-content-paste fs-4 me-2 text-primary"></i>
                                    <span class="text-muted fs-5">{{ $ukm->kegiatan_count }} Proker</span>
                                </span>
                            </li>
                        </ul>

                        <p class="text-muted">
                            {!! $ukm->deskripsi_ukm !!}
                        </p>

                        <div class="card map border-0">
                            <div class="card-body p-0">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4724.763189423374!2d107.62909868924476!3d-6.973025483800675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9adf177bf8d%3A0x437398556f9fa03!2sTelkom%20University!5e0!3m2!1sen!2sid!4v1735458821996!5m2!1sen!2sid" class="rounded-3" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-5 col-12">
                    <div class="rounded-3 shadow bg-white sticky-bar p-4">
                        <h5 class="mb-3">Pengurus:</h5>

                        <div class="">
                            <div class="d-flex align-items-center justify-content-between mt-2">  
                                <span class="small text-muted">Dosen Pembina:</span>  
                                <span class="small">{{ $dosen->user->name ?? 'Tidak ada' }}</span> <!-- Ambil nama dosen -->  
                            </div>  

                            <div class="d-flex align-items-center justify-content-between mt-2">  
                                <span class="small text-muted">Ketua:</span>  
                                <span class="small">{{ $ketua->user->name ?? 'Tidak ada' }}</span> <!-- Ambil nama ketua -->  
                            </div>  

                            <div class="d-flex align-items-center justify-content-between mt-2">  
                                <span class="small text-muted">Wakil Ketua:</span>  
                                <span class="small">{{ $wakilKetua->user->name ?? 'Tidak ada' }}</span> <!-- Ambil nama wakil ketua -->  
                            </div>  
                        </div>

                        <div class="d-flex mt-3">
                            <a href="javascript:void(0)" class="btn btn-primary w-100 me-2">Struktur Organisasi</a>

                            <a
                                href="javascript:void(0)"
                                @class([
                                    "btn btn-primary w-100",
                                    "disabled" => $hasJoinedUkm,
                                ])
                                data-bs-toggle="modal"
                                data-bs-target="#joinUkmModal"
                                @disabled($hasJoinedUkm)
                            >
                                Masuk<br>UKM
                            </a>
                        </div>

                        <br>
                        <h5 class="mb-3">Detail Proker</h5>
                        <div class="">
                            <div class="d-flex align-items-center mt-2">
                                <p class="small">Lorem Ipsum dolor sit amet</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title mb-3">UKM Lainnya</h4>
                        <p class="text-muted para-desc mb-0 mx-auto">Cek UKM lainnya yang mungkin menarik untukmu</p>
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

            
            <!-- <div class="row">
                <div class="col-12">
                    <div class="tiny-slide-three">
                        <div class="tiny-slide">
                            <div class="card property border-0 shadow position-relative overflow-hidden rounded-3 m-3">
                                <div class="property-image position-relative overflow-hidden shadow">
                                    <img src="{{ asset('layout-member/images/property/1.jpg') }}" class="img-fluid" alt="">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-4">
                                    <a href="property-detail.blade.php" class="title fs-5 text-dark fw-medium">{{ $ukm->nama_ukm }}</a>

                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">8000sqf</span>
                                        </li>

                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Beds</span>
                                        </li>

                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$5000</p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Rating</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div> -->
                            <!-- </div>end items -->
                        <!-- </div>end col -->

                        <!-- <div class="tiny-slide">
                            <div class="card property border-0 shadow position-relative overflow-hidden rounded-3 m-3">
                                <div class="property-image position-relative overflow-hidden shadow">
                                    <img src="{{ asset('layout-member/images/property/2.jpg') }}" class="img-fluid" alt="">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-4">
                                    <a href="property-detail.blade.php" class="title fs-5 text-dark fw-medium">59345 STONEWALL DR, Plaquemine, LA 70764, USA</a>
                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">8000sqf</span>
                                        </li>

                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Beds</span>
                                        </li>

                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$5000</p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Rating</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div> -->
                            <!-- </div>end items -->
                        <!-- </div>end col -->

                        <!-- <div class="tiny-slide">
                            <div class="card property border-0 shadow position-relative overflow-hidden rounded-3 m-3">
                                <div class="property-image position-relative overflow-hidden shadow">
                                    <img src="{{ asset('layout-member/images/property/3.jpg') }}" class="img-fluid" alt="">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-4">
                                    <a href="property-detail.blade.php" class="title fs-5 text-dark fw-medium">3723 SANDBAR DR, Addis, LA 70710, USA</a>
                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">8000sqf</span>
                                        </li>

                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Beds</span>
                                        </li>

                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$5000</p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Rating</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div> -->
                            <!-- </div>end items -->
                        <!-- </div>end col

                        <div class="tiny-slide">
                            <div class="card property border-0 shadow position-relative overflow-hidden rounded-3 m-3">
                                <div class="property-image position-relative overflow-hidden shadow">
                                    <img src="{{ asset('layout-member/images/property/4.jpg') }}" class="img-fluid" alt="">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-4">
                                    <a href="property-detail.blade.php" class="title fs-5 text-dark fw-medium">Lot 21 ROYAL OAK DR, Prairieville, LA 70769, USA</a>
                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">8000sqf</span>
                                        </li>

                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Beds</span>
                                        </li>

                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$5000</p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Rating</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div><!--end items-->
                        <!-- </div>end col -->
<!-- 
                        <div class="tiny-slide">
                            <div class="card property border-0 shadow position-relative overflow-hidden rounded-3 m-3">
                                <div class="property-image position-relative overflow-hidden shadow">
                                    <img src="{{ asset('layout-member/images/property/5.jpg') }}" class="img-fluid" alt="">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-4">
                                    <a href="property-detail.blade.php" class="title fs-5 text-dark fw-medium">710 BOYD DR, Unit #1102, Baton Rouge, LA 70808, USA</a>
                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">8000sqf</span>
                                        </li>

                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Beds</span>
                                        </li>

                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$5000</p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Rating</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div><!--end items-->
                        <!-- </div>end col -->

                        <!-- <div class="tiny-slide">
                            <div class="card property border-0 shadow position-relative overflow-hidden rounded-3 m-3">
                                <div class="property-image position-relative overflow-hidden shadow">
                                    <img src="{{ asset('layout-member/images/property/6.jpg') }}" class="img-fluid" alt="">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-4">
                                    <a href="property-detail.blade.php" class="title fs-5 text-dark fw-medium">5133 MCLAIN WAY, Baton Rouge, LA 70809, USA</a>
                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">8000sqf</span>
                                        </li>

                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Beds</span>
                                        </li>

                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$5000</p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Rating</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                            </ul>
                                        </li>
                                    </ul> 
                                </div> -->
                            </div><!--end items-->
                        </div><!--end col-->
                    </div>
                </div>
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->

    <div class="modal fade" id="joinUkmModal" tabindex="-1" aria-labelledby="joinUkmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('home.ukm.join', ['ukm' => $ukm->id]) }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Join UKM</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nim" class="form-label">
                                NIM
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="nim"
                                name="nim"
                                value="{{ old('nim') }}"
                                required
                            />

                            @error('nim')
                                <p class="text-danger text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jurusan" class="form-label">
                                Jurusan
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="jurusan"
                                name="jurusan"
                                value="{{ old('jurusan') }}"
                                required
                            />

                            @error('jurusan')
                                <p class="text-danger text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="angkatan" class="form-label">
                                Angkatan
                            </label>

                            <input
                                type="number"
                                class="form-control"
                                id="angkatan"
                                name="angkatan"
                                value="{{ old('angkatan') }}"
                                required
                            />

                            @error('angkatan')
                                <p class="text-danger text-sm">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Tutup
                        </button>

                        <button type="submit" class="btn btn-primary">
                            Join
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection