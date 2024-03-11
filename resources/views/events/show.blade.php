@extends('layouts.app')

@section('content')
<div class="container">
    <div class="event-details">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ $event->image }}" alt="Event Image" class="img-fluid event-image">
            </div>
            <div class="col-md-8">
                <h1 class="event-title">{{ $event->title }}</h1>
                <p class="event-description">{{ $event->description }}</p>
                <p class="event-date"><strong>Date:</strong> {{ $event->date }}</p>
                <p class="event-location"><strong>Location:</strong> {{ $event->location }}</p>
            </div>
        </div>

        <h2 class="section-title">Tickets</h2>
        <ul class="list-group ticket-list">
            @foreach ($event->tickets as $ticket)
            @if ($ticket->places_nbr > 0)
            <li class="list-group-item ticket">
                <div class="ticket-info">
                    <p class="ticket-type">{{ $ticket->type }}</p>
                    <p class="ticket-price">{{ $ticket->price }}</p>
                    <p class="ticket-places"><strong>Places:</strong> {{ $ticket->places_nbr }}</p>
                </div>
                <div class="reservation-form">
                    <form action="{{ route('reservation.store', $ticket->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Reserve</button>
                    </form>
                </div>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
</div>
@endsection