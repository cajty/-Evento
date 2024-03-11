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