@extends('layouts.admin')  

@section('main-content')  
  <!-- Page Heading -->  
  <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Edit Kegiatan UKM') }}</h1>  

  <div class="card">  
    <div class="card-body">  
      <form action="{{ route('kegiatans.update', $kegiatan->id) }}" method="post" enctype="multipart/form-data">  
        @csrf  
        @method('put')  

        <div class="form-group">  
          <label for="nama_kegiatan">Nama Kegiatan</label>  
          <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror" name="nama_kegiatan" id="nama_kegiatan" placeholder="Nama Kegiatan" autocomplete="off" value="{{ old('nama_kegiatan') ?? $kegiatan->nama_kegiatan }}">  
          @error('nama_kegiatan')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>  

        <div class="form-group">  
          <label for="tanggal_kegiatan">Tanggal Kegiatan</label>  
          <input type="date" class="form-control @error('tanggal_kegiatan') is-invalid @enderror" name="tanggal_kegiatan" id="tanggal_kegiatan" value="{{ old('tanggal_kegiatan') ?? $kegiatan->tanggal_kegiatan }}">  
          @error('tanggal_kegiatan')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>  

        <div class="form-group">  
          <label for="lokasi_kegiatan">Lokasi Kegiatan</label>  
          <input type="text" class="form-control @error('lokasi_kegiatan') is-invalid @enderror" name="lokasi_kegiatan" id="lokasi_kegiatan" placeholder="Lokasi Kegiatan" value="{{ old('lokasi_kegiatan') ?? $kegiatan->lokasi_kegiatan }}">  
          @error('lokasi_kegiatan')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>  

        <div class="form-group">  
          <label for="deskripsi_kegiatan">Deskripsi Kegiatan</label>  
          <textarea class="form-control @error('deskripsi_kegiatan') is-invalid @enderror" name="deskripsi_kegiatan" id="deskripsi_kegiatan" placeholder="Deskripsi Kegiatan">{{ old('deskripsi_kegiatan') ?? $kegiatan->deskripsi_kegiatan }}</textarea>  
          @error('deskripsi_kegiatan')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>  

        <div class="form-group">  
          <label for="gambar_kegiatan">Gambar Kegiatan</label>  
          <input type="file" class="form-control @error('gambar_kegiatan') is-invalid @enderror" name="gambar_kegiatan" id="gambar_kegiatan">  
          @error('gambar_kegiatan')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>
        
        <div class="form-group">  
          <label for="ukm_id">Nama UKM</label>  
          <select class="form-control @error('ukm_id') is-invalid @enderror" name="ukm_id" id="ukm_id">  
            <option value="">-- Pilih UKM --</option>  
            @foreach($ukms as $uk)  
              <option value="{{ $uk->id }}" {{ (old('ukm_id') ?? $kegiatan->ukm_id) == $uk->id ? 'selected' : '' }}>{{ $uk->nama_ukm }}</option>  
            @endforeach  
          </select>  
          @error('ukm_id')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>  

        <button type="submit" class="btn btn-primary">Save</button>  
        <a href="{{ route('kegiatans.index') }}" class="btn btn-default">Back to list</a>  
      </form>  
    </div>  
  </div>  

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