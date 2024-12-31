@extends('layouts.member')  

@section('content')  
<section class="section">  
    <div class="container">  
        @if (session()->has('success'))  
            <div class="alert alert-success">  
                {{ session('success.message') }}  
            </div>  
        @endif  

        @if (session('error'))  
            <div class="alert alert-danger">  
                {{ session('error') }}  
            </div>  
        @endif  

        <h2 class="mb-4">UKM Kategori: {{ ucfirst($kategori) }}</h2>  

        <div class="row g-4">  
            @foreach ($ukms as $ukm)  
                <div class="col-lg-4 col-md-6">  
                    <div class="card blog blog-primary shadow rounded-3 overflow-hidden border-0">  
                        <div class="card-img blog-image position-relative overflow-hidden rounded-0">  
                            <div class="position-relative overflow-hidden">  
                                <img src="{{ asset($ukm->logo) }}" class="img-fluid" alt="{{ $ukm->nama }}">  
                                <div class="card-overlay"></div>  
                            </div>  
                        </div>  

                        <div class="card-body content p-4">  
                            <h5 class="fw-medium fs-5 text-dark">{{ $ukm->nama_ukm }}</h5>  

                            <p class="text-muted mt-2">{{ $ukm->deskripsi_ukm }}</p>  

                            <div class="d-flex align-items-center mt-3">  
                                <i class="mdi mdi-instagram fs-5 me-2 text-danger"></i>  
                                <a href="https://instagram.com/{{ $ukm->instagram_ukm }}" class="text-muted" target="_blank">Instagram</a>  
                            </div>  

                            <a href="{{ route('welcome.ukm', ['ukm' => $ukm->id]) }}" class="btn btn-primary w-100">Detail UKM</a>


                        
                        </div>  
                    </div>  
                </div><!-- end col -->  
            @endforeach  
        </div><!-- end row -->  
    </div><!-- end container -->  
</section><!-- end section -->  
@endsection