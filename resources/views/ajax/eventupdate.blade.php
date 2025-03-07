<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: block;" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="handleModalClose()">Close</button>
            <div class="modal-body">
                <form action="{{ route('events.update', ['event' => $event->id] ) }}" method="POST">
                    @method('put')
                    @csrf


                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$event->title}}">
                    </div>

                    <div>
                        <input type="hidden" value="{{$event->description}}" id="hiddenValue">
                    </div>
                    <div class="form-floating mt-3">
                        <textarea name="content" class="form-control" id="areaContainer" placeholder="content" cols="37" rows="3"></textarea>
                        <label for="floatingTextarea">Content</label>
                    </div>
                    <div class="form-group">
                        <label for="automatic">Automatic</label>
                        <input type="checkbox" class="form-check-input" id="automatic" name="automatic" value="0">
                    </div>

                    <input type="hidden" value="{{$event->description}}" id="hiddenValue">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" value="{{$event->description}}"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>


                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{$event->date}}">
                    </div>


                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{$event->location}}">
                    </div>


                    <div class="form-group">
                        <label for="places">Places</label>
                        <input type="number" class="form-control" id="places" name="places" value="{{$event->places}}">
                    </div>



                    <div class="form-group">
                        <label for="catg_id">Catg ID</label>
                        <input type="text" class="form-control" id="catg_id" name="catg_id" value="{{$event->atg_id}}">
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div>
</div>
<h1>{{$event->date}}</h1>
<script type="text/javascript" id="runscript">
    let hiddenValue = document.getElementById('hiddenValue').value;
    let areaContainer = document.getElementById('description');
    areaContainer.innerText = hiddenValue;


</script>