@extends('layouts.app')

@section('content')
<div class="container col-3">
    <div class="card mt-4  ">
        <div class="card-body" >
            <h5 class="card-title">

                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="d-flex">
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="name" class="sr-only">Categories</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Categories">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </form>
            </h5>
            <table class="table ">

                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}

                        </td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection