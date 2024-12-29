@extends('layouts.admin')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">
        {{__('CRUD Event UKM :ukmName', ['ukmName' => $eventName]) }}
    </h1>

    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">New Event</a>
    <a href="{{ route('events.export') }}" class="btn btn-success mb-3">Export</a>

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
            @foreach ($events as $event)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $event->nama_event }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->tanggal_event)->format('d-m-Y') }}</td>
                    <td>{{ $event->lokasi_event }}</td>
                    <td>{{ $event->deskripsi_event }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                            <button type="button" class="btn btn-sm btn-info mr-2" data-toggle="modal" data-target="#eventDetailModal-{{ $event->id }}">Detail</button>

                            <form action="{{ route('events.destroy', $event->id) }}" method="post">
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

    @foreach ($events as $event)
        <div class="modal fade" id="eventDetailModal-{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="eventDetailModalLabel-{{ $event->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventDetailModalLabel-{{ $event->id }}">Event: {{ $event->nama_event }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>Details:</h4>
                        <ul>
                            <li>Nama Event: {{ $event->nama_event }}</li>
                            <li>Tanggal: {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d-m-Y') }}</li>
                            <li>Lokasi: {{ $event->lokasi_event }}</li>
                            <li>Deskripsi: {{ $event->deskripsi_event }}</li>
                            <li>UKM: {{ $event->ukm->nama_ukm }}</li>
                            <li>Gambar: <br>
                                <img src="{{ asset($event->gambar_event) }}" alt="{{ $event->nama_event }}" width="100"></li>
                        </ul>

                        <h5>Peserta</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No Telepon</th>
                                    <th>Bukti Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($event->event_users as $eventUser)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $eventUser->user->name }}</td>
                                        <td>{{ $eventUser->user->no_telepon }}</td>
                                        <td>
                                            <a href="{{ asset($eventUser->bukti_pembayaran) }}" target="_blank">Lihat Bukti Pembayaran</a>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection