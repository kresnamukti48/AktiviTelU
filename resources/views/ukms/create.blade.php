@extends('layouts.admin')  

@section('main-content')  
    <!-- Page Heading -->  
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Create UKM') }}</h1>  

    <div class="card">  
        <div class="card-body">  
            <form action="{{ route('ukms.store') }}" method="post" enctype="multipart/form-data">  
                @csrf  
                <div class="form-group">  
                    <label for="nama_ukm">Nama UKM</label>  
                    <input type="text" class="form-control @error('nama_ukm') is-invalid @enderror" name="nama_ukm" id="nama_ukm" placeholder="Nama UKM" autocomplete="off" value="{{ old('nama_ukm') }}">  
                    @error('nama_ukm')  
                        <span class="text-danger">{{ $message }}</span>  
                    @enderror  
                </div>  

                <div class="form-group">  
                    <label for="deskripsi_ukm">Deskripsi UKM</label>  
                    <textarea class="form-control @error('deskripsi_ukm') is-invalid @enderror" name="deskripsi_ukm" id="deskripsi_ukm" placeholder="Deskripsi UKM">{{ old('deskripsi_ukm') }}</textarea>  
                    @error('deskripsi_ukm')  
                        <span class="text-danger">{{ $message }}</span>  
                    @enderror  
                </div>  



                <div class="form-group">  
                    <label for="kategori_ukm">Kategori</label>  
                    <select class="form-control @error('kategori_ukm') is-invalid @enderror" name="kategori_ukm" id="kategori_ukm">  
                        <option value="">-- Pilih Kategori --</option>  
                        <option value="kesenian" {{ old('kategori_ukm') == 'kesenian' ? 'selected' : '' }}>Kesenian</option>  
                        <option value="sosial" {{ old('kategori_ukm') == 'sosial' ? 'selected' : '' }}>Sosial</option>  
                        <option value="penalaran" {{ old('kategori_ukm') == 'penalaran' ? 'selected' : '' }}>Penalaran</option>  
                        <option value="olahraga" {{ old('kategori_ukm') == 'olahraga' ? 'selected' : '' }}>Olahraga</option>  
                        <option value="kerohanian" {{ old('kategori_ukm') == 'kerohanian' ? 'selected' : '' }}>Kerohanian</option>  
                    </select>  
                    @error('kategori_ukm')  
                        <span class="text-danger">{{ $message }}</span>  
                    @enderror  
                </div>  

                <div class="form-group">  
                    <label for="instagram_ukm">Instagram</label>  
                    <input type="text" class="form-control @error('instagram_ukm') is-invalid @enderror" name="instagram_ukm" id="instagram_ukm" placeholder="Instagram" autocomplete="off" value="{{ old('instagram_ukm') }}">  
                    @error('instagram_ukm')  
                        <span class="text-danger">{{ $message }}</span>  
                    @enderror  
                </div>  

                <div class="form-group">  
                    <label for="email_ukm">Email</label>  
                    <input type="email_ukm" class="form-control @error('email_ukm') is-invalid @enderror" name="email_ukm" id="email_ukm" placeholder="Email" autocomplete="off" value="{{ old('email_ukm') }}">  
                    @error('email_ukm')  
                        <span class="text-danger">{{ $message }}</span>  
                    @enderror  
                </div>  

                <div class="form-group">  
                    <label for="logo_ukm">Logo UKM</label>  
                    <input type="file" class="form-control @error('logo_ukm') is-invalid @enderror" name="logo_ukm" id="logo_ukm">  
                    @error('logo_ukm')  
                        <span class="text-danger">{{ $message }}</span>  
                    @enderror  
                </div>  

                <button type="submit" class="btn btn-primary">Save</button>  
            </form>  
        </div>  
    </div>  

    <!-- End of Main Content -->  
@endsection  

@push('notif')  
    @if (session('success'))  
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">  
            {{ session('success') }}  
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">  
                <span aria-hidden="true">&times;</span>  
            </button>  
        </div>  
    @endif  

    @if (session('status'))  
        <div class="alert alert-success border-left-success" role="alert">  
            {{ session('status') }}  
        </div>  
    @endif
@endpush