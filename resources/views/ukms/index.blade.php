@extends('layouts.admin')  

@section('main-content')  
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('UKM CRUD') }}</h1>  

    <a href="{{ route('ukms.create') }}" class="btn btn-primary mb-3">New UKM</a> 
    <a href="{{ route('ukms.export') }}" class="btn btn-success mb-3">Export</a> 

    @if (session('success'))  
        <div class="alert alert-success">  
            {{ session('success') }}  
        </div>  
    @endif  

    <table class="table table-bordered table-striped">  
        <thead>  
            <tr>  
                <th>No</th>  
                <th>Nama UKM</th>  
                <th>Deskripsi</th>  
                <th>Kategori</th>        
                <th>Instagram</th>     
                <th>Email</th>           
                <th>Actions</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach ($ukms as $ukm)  
                <tr>  
                    <td scope="row">{{ $loop->iteration }}</td>  
                    <td>{{ $ukm->nama_ukm }}</td>  
                    <td>{{ $ukm->deskripsi_ukm }}</td>  
                    <td>{{ ucfirst($ukm->kategori_ukm) }}</td>   
                    <td>{{ $ukm->instagram_ukm }}</td>  
                    <td>{{ $ukm->email_ukm }}</td>       
                    <td>  
                        <div class="d-flex">  
                            <a href="{{ route('ukms.edit', $ukm->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>  
                            <!-- Trigger Modal -->  
                            <button type="button" class="btn btn-sm btn-info mr-2" data-toggle="modal" data-target="#ukmDetailModal-{{ $ukm->id }}">Detail</button>  

                            <form action="{{ route('ukms.destroy', $ukm->id) }}" method="post">  
                                @csrf  
                                @method('delete')  
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this?')">Delete</button>  
                            </form>  
                        </div>  
                    </td>  
                </tr>  
            @endforeach  
        </tbody>  
    </table>  

    <!-- Modals for Each UKM -->  
    @foreach ($ukms as $ukm)  
        <div class="modal fade" id="ukmDetailModal-{{ $ukm->id }}" tabindex="-1" role="dialog" aria-labelledby="ukmDetailModalLabel-{{ $ukm->id }}" aria-hidden="true">  
            <div class="modal-dialog" role="document">  
                <div class="modal-content">  
                    <div class="modal-header">  
                        <h5 class="modal-title" id="ukmDetailModalLabel-{{ $ukm->id }}">UKM Name: {{ $ukm->nama_ukm }}</h5>  
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                            <span aria-hidden="true">&times;</span>  
                        </button>  
                    </div>  
                    <div class="modal-body">  
                        <h4>Details:</h4>  
                        <ul>  
                            <li>Nama UKM: {{ $ukm->nama_ukm }}</li>  
                            <li>Deskripsi: {{ $ukm->deskripsi_ukm }}</li>  
                            <li>Kategori: {{ ucfirst($ukm->kategori_ukm) }}</li>  <!-- Menampilkan kategori_ukm di modal -->  
                            <li>Instagram: {{ $ukm->instagram_ukm }}</li> <!-- Menampilkan Instagram di modal -->  
                            <li>Email: {{ $ukm->email_ukm }}</li>       <!-- Menampilkan Email di modal -->  
                            <li>Logo: <br>  
                                <img src="{{ asset($ukm->logo_ukm) }}" alt="{{ $ukm->nama_ukm }}" width="100">  
                            </li>  
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