@extends('layouts.app')

@section('content')
@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif


<!-- Hero Section -->
<header class="jumbotron bg-light">
  <div class="container text-center">
    <h1>Welcome to EventOrg</h1>
    <p class="lead">Discover and organize amazing events</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">Get Started</a>
  </div>
</header>

<!-- Features Section -->
<section class="py-5">
  <div class="container">
    <div id='event'></div>
    <div class="row">
      @foreach ($events as $event)
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $event->title }}</h5>
            <i class="card-text">{{ $event->date }}</i>
            <p> in : {{ $event->location }} </p>
            <p> in : {{ $event->category->name }} </p>
            <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash-alt"></i>
              </button>
            </form>
            <button onclick="get('{{ $event->id }}')" class="btn btn-primary">
              <i class="fas fa-edit"></i>
            </button>
          </div>
        </div>
      </div>
      @endforeach
      {{ $events->links("pagination::bootstrap-5") }}
    </div>
</section>

<script>
  function get(id) {
    let place = "event";
    let url = `/events/${id}/edit`;
    request(place, url);
  }
</script>



@endsection