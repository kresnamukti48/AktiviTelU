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
                                <span class="small">{{ $dosen->user->name ?? 'Tidak ada' }}</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <span class="small text-muted">Ketua:</span>
                                <span class="small">{{ $ketua->user->name ?? 'Tidak ada' }}</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <span class="small text-muted">Wakil Ketua:</span>
                                <span class="small">{{ $wakilKetua->user->name ?? 'Tidak ada' }}</span>
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
                                data-ukm-id="{{ $ukm->id }}"
                                data-action="{{ route('home.ukm.join', ['ukm' => $ukm->id]) }}"
                                @disabled($hasJoinedUkm)
                            >
                                Masuk UKM
                            </a>
                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div><!--end container-->

        <!-- Global Modal -->
        <div class="modal fade" id="joinUkmModal" tabindex="-1" aria-labelledby="joinUkmModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="joinUkmForm" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Join UKM</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <p id="ukmIdText"></p>
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" required>
                            </div>

                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan" required>
                            </div>

                            <div class="mb-3">
                                <label for="angkatan" class="form-label">Angkatan</label>
                                <input type="number" class="form-control" id="angkatan" name="angkatan" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Join</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!--end section-->

@endsection

@section('scripts')
    <script>
        document.querySelectorAll('[data-bs-target="#joinUkmModal"]').forEach(button => {
            button.addEventListener('click', function () {
                const ukmId = this.dataset.ukmId;
                const formAction = this.dataset.action;

                const form = document.getElementById('joinUkmForm');
                form.action = formAction;

                document.getElementById('ukmIdText').innerText = `UKM ID: ${ukmId}`;
            });
        });
    </script>
@endsection
