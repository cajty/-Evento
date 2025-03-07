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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Places</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event->tickets as $ticket)
                <tr>
                    <td>{{ $ticket->type }}</td>
                    <td>{{ $ticket->price }}</td>
                    <td>{{ $ticket->places_nbr }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h2 class="section-title">Suspended Reservations</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event->tickets as $ticket)
                    @foreach ($ticket->reservations as $reservation)
                        @if ($reservation->status === 'suspended')
                            <tr id="{{ $reservation->id }}">
                                <td>{{ $reservation->id }}</td>
                                <td>
                                    <button onclick="getRa('{{ $reservation->id }}')" class="btn btn-success">Accept</button>
                                    <button onclick="getRj('{{ $reservation->id }}')" class="btn btn-danger">Reject</button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function getRa(id) {
        let place = id;
        let url = `/reservation/${id}/validate`;
        request(place, url);
    }

    function getRj(id) {
        let place = id;
        let url = `/reservation/${id}/deactivate`;
        request(place, url);
    }
</script>
@endsection