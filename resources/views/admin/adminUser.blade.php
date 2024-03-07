@extends('layouts.app')

@section('content')
<div class="container row ">

    <div class="row">
        <div class="col-md-3 bg-dark p-4 d-none d-md-block sticky-top side">
            <h4 class="text-light">Admin </h4>
            <ul class="list-group">
                <li class="list-group-item" onclick="eventToValidat()">Event</li>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <button onclick="getInfo('{{ $user->id }}')" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ $users->links("pagination::bootstrap-5") }}
                    </div>
                </div>
            </div>
        </section>

    </div>
<script>
function getInfo(id) {
    let place = "eventVa";
    let url = `/users/${id}/role`;
    request(place, url);
}
function eventToValidat() {
    let url = `/eventsv`;
    let place = "d";
    request(place, url);
}
</script>
@endsection