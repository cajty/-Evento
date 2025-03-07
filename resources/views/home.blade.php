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
<section class="py-5" >
  <div class="container">
    <div class="row " >
      <div class="col-md-4 py-2">
        <label for="titleFilter" class="form-label">Search by Title:</label>
        <input type="text" class="form-control" id="titleFilter" placeholder="Enter title..." onkeyup="search()">
      </div>
      <div class="col-md-4 py-2">
        <label for="categoryFilter" class="form-label">Filter by Category:</label>
        <select class="form-select" id="categoryFilter" onchange="filter()">
          <option value="allEvents">All Categories</option>
          @foreach($categorys as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach

        </select>
      </div>
      <div class="row border-top p-3" id="event">
      @foreach ($events as $event)
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $event->title }}</h5>
            <i class="card-text">{{ $event->date }}</i>
            <p> in : {{ $event->location }} </p>
            <p> in : {{ $event->category->name }} </p>
            <a href="{{ route('events.show', $event) }}" class="btn btn-primary">Show Event</a>
          </div>
        </div>
      </div>
      @endforeach
      {{ $events->links("pagination::bootstrap-5") }}
      </div>
     
    </div>
</section>

<script>
  function get(id) {
    let place = "event";
    let url = `/events/${id}/edit`;
    request(place, url);
    eval(document.getElementById("runscript").innerHTML);
    eval(closeModal());
  }
  function closeModal() {
      let modalElement = document.getElementById('exampleModal');
      modalElement.classList.remove('show');
      modalElement.setAttribute('aria-modal', 'false');
      modalElement.style.display = 'none';
    }

    function search() {
       valueInput = document.getElementById('titleFilter').value;
  if (valueInput === '') {
        let place = "event";
        let url = '/searchEvent/allEvents';
        request(place, url);  
  } else{
    let place = "event";
        let url = '/searchEvent/' + valueInput;
        request(place, url);  
  }
      

    }

    function filter() {
      let category = document.getElementById('categoryFilter').value;
    
        let place = "event";
        let url = '/categoryFilter/' + category;
        request(place, url);  
      
    
      
    }
  

</script>





@endsection