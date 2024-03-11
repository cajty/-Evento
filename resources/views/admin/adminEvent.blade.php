@extends('layouts.app')

@section('content')

 
    <div class="row">
    @component('adminSidebar')
    @endcomponent
        <div class="col-md-9">
            <section class="mt-4" id="eventVa">
                <h1>Events</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th>Category</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                            <tr>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->date }}</td>
                                <td>{{ $event->location }}</td>
                                <td>{{ $event->category->name }}</td>
                                <td id="{{ $event->id }}">
                                    @if($event->active_status === 1)
                                    <button type="submit" onclick="getsDe('{{ $event->id }}')" class="btn btn-success">
                                        Validate
                                    </button>
                                    @else
                                    <button type="submit" onclick="getsV('{{ $event->id }}')" class="btn btn-danger">
                                        Deactivate
                                    </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $events->links("pagination::bootstrap-5") }}
            </section>
        </div>
    </div>


<script>
    function getsDe(id) {
        let place = id;
        let url = `/events/${id}/validate`;
        request(place, url);
    }

    function getsV(id) {
        let place = id;
        let url = `/events/${id}/deactivate`;
        request(place, url);
    }
</script>
@endsection