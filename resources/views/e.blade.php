@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Event</h1>
    <form action="{{ route('events.store') }}" method="POST">
        <!-- @method('put') -->
        @csrf


        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" >
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" ></textarea>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>


        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" >
        </div>


        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" >
        </div>


        <div class="form-group">
            <label for="places">Places</label>
            <input type="number" class="form-control" id="places" name="places" >
        </div>


        <div class="form-group">
            <label for="automatic">Automatic</label>
            <input type="checkbox" class="form-check-input" id="automatic" name="automatic" value="1">
        </div>


        <div class="form-group">
            <label for="orga_id">Orga ID</label>
            <input type="text" class="form-control" id="orga_id" name="orga_id" >
        </div>

        <div class="form-group">
            <label for="catg_id">Catg ID</label>
            <input type="text" class="form-control" id="catg_id" name="catg_id" >
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection