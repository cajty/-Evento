
    <h1>4</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12  " id = "eventVa">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Category</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->date }}</td>
                            <td>{{ $event->location }}</td>
                            <td>{{ $event->category->name }}</td>
                            <td>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                            @if($event->active_status === 0)
                                        <button type="submit" id="test" onclick="gets('{{ $event->id }}')" class="btn btn-success">
                                            Validate
                                        </button>
                                        @else
                                        <button type="submit" id="test" onclick="gets('{{ $event->id }}')" class="btn btn-danger">
                                            Deactivate
                                        </button>
                                        @endif
                               
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
                {{ $events->links("pagination::bootstrap-5") }}
  
        </div>
    </div>

<script>
    
      function gets(id) {
        console.log('tets');
        let place = "eventVa";
        let url = `/event.is.validat/${id}`;
    request(place,url );
}
</script>