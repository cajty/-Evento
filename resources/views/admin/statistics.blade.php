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
    @component('admin-sidebar')
    @endcomponent
    <div class="col-md-9">
        <div class="statistics">
            <div class="statistics-item">
                <div class="statistics-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="statistics-label">Total Organizers: {{ $organizers }}</div>
            </div>
            <div class="statistics-item">
                <div class="statistics-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="statistics-label">Total Users: {{ $users }}</div>
            </div>
            <div class="statistics-item">
                <div class="statistics-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="statistics-label">Total Events: {{ $events }}</div>
            </div>
            <div class="statistics-item">
                <div class="statistics-icon">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <div class="statistics-label">Total Tickets: {{ $tickets }}</div>
            </div>
            <div class="statistics-item">
                <div class="statistics-icon">
                    <i class="fas fa-bookmark"></i>
                </div>
                <div class="statistics-label">Total Reservations: {{ $reservations }}</div>
            </div>
        </div>
    </div>
</div>


@endsection