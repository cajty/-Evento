<form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
    @csrf
    <div class="d-flex">
        <div class="form-group mx-sm-3 mb-2">
            <label for="name" class="sr-only">Categories</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
        </div>
        <button type="submit" class="btn btn-primary mb-2">
            <i class="fas fa-edit"></i>
        </button>
    </div>
</form>