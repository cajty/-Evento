@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Event</h1>
    <form action="{{ route('events.store') }}" method="POST">
        <!-- @method('put') -->
        @csrf


        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>


        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>


        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location">
        </div>
        <div class="form-group">
            <select class="form-select" id="categoryFilter" onchange="filter()">
                <option value="all">All Categories</option>
                @foreach($categorys as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach

            </select>
        </div>



        <div class="form-group">
            <label for="automatic">Automatic</label>
            <input type="checkbox" class="form-check-input" id="automatic" name="automatic" value="1">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select mb-4" id="category" name="catg_id" aria-describedby="">
                @foreach($categorys as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>





        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection