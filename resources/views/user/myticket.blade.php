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

        <h2 class="mb-4">Ticket Saya</h2>  

        <div class="row g-4">  
            @foreach ($checkouts as $checkout)  
                <div class="col-lg-4 col-md-6">  
                    <div class="card blog blog-primary shadow rounded-3 overflow-hidden border-0">  
                        <div class="card-img blog-image position-relative overflow-hidden rounded-0">  
                            <div class="position-relative overflow-hidden">  
                                <img src="{{ asset($checkout->tiket->event->gambar_event) }}" class="img-fluid" alt="{{ $checkout->tiket->event->nama_event }}">  
                                <div class="card-overlay"></div>  
                            </div>  
                        </div>  

                        <div class="card-body content p-4">  
                            <h5 class="fw-medium fs-5 text-dark">{{ $checkout->tiket->event->nama_event }}</h5>  

                            <p class="text-muted mt-2">{{ \Carbon\Carbon::parse($checkout->tiket->event->tanggal_event)->format('d-m-Y') }}</p>  
                            <p class="text-muted mt-2">Lokasi: {{ $checkout->tiket->event->lokasi_event }}</p>  

                        
                        </div>  
                    </div>  
                </div><!-- end col -->  
            @endforeach  
        </div><!-- end row -->  
    </div><!-- end container -->  
</section><!-- end section -->  
@endsection