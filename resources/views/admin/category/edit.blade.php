@extends('layout.admin')
@section('content')

<div class="page-body">
    <div class="row">
        <div style="width: 20px;">
            <a href="{{ route('category.index') }}" class="text-dark">
                <i class="fas fa-chevron-left fa-2x"></i>
            </a>
        </div>
        <div class="col-sm-6">
            <h3>Update Category</h3>
        </div>
    </div>     
</div>

<br>

<div class="card">
    <div class="card-body">
        <form action="{{ route('category.update') }}" method="post" enctype='multipart/form-data' >
            @csrf

            <input type="hidden" name="id" value="{{$category->id}}">

            <div class="form-group">
				<label for="category_name" value="{{$category->category_name}}">Category Name</label>
				<input class="form-control" type="text" id="category_name" name="category_name" required value="{{$category->name}}">
            </div>

            <button type="submit" class="btn btn-success">Update</button>            
        </form>
    </div>
</div>
@endsection