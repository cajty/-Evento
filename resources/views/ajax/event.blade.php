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