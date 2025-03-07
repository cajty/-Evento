@extends('layouts.app')

@section('content')
<style>
    .statistics {
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 20px;
    }

    .statistics-item {
        text-align: center;
    }

    .statistics-icon {
        font-size: 48px;
        margin-bottom: 10px;
    }

    .statistics-label {
        font-size: 18px;
    }
</style>

<div class="row">
    <div class="col-md-3 bg-dark p-4 d-none d-md-block sticky-top side">
        <h4 class="text-light">Admin</h4>
        <ul class="list-group">
            <li class="list-group-item">
                <a class="list-group-item" href="{{ route('categories.index') }}">Categories</a>
            </li>
            <li class="list-group-item">
                <a class="list-group-item" href="{{ route('events.validat') }}">Events</a>
            </li>
            <li class="list-group-item">
                <a class="list-group-item" href="{{ route('get.user') }}">User</a>
            </li>
        </ul>
    </div>
    <div class="col-md-9">
        <div class="statistics">
            <div class="statistics-item">
                <div class="statistics-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="statistics-label">Total Events: {{ $eventsCount }}</div>
            </div>
            <div class="statistics-item">
                <div class="statistics-icon">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <div class="statistics-label">Total Tickets: {{  $ticketsCount }}</div>
            </div>
            <div class="statistics-item">
                <div class="statistics-icon">
                    <i class="fas fa-bookmark"></i>
                </div>
                <div class="statistics-label">Total Reservations: {{ $reservationsCount  }}</div>
            </div>
        </div>
    </div>
</div>



@endsection