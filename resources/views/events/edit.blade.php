@extends('layouts.admin')  

@section('main-content')  
  <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Edit Event') }}</h1>  

  <div class="card">  
    <div class="card-body">  
      <form action="{{ route('events.update', $events->id) }}" method="post" enctype="multipart/form-data">  
        @csrf  
        @method('put')  

        <div class="form-group">  
          <label for="nama_event">Nama Event</label>  
          <input type="text" class="form-control @error('nama_event') is-invalid @enderror" name="nama_event" id="nama_event" placeholder="Nama Event" autocomplete="off" value="{{ old('nama_event') ?? $events->nama_event }}">  
          @error('nama_event')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>  

        <div class="form-group">  
          <label for="tanggal_event">Tanggal Event</label>  
          <input type="date" class="form-control @error('tanggal_event') is-invalid @enderror" name="tanggal_event" id="tanggal_event" value="{{ old('tanggal_event') ?? $events->tanggal_event }}">  
          @error('tanggal_event')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>  

        <div class="form-group">  
          <label for="lokasi_event">Lokasi Event</label>  
          <input type="text" class="form-control @error('lokasi_event') is-invalid @enderror" name="lokasi_event" id="lokasi_event" placeholder="Lokasi Event" value="{{ old('lokasi_event') ?? $events->lokasi_event }}">  
          @error('lokasi_event')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>  

        <div class="form-group">  
          <label for="deskripsi_event">Deskripsi Event</label>  
          <textarea class="form-control @error('deskripsi_event') is-invalid @enderror" name="deskripsi_event" id="deskripsi_event" placeholder="Deskripsi Event">{{ old('deskripsi_event') ?? $events->deskripsi_event }}</textarea>  
          @error('deskripsi_event')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>  

        <div class="form-group">  
          <label for="gambar_event">Gambar Event</label>  
          <input type="file" class="form-control @error('gambar_event') is-invalid @enderror" name="gambar_event" id="gambar_event">  
          @error('gambar_event')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>
        
        <div class="form-group">  
          <label for="ukm_id">Nama UKM</label>  
          <select class="form-control @error('ukm_id') is-invalid @enderror" name="ukm_id" id="ukm_id">  
            <option value="">-- Pilih UKM --</option>  
            @foreach($ukms as $uk)  
              <option value="{{ $uk->id }}" {{ (old('ukm_id') ?? $events->ukm_id) == $uk->id ? 'selected' : '' }}>{{ $uk->nama_ukm }}</option>  
            @endforeach  
          </select>  
          @error('ukm_id')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>  

        <button type="submit" class="btn btn-primary">Save</button>  
        <a href="{{ route('events.index') }}" class="btn btn-default">Back to list</a>  
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