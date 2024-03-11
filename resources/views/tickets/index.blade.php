@extends('layouts.app')

@section('content')

<div class="welcome-page text-center mt-2">
    <h2 class="welcome-message">Add Tickets</h2>
    <p>You Can Add Tickets To Your Event Here! Thank You.</p>
</div>

<main>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form method="POST" action="{{ route('tickets.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="event_id" aria-describedby="">
                            @foreach($events as $event)
                            <option value="{{ $event->id }}">{{ $event->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nTickets" class="form-label">Number of Tickets:</label>
                        <input type="number" id="nTickets" name="places_nbr" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price: (DH)</label>
                        <input type="number" step="0.01" id="price" name="price" class="form-control">
                    </div>
                    <div class="border p-4 mb-4">
                        <label class="form-label d-block">Type:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" value="Standard" name="type" id="type_standard">
                            <label class="form-check-label" for="type_standard">Standard</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" value="VIP" name="type" id="type_vip">
                            <label class="form-check-label" for="type_vip">VIP</label>
                        </div>
                    </div>
                    <button name="submit" type="submit" class="btn btn-dark float-end">Add Tickets</button>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection