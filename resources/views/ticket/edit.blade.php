@extends('dashboard')

@section('content')

<div class="container">
    <h2>Edit Ticket</h2>
    <form action="{{ route('ticket.update', $ticket->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Ticket Name/Type</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $ticket->name ?? $ticket->ticket_type }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $ticket->price }}" required>
        </div>

        <div class="mb-3">
            <label for="event_id" class="form-label">Select Event</label>
            <select name="event_id" id="event_id" class="form-select" required>
                <option value="">Select an Event</option>
                @foreach ($events as $event)
                    <option value="{{ $event->id }}"
                        {{ $ticket->event_id == $event->id ? 'selected' : '' }}>
                        {{ $event->event_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
