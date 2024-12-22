@extends('layouts.admin')  

@section('main-content')  
    <!-- Page Heading -->  
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Create Ticket') }}</h1>  

    @if (session('error'))  
        <div class="alert alert-danger">  
            {{ session('error') }}  
        </div>  
    @endif  

    <div class="card">  
        <div class="card-body">  
            <form action="{{ route('tickets.store') }}" method="post">  
                @csrf  

                <div class="form-group">  
                    <label for="event_id">Event</label>  
                    <select class="form-control @error('event_id') is-invalid @enderror" name="event_id" id="event_id">  
                        <option value="">-- Pilih Event --</option>  
                        @foreach($events as $event)  
                            <option value="{{ $event->id }}" {{ old('event_id') == $event->id ? 'selected' : '' }}>{{ $event->nama_event }}</option>  
                        @endforeach  
                    </select>  
                    @error('event_id')  
                        <span class="text-danger">{{ $message }}</span>  
                    @enderror  
                </div>  

                <div class="form-group">  
                    <label for="harga">Harga</label>  
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" placeholder="Harga" autocomplete="off" value="{{ old('harga') }}" min="0" step="0.01">  
                    @error('harga')  
                        <span class="text-danger">{{ $message }}</span>  
                    @enderror  
                </div>  

                <div class="form-group">  
                    <label for="stok_tiket">Stok Tiket</label>  
                    <input type="number" class="form-control @error('stok_tiket') is-invalid @enderror" name="stok_tiket" id="stok_tiket" placeholder="Stok Tiket" autocomplete="off" value="{{ old('stok_tiket') }}" min="0">  
                    @error('stok_tiket')  
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