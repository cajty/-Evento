@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mt-5">My Reservations</h1>
        <img src="/path/to/your/image.jpg" alt="Ticket Image" class="img-fluid mx-auto d-block mt-4" style="max-width: 200px;">
        @if ($reservations->isEmpty())
            <p class="text-center text-secondary mt-4">No reservations found.</p>
        @else
            <div class="row">
                @foreach ($reservations as $reservation)
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Reservation ID: {{ $reservation->id }}</h5>
                                <p class="card-text"><strong>User ID:</strong> {{ $reservation->user->name }}</p>
                                <p class="card-text"><strong>Event Title:</strong> {{ $reservation->ticket->event->title }}</p>
                                <p class="card-text"><strong>Ticket Price:</strong> {{ $reservation->ticket->price }}</p>
                                <p class="card-text"><strong>Ticket Type:</strong> {{ $reservation->ticket->type }}</p>
                                <p class="card-text"><strong>Status:</strong> {{ $reservation->status }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection