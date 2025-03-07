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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr id="{{ $user->id }}">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name }}</td>

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
            {{ $users->links("pagination::bootstrap-5") }}
        </section>
    </div>
</div>

<script>
    function getInfo(id) {
        let place = id;
        let url = `/users/${id}/role`;
        request(place, url);
    }
</script>

@endsection