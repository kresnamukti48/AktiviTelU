@extends('layouts.admin')  

@section('main-content')  
    <h1 class="h3 mb-4 text-gray-800">  
        Daftar Transaksi untuk {{ $checkoutName }}  
    </h1>  

    @if (session('success'))  
        <div class="alert alert-success">  
            {{ session('success') }}  
        </div>  
    @endif  

    @if (session('error'))  
        <div class="alert alert-danger">  
            {{ session('error') }}  
        </div>  
    @endif  
    <a href="{{ route('checkouts.export') }}" class="btn btn-success mb-3">Export</a>

    <table class="table table-bordered table-striped">  
        <thead>  
            <tr>  
                <th>No</th>  
                <th>Nama Pembeli</th>  
                <th>Nama Event</th>  
                <th>Jumlah Tiket</th>  
                <th>Total Harga</th>  
                <th>Status</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach ($checkouts as $checkout)  
                <tr>  
                    <td scope="row">{{ $loop->iteration }}</td>  
                    <td>{{ $checkout->user->name }}</td>  
                    <td>{{ $checkout->tiket->event->nama_event }}</td>  
                    <td>{{ $checkout->jumlah_tiket }}</td>  
                    <td>Rp. {{ number_format($checkout->total_harga) }}</td>  
                    <td>{{ ucfirst($checkout->status) }}</td>   
                </tr>  
            @endforeach  
        </tbody>  
    </table>  

@endsection