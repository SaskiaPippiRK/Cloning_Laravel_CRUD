@extends('dashboard')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">EVENTS</h1>
                </div><div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('event') }}">EVENTS</a>
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
                            <a href="{{ route('event.create') }}" class="btn btn-md btn-success mb-3">Tambah Event</a>
                            <div class="table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Event Name</th>
                                            <th class="text-center">Location</th>
                                            <th class="text-center">Quota</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($events as $item)
                                            <tr>
                                                <td class="text-center">{{ $item->event_name }}</td>
                                                <td class="text-center">{{ $item->location }}</td>
                                                <td class="text-center">{{ $item->quota }}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('event.destroy', $item->id) }}" method="POST">
                                                        <a href="{{ route('event.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Event belum tersedia
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{ $events->links() }}
                        </div></div></div></div></div></div>
@endsection
