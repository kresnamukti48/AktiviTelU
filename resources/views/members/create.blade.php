@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Create Member') }}</h1>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('members.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="user_id">Nama Member</label>
                    <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id">
                        <option value="">-- Pilih User --</option>
                        @foreach($user as $u)
                            <option value="{{ $u->id }}" {{ old('user_id') == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ukm_id">UKM</label>
                    <select class="form-control @error('ukm_id') is-invalid @enderror" name="ukm_id" id="ukm_id">
                        <option value="">-- Pilih UKM --</option>
                        @foreach($ukm as $u)
                            <option value="{{ $u->id }}" {{ old('ukm_id') == $u->id ? 'selected' : '' }}>{{ $u->nama_ukm }}</option>
                        @endforeach
                    </select>
                    @error('ukm_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role_member">Role Member</label>
                    <select class="form-control @error('role_member') is-invalid @enderror" name="role_member" id="role_member">
                        <option value="">-- Pilih Role --</option>
                        <option value="ketua" {{ old('role_member') == 'ketua' ? 'selected' : '' }}>Ketua</option>
                        <option value="wakil ketua" {{ old('role_member') == 'wakil ketua' ? 'selected' : '' }}>Wakil Ketua</option>
                        <option value="anggota" {{ old('role_member') == 'anggota' ? 'selected' : '' }}>Anggota</option>
                    </select>
                    @error('role_member')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" id="jurusan" placeholder="Jurusan" autocomplete="off" value="{{ old('jurusan') }}">
                    @error('jurusan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" id="nim" placeholder="NIM" autocomplete="off" value="{{ old('nim') }}">
                    @error('nim')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="angkatan">Angkatan</label>
                    <input type="number" class="form-control @error('angkatan') is-invalid @enderror" name="angkatan" id="angkatan" placeholder="Angkatan" autocomplete="off" value="{{ old('angkatan') }}" min="1900" max="{{ date('Y') }}">
                    @error('angkatan')
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
