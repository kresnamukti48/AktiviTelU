@extends('layouts.member')  

@section('content')   

<section class="position-relative mt-5 pt-4">
    <div class="container"> 

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



    </div>
</div>

@endsection