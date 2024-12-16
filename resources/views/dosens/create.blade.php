@extends('layouts.admin')  

@section('main-content')  
    <!-- Page Heading -->  
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Create Dosen') }}</h1>  

    @if (session('error'))  
        <div class="alert alert-danger">  
            {{ session('error') }}  
        </div>  
    @endif  
    <!-- Main Content goes here -->  

    <div class="card">  
        <div class="card-body">  
            <form action="{{ route('dosens.store') }}" method="post">  
                @csrf  
                <div class="form-group">  
                    <label for="user_id">Nama Dosen</label>  
                    <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id">  
                        <option value="">-- Pilih User --</option>  
                        @foreach($users as $u)  
                            <option value="{{ $u->id }}" {{ old('user_id') == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>  
                        @endforeach  
                    </select>  
                    @error('user_id')  
                        <span class="text-danger">{{ $message }}</span>  
                    @enderror  
                </div>  

                <div class="form-group">  
                    <label for="nip">NIP</label>  
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip" placeholder="NIP" autocomplete="off" value="{{ old('nip') }}">  
                    @error('nip')  
                        <span class="text-danger">{{ $message }}</span>  
                    @enderror  
                </div>  

                <div class="form-group">  
                    <label for="fakultas">Fakultas</label>  
                    <input type="text" class="form-control @error('fakultas') is-invalid @enderror" name="fakultas" id="fakultas" placeholder="Fakultas" autocomplete="off" value="{{ old('fakultas') }}">  
                    @error('fakultas')  
                        <span class="text-danger">{{ $message }}</span>  
                    @enderror  
                </div>  

                <div class="form-group">  
                    <label for="ukm_id">Nama UKM</label>  
                    <select class="form-control @error('ukm_id') is-invalid @enderror" name="ukm_id" id="ukm_id">  
                        <option value="">-- Pilih UKM --</option>  
                        @foreach($ukms as $ukm)  
                            <option value="{{ $ukm->id }}" {{ old('ukm_id') == $ukm->id ? 'selected' : '' }}>{{ $ukm->nama_ukm }}</option>  
                        @endforeach  
                    </select>  
                    @error('ukm_id')  
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