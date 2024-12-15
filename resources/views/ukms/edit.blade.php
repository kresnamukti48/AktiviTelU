@extends('layouts.admin')

@section('main-content')
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Edit UKM') }}</h1>

  <!-- Main Content goes here -->

  <div class="card">
    <div class="card-body">
      <form action="{{ route('ukms.update', $ukm->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
          <label for="nama_ukm">Nama UKM</label>
          <input type="text" class="form-control @error('nama_ukm') is-invalid @enderror" name="nama_ukm" id="nama_ukm" placeholder="Nama UKM" autocomplete="off" value="{{ old('nama_ukm') ?? $ukm->nama_ukm }}">
          @error('nama_ukm')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="deskripsi_ukm">Deskripsi UKM</label>
          <textarea class="form-control @error('deskripsi_ukm') is-invalid @enderror" name="deskripsi_ukm" id="deskripsi_ukm" placeholder="Deskripsi UKM">{{ old('deskripsi_ukm') ?? $ukm->deskripsi_ukm }}</textarea>
          @error('deskripsi_ukm')
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
        <a href="{{ route('ukms.index') }}" class="btn btn-default">Back to list</a>
      </form>
    </div>
  </div>
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