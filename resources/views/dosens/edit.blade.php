@extends('layouts.admin')  

@section('main-content')  
  <!-- Page Heading -->  
  <h1 class="h3 mb-4 text-gray-800">  
      {{ __('Edit Dosen: :name', ['name' => $dosens->user->name]) }}  
  </h1>  
  <div class="card">  
    <div class="card-body">  
      <form action="{{ route('dosens.update', $dosens->id) }}" method="post">  
        @csrf  
        @method('put')  



        <div class="form-group">  
          <label for="nip">NIP</label>  
          <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip" placeholder="NIP" autocomplete="off" value="{{ old('nip', $dosens->nip) }}">  
          @error('nip')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>  

        <div class="form-group">  
          <label for="fakultas">Fakultas</label>  
          <input type="text" class="form-control @error('fakultas') is-invalid @enderror" name="fakultas" id="fakultas" placeholder="Fakultas" autocomplete="off" value="{{ old('fakultas', $dosens->fakultas) }}">  
          @error('fakultas')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>

        <div class="form-group">  
          <label for="ukm_id">Nama UKM</label>  
          <select class="form-control @error('ukm_id') is-invalid @enderror" name="ukm_id" id="ukm_id">  
            <option value="">-- Pilih UKM --</option>  
            @foreach($ukms as $uk)  
              <option value="{{ $uk->id }}" {{ (old('ukm_id') ?? $dosens->ukm_id) == $uk->id ? 'selected' : '' }}>{{ $uk->nama_ukm }}</option>  
            @endforeach  
          </select>  
          @error('ukm_id')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>    

        <button type="submit" class="btn btn-primary">Save</button>  
        <a href="{{ route('dosens.index') }}" class="btn btn-default">Back to list</a>  
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