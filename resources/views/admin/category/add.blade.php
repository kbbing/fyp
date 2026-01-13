@extends('layout.admin')
@section('content')

<div class="page-body">
    <div class="row">
        <div class="col-6">
            <div class="row">
                <div style="width: 50px;">
                    <a href="{{ route('category.index') }}" class="text-dark">
                        <i class="fas fa-chevron-left fa-2x"></i>
                    </a>
                </div>  
                <div class="col-sm-6">
                    <h3>Add New Category</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="card">
    <div class="card-body">
        <form action="{{ route('category.store') }}" method="post" enctype='multipart/form-data' >
            @csrf
            <div class="form-group">
				<label for="category_name">Category Name</label>
				<input class="form-control" type="text" id="category_name" name="category_name" required>
            </div>

            <button type="submit" class="btn btn-primary">Add New</button>            
        </form>
    </div>
</div>
@endsection