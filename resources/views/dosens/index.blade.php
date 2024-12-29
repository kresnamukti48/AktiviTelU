@extends('layouts.admin')  

@section('main-content')  
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Dosen CRUD') }}</h1>  

    <a href="{{ route('dosens.create') }}" class="btn btn-primary mb-3">New Dosen</a>  
    <a href="{{ route('dosens.export') }}" class="btn btn-success mb-3">Export</a>
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
                <th>Nama Dosen</th>  
                <th>NIP</th>  
                <th>Fakultas</th>  
                <th>UKM</th>  
                <th>Actions</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach ($dosens as $dosen)  
                <tr>  
                    <td scope="row">{{ $loop->iteration }}</td>  
                    <td>{{ $dosen->user->name }}</td>  
                    <td>{{ $dosen->nip }}</td>  
                    <td>{{ $dosen->fakultas }}</td>  
                    <td>{{ $dosen->ukm->nama_ukm }}</td>  
                    <td>  
                        <div class="d-flex">  
                            <a href="{{ route('dosens.edit', $dosen->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>  
                            <!-- Trigger Modal -->  
                            <button type="button" class="btn btn-sm btn-info mr-2" data-toggle="modal" data-target="#dosenDetailModal-{{ $dosen->id }}">Detail</button>  

                            <form action="{{ route('dosens.destroy', $dosen->id) }}" method="post">  
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

    <!-- Modals for Each Dosen -->  
    @foreach ($dosens as $dosen)  
        <div class="modal fade" id="dosenDetailModal-{{ $dosen->id }}" tabindex="-1" role="dialog" aria-labelledby="dosenDetailModalLabel-{{ $dosen->id }}" aria-hidden="true">  
            <div class="modal-dialog" role="document">  
                <div class="modal-content">  
                    <div class="modal-header">  
                        <h5 class="modal-title" id="dosenDetailModalLabel-{{ $dosen->id }}">Dosen Name: {{ $dosen->user->name }}</h5>  
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                            <span aria-hidden="true">&times;</span>  
                        </button>  
                    </div>  
                    <div class="modal-body">  
                        <h4>Details:</h4>  
                        <ul>  
                            <li>NIP: {{ $dosen->nip }}</li>  
                            <li>Fakultas: {{ $dosen->fakultas }}</li>  
                            <li>UKM: {{ $dosen->ukm->nama_ukm }}</li>  
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