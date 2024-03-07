@extends('layouts.app')

@section('content')
<div class="container row ">

    <div class="row">
        <div class="col-md-3 bg-dark p-4 d-none d-md-block sticky-top side">
            <h4 class="text-light">Admin </h4>
            <ul class="list-group">


                <li class="list-group-item" onclick="eventToValidat()">ffffffffEvento</li>
                <li class="list-group-item"> <a class="list-group-item" href="{{ route('categories.index') }}">Categories</a></li>
                <li class="list-group-item"> <a class="list-group-item" href="{{ route('events.validat') }}">Events</a></li>
                <li class="list-group-item"> <a class="list-group-item" href="{{ route('get.user') }}">User</a></li>

            </ul>
        </div>
        <section class="" id="eventVa">
            <h1>4</h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-12  ">
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
                                    <td>
                                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                       
                                        @if($event->active_status == 0)
                                        <button type="submit" id="test" onclick="gets('{{ $event->id }}')" class="btn btn-success">
                                            Validate
                                        </button>
                                        @else
                                        <button type="submit" id="test" onclick="gets('{{ $event->id }}')" class="btn btn-danger">
                                            Deactivate
                                        </button>
                                        @endif


                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $events->links("pagination::bootstrap-5") }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                       
                    </div>
                </div>
            </div>
        </section>

    </div>
    <script>
        function gets(id) {

            let place = "eventVa";
            let url = `/event.is.validat/${id}`;
            request(place, url);
        }

        function eventToValidat() {
            let url = `/eventsv`;
            let place = "d";
            request(place, url);
        }
    </script>
    @endsection