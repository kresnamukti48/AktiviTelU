@extends('layouts.member')

@section('content')
    <section class="section">
        <div class="container">
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
                @foreach ($events as $event)
                    <div class="col-lg-4 col-md-6">
                        <div class="card blog blog-primary shadow rounded-3 overflow-hidden border-0">
                            <div class="card-img blog-image position-relative overflow-hidden rounded-0">
                                <div class="position-relative overflow-hidden">
                                    <img src="{{ asset($event->gambar_event) }}" class="img-fluid" alt="">
                                    <div class="card-overlay"></div>
                                </div>
                            </div>

                            <div class="card-body content p-0">
                                <div class="p-4">
                                    <a href="blog-detail.html" class="title fw-medium fs-5 text-dark">
                                        {{ $event->nama_event }}
                                    </a>

                                    <p class="text-muted mt-2">
                                        {{ $event->deskripsi_event }}
                                    </p>

                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-check fs-5 me-2 text-primary"></i>
                                        <span class="text-muted fs-6">{{ fake()->randomNumber(2) }} Tiket Tersisa</span>
                                    </li>

                                    <li class="d-flex align-items-center me-3">
                                        <i class="mdi mdi-account-multiple fs-5 me-2 text-primary"></i>
                                        <span class="text-muted fs-6">Status: Available</span>
                                    </li>

                                    <li class="d-flex align-items-center">
                                        <i class="mdi mdi-content-paste fs-5 me-2 text-primary"></i>
                                        <span class="text-muted fs-6">
                                            Rp30.000
                                        </span>
                                    </li>

                                    <button
                                        type="button"
                                        @class([
                                            "btn btn-primary mt-3",
                                            "disabled" => in_array($event->id, $userRegisteredEvents)
                                        ])
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEvent{{ $event->id }}"
                                        @disabled(in_array($event->id, $userRegisteredEvents))
                                    >
                                        Beli Tiket
                                    </button>

                                    <div class="modal" id="modalEvent{{ $event->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <form action="{{ route('home.event.join', ['event' => $event->id]) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modal title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="mb-3 modal-body">
                                                        <img src="{{ asset('img/qris.jpg') }}" class="mb-3">
                                                        <p>Kirim Bukti Pembayaran</p>

                                                        <input
                                                            class="form-control"
                                                            type="file"
                                                            id="file"
                                                            name="file"
                                                            required
                                                        />

                                                        @error('file')
                                                            <p class="text-danger text-sm mt-2">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                            Tutup
                                                        </button>

                                                        <button type="submit" class="btn btn-primary">
                                                            Kirim Bukti Pembayaran
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
@endsection