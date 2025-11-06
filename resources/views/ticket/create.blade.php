@extends('dashboard')

@section('content')

<div class="container">
    <h2>Create Ticket</h2>
    <form action="{{ route('ticket.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Ticket Name/Type</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="event_id" class="form-label">Select Event</label>
            <select name="event_id" id="event_id" class="form-select" required>
                <option value="">Select an Event</option>
                @foreach ($events as $event)
                    <option value="{{ $event->id }}">
                        {{ $event->event_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
