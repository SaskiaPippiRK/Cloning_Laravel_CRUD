@extends('dashboard')

@section('content')

<div class="container">
    <h2>Create Event</h2>
    <form action="{{ route('event.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="event_name" class="form-label">Event Name</label>
            <input type="text" name="event_name" id="event_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="quota" class="form-label">Quota</label>
            <input type="number" name="quota" id="quota" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
