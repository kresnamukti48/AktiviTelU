@extends('layouts.admin')  

@section('main-content')  

    <h1 class="h3 mb-4 text-gray-800">  
    {{ $title ?? __('CRUD Kegiatan UKM :ukmName', ['ukmName' => $ukmName]) }}  
    </h1>
    
    <a href="{{ route('kegiatans.create') }}" class="btn btn-primary mb-3">New Kegiatan</a>


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
                <th>Nama Kegiatan</th>  
                <th>Tanggal Kegiatan</th>  
                <th>Lokasi Kegiatan</th>  
                <th>Deskripsi Kegiatan</th>  
                <th>Actions</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach ($kegiatan as $item)  
                <tr>  
                    <td scope="row">{{ $loop->iteration }}</td>  
                    <td>{{ $item->nama_kegiatan }}</td>  
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d-m-Y') }}</td>  
                    <td>{{ $item->lokasi_kegiatan }}</td>  
                    <td>{{ $item->deskripsi_kegiatan }}</td>  
                    <td>  
                        <div class="d-flex">  
                            <a href="{{ route('kegiatans.edit', $item->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>  
                            <!-- Trigger Modal -->  
                            <button type="button" class="btn btn-sm btn-info mr-2" data-toggle="modal" data-target="#kegiatanDetailModal-{{ $item->id }}">Detail</button>  

                            <form action="{{ route('kegiatans.destroy', $item->id) }}" method="post">  
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

    <!-- Modals for Each Kegiatan -->  
    @foreach ($kegiatan as $item)  
        <div class="modal fade" id="kegiatanDetailModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="kegiatanDetailModalLabel-{{ $item->id }}" aria-hidden="true">  
            <div class="modal-dialog" role="document">  
                <div class="modal-content">  
                    <div class="modal-header">  
                        <h5 class="modal-title" id="kegiatanDetailModalLabel-{{ $item->id }}">Kegiatan: {{ $item->nama_kegiatan }}</h5>  
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                            <span aria-hidden="true">&times;</span>  
                        </button>  
                    </div>  
                    <div class="modal-body">  
                        <h4>Details:</h4>  
                        <ul>  
                            <li>Nama Kegiatan: {{ $item->nama_kegiatan }}</li>  
                            <li>Tanggal: {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d-m-Y') }}</li>  
                            <li>Lokasi: {{ $item->lokasi_kegiatan }}</li>  
                            <li>Deskripsi: {{ $item->deskripsi_kegiatan }}</li>  
                            <li>UKM: {{ $item->ukm->nama_ukm }}</li>
                            <li>Gambar: <br>  
                                <img src="{{ asset($item->gambar_kegiatan) }}" alt="{{ $item->nama_kegiatan }}" width="100"></li>
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

@endsection@extends('layouts.admin')  

@section('main-content')  

    <h1 class="h3 mb-4 text-gray-800">  
    {{ $title ?? __('CRUD Kegiatan UKM :ukmName', ['ukmName' => $ukmName]) }}  
    </h1>
    
    <a href="{{ route('kegiatans.create') }}" class="btn btn-primary mb-3">New Kegiatan</a>


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
                <th>Nama Kegiatan</th>  
                <th>Tanggal Kegiatan</th>  
                <th>Lokasi Kegiatan</th>  
                <th>Deskripsi Kegiatan</th>  
                <th>Actions</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach ($kegiatan as $item)  
                <tr>  
                    <td scope="row">{{ $loop->iteration }}</td>  
                    <td>{{ $item->nama_kegiatan }}</td>  
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d-m-Y') }}</td>  
                    <td>{{ $item->lokasi_kegiatan }}</td>  
                    <td>{{ $item->deskripsi_kegiatan }}</td>  
                    <td>  
                        <div class="d-flex">  
                            <a href="{{ route('kegiatans.edit', $item->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>  
                            <!-- Trigger Modal -->  
                            <button type="button" class="btn btn-sm btn-info mr-2" data-toggle="modal" data-target="#kegiatanDetailModal-{{ $item->id }}">Detail</button>  

                            <form action="{{ route('kegiatans.destroy', $item->id) }}" method="post">  
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

    <!-- Modals for Each Kegiatan -->  
    @foreach ($kegiatan as $item)  
        <div class="modal fade" id="kegiatanDetailModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="kegiatanDetailModalLabel-{{ $item->id }}" aria-hidden="true">  
            <div class="modal-dialog" role="document">  
                <div class="modal-content">  
                    <div class="modal-header">  
                        <h5 class="modal-title" id="kegiatanDetailModalLabel-{{ $item->id }}">Kegiatan: {{ $item->nama_kegiatan }}</h5>  
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                            <span aria-hidden="true">&times;</span>  
                        </button>  
                    </div>  
                    <div class="modal-body">  
                        <h4>Details:</h4>  
                        <ul>  
                            <li>Nama Kegiatan: {{ $item->nama_kegiatan }}</li>  
                            <li>Tanggal: {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d-m-Y') }}</li>  
                            <li>Lokasi: {{ $item->lokasi_kegiatan }}</li>  
                            <li>Deskripsi: {{ $item->deskripsi_kegiatan }}</li>  
                            <li>UKM: {{ $item->ukm->nama_ukm }}</li>
                            <li>Gambar: <br>  
                                <img src="{{ asset($item->gambar_kegiatan) }}" alt="{{ $item->nama_kegiatan }}" width="100"></li>
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

@endsection@extends('layouts.admin')  

@section('main-content')  

    <h1 class="h3 mb-4 text-gray-800">  
    {{ $title ?? __('CRUD Kegiatan UKM :ukmName', ['ukmName' => $ukmName]) }}  
    </h1>
    
    <a href="{{ route('kegiatans.create') }}" class="btn btn-primary mb-3">New Kegiatan</a>


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
                <th>Nama Kegiatan</th>  
                <th>Tanggal Kegiatan</th>  
                <th>Lokasi Kegiatan</th>  
                <th>Deskripsi Kegiatan</th>  
                <th>Actions</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach ($kegiatan as $item)  
                <tr>  
                    <td scope="row">{{ $loop->iteration }}</td>  
                    <td>{{ $item->nama_kegiatan }}</td>  
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d-m-Y') }}</td>  
                    <td>{{ $item->lokasi_kegiatan }}</td>  
                    <td>{{ $item->deskripsi_kegiatan }}</td>  
                    <td>  
                        <div class="d-flex">  
                            <a href="{{ route('kegiatans.edit', $item->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>  
                            <!-- Trigger Modal -->  
                            <button type="button" class="btn btn-sm btn-info mr-2" data-toggle="modal" data-target="#kegiatanDetailModal-{{ $item->id }}">Detail</button>  

                            <form action="{{ route('kegiatans.destroy', $item->id) }}" method="post">  
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

    <!-- Modals for Each Kegiatan -->  
    @foreach ($kegiatan as $item)  
        <div class="modal fade" id="kegiatanDetailModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="kegiatanDetailModalLabel-{{ $item->id }}" aria-hidden="true">  
            <div class="modal-dialog" role="document">  
                <div class="modal-content">  
                    <div class="modal-header">  
                        <h5 class="modal-title" id="kegiatanDetailModalLabel-{{ $item->id }}">Kegiatan: {{ $item->nama_kegiatan }}</h5>  
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                            <span aria-hidden="true">&times;</span>  
                        </button>  
                    </div>  
                    <div class="modal-body">  
                        <h4>Details:</h4>  
                        <ul>  
                            <li>Nama Kegiatan: {{ $item->nama_kegiatan }}</li>  
                            <li>Tanggal: {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d-m-Y') }}</li>  
                            <li>Lokasi: {{ $item->lokasi_kegiatan }}</li>  
                            <li>Deskripsi: {{ $item->deskripsi_kegiatan }}</li>  
                            <li>UKM: {{ $item->ukm->nama_ukm }}</li>
                            <li>Gambar: <br>  
                                <img src="{{ asset($item->gambar_kegiatan) }}" alt="{{ $item->nama_kegiatan }}" width="100"></li>
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