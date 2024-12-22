@extends('layouts.admin')  

@section('main-content')  
    <h1 class="h3 mb-4 text-gray-800">  
        {{ $title ?? __('CRUD Ticket :ukm', ['ukm' => $ukmName]) }}  
    </h1>  

    <a href="{{ route('tickets.create') }}" class="btn btn-primary mb-3">New Ticket</a>  

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

    <table class="table table-bordered table-striped">  
        <thead>  
            <tr>  
                <th>No</th>  
                <th>Event Name</th>  
                <th>Price</th>  
                <th>Stock</th>  
                <th>Status</th>  
                <th>Actions</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach ($tickets as $ticket)  
                <tr>  
                    <td scope="row">{{ $loop->iteration }}</td>  
                    <td>{{ $ticket->event->nama_event }}</td>  
                    <td>Rp. {{ number_format($ticket->harga) }}</td>  
                    <td>{{ $ticket->stok_tiket }}</td>  
                    <td>{{ ucfirst($ticket->status) }}</td>  
                    <td>  
                        <div class="d-flex">  
                            <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>  
                            <!-- Trigger Modal -->  
                            <button type="button" class="btn btn-sm btn-info mr-2" data-toggle="modal" data-target="#ticketDetailModal-{{ $ticket->id }}">Detail</button>  

                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="post">  
                                @csrf  
                                @method('delete')  
                                <button type="submit" class="btn btn-sm btn-danger"  
                                    onclick="return confirm('Are you sure to delete this?')">Delete</button>  
                            </form>  
                        </div>  
                    </td>  
                </tr>  
            @endforeach  
        </tbody>  
    </table>  

    <!-- Modals for Each Ticket -->  
    @foreach ($tickets as $ticket)  
        <div class="modal fade" id="ticketDetailModal-{{ $ticket->id }}" tabindex="-1" role="dialog" aria-labelledby="ticketDetailModalLabel-{{ $ticket->id }}" aria-hidden="true">  
            <div class="modal-dialog" role="document">  
                <div class="modal-content">  
                    <div class="modal-header">  
                        <h5 class="modal-title" id="ticketDetailModalLabel-{{ $ticket->id }}">Ticket for Event: {{ $ticket->event->nama_event }}</h5>  
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                            <span aria-hidden="true">&times;</span>  
                        </button>  
                    </div>  
                    <div class="modal-body">  
                        <h4>Details:</h4>  
                        <ul>  
                            <li>Price: {{ number_format($ticket->harga, 2) }}</li>  
                            <li>Stock: {{ $ticket->stok_tiket }}</li>  
                            <li>Status: {{ ucfirst($ticket->status) }}</li>  
                        </ul>  
                    </div>  
                    <div class="modal-footer">  
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
                    </div>  
                </div>  
            </div>  
        </div>  
    @endforeach  

@endsection