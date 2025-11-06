@extends('dashboard')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tickets</h1>
                </div><div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('ticket') }}">Tickets</a>
                        </li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div></div></div></div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('ticket.create') }}" class="btn btn-md btn-success mb-3">Tambah Ticket</a>
                            <div class="table-responsive p-0">
                                <table class="table table-hover text-no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Event Name</th>
                                            <th class="text-center">Ticket Type</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Aksi</th> </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tickets as $item)
                                            <tr>
                                                <td class="text-center">{{ $item->event->event_name }}</td>
                                                <td class="text-center">{{ $item->ticket_type }}</td>
                                                <td class="text-center">{{ $item->price }}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('ticket.destroy', $item->id) }}" method="POST">
                                                        <a href="{{ route('ticket.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Tickets belum tersedia
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{ $tickets->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
