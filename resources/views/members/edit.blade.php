@extends('layouts.admin')  

@section('main-content')  
  <!-- Page Heading -->  
  <h1 class="h3 mb-4 text-gray-800">  
      {{ __('Edit Member: :name', ['name' => $member->user->name]) }}  
  </h1>
  
  @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

  <div class="card">  
    <div class="card-body">  
      <form action="{{ route('members.update', $member->id) }}" method="post">  
        @csrf  
        @method('put')  
        
        <div class="form-group">  
          <label for="role_member">Role Member</label>  
          <select class="form-control @error('role_member') is-invalid @enderror" name="role_member" id="role_member">  
            <option value="">-- Pilih Role --</option>  
            <option value="ketua" {{ (old('role_member') ?? $member->role_member) == 'ketua' ? 'selected' : '' }}>Ketua</option>  
            <option value="wakil ketua" {{ (old('role_member') ?? $member->role_member) == 'wakil ketua' ? 'selected' : '' }}>Wakil Ketua</option>  
            <option value="anggota" {{ (old('role_member') ?? $member->role_member) == 'anggota' ? 'selected' : '' }}>Anggota</option>  
          </select>  
          @error('role_member')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>  

        <div class="form-group">  
          <label for="jurusan">Jurusan</label>  
          <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" id="jurusan" placeholder="Jurusan" autocomplete="off" value="{{ old('jurusan', $member->jurusan) }}">  
          @error('jurusan')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>  

        <div class="form-group">  
          <label for="nim">NIM</label>  
          <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" id="nim" placeholder="NIM" autocomplete="off" value="{{ old('nim', $member->nim) }}">  
          @error('nim')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>  

        <div class="form-group">  
          <label for="angkatan">Angkatan</label>  
          <input type="number" class="form-control @error('angkatan') is-invalid @enderror" name="angkatan" id="angkatan" placeholder="Angkatan" autocomplete="off" value="{{ old('angkatan', $member->angkatan) }}" min="1900" max="{{ date('Y') }}">  
          @error('angkatan')  
            <span class="text-danger">{{ $message }}</span>  
          @enderror  
        </div>  

        <button type="submit" class="btn btn-primary">Save</button>  
        <a href="{{ route('members.index') }}" class="btn btn-default">Back to list</a>  
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