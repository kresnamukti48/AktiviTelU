@extends('layouts.app')  

@section('content')


<div class="container">  
    @if (session('error'))  
        <div class="alert alert-danger">  
            {{ session('error') }}  
        </div>  
    @endif  
    <h1>Checkout Tiket</h1>  
    <form action="{{ route('checkout.process') }}" method="POST">  
        @csrf  
        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">  
        
        <div class="form-group">  
            <label for="jumlah_tiket">Jumlah Tiket</label>  
            <input type="number" name="jumlah_tiket" id="jumlah_tiket" class="form-control" min="1" value="1" required>  
        </div>  

        <button type="submit" class="btn btn-primary">Checkout</button>  
    </form>  
</div>  
@endsection