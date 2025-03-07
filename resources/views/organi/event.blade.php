@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-3 bg-dark p-4 d-none d-md-block sticky-top side">
        <h4 class="text-light">Organtion</h4>
        <ul class="list-group">
            <li class="list-group-item">
                <a class="list-group-item" href="{{ route('events.orga') }}"">Events</a>
            </li>
            <li class="list-group-item">
                <a class="list-group-item" href="{{ route('tickets.index') }}">Tickets</a>
            </li>
            
        </ul>
        <div id="editEvents" ></div>
    </div>
   
    <div class="col-md-9">
        <section class="mt-4" id="eventVa">
            <div class="row">
                <div class="row p-1"id="event" >
                    @foreach ($events as $event)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->title }}</h5>
                                <i class="card-text">{{ $event->date }}</i>
                                <p> in : {{ $event->location }} </p>
                                <p> in : {{ $event->category->name }} </p>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                <button onclick="get('{{ $event->id }}')" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="{{ route('events.reservation', $event) }}" class="btn btn-primary">Show Event</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{ $events->links("pagination::bootstrap-5") }}
                </div>

            </div>
        </section>
    </div>
</div>


<script>
    function get(id) {
        let place = "editEvents";
        let url = `/events/${id}/edit`;
        request(place, url);
    }
 
    function search() {
        valueInput = document.getElementById('titleFilter').value;
        if (valueInput === '') {
            let place = "event";
            let url = '/searchEvent/allEvents';
            request(place, url);
        } else {
            let place = "event";
            let url = '/searchEvent/' + valueInput;
            request(place, url);
        }
    }
</script>
@endsection