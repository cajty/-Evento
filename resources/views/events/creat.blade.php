@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mt-2">Create Event</h1>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date">
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location">
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="automatic" name="automatic" value="1">
                    <label class="form-check-label" for="automatic">Automatic</label>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="catg_id" aria-describedby="">
                        @foreach($categorys as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center">
                    <button name="submit" type="submit" class="btn btn-dark">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection