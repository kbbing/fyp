@extends('layout.admin')
@section('content')
<div class="container-fluid  all-view">
    <div class="row mb-3">
        <div class="col">
            <h3 class="pb-2">Category</h3>
        </div>
        <div class="col text-right">
        </div>
    </div>
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('category.add') }}">
                    Add Category
                </a>
            </div>
        </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{ route('category.edit', ['id'=>$category->id] ) }}" class="btn btn-warning btn-xs">Edit</a>
                        &nbsp;
                        <a href="{{ route('category.delete', ['id'=>$category->id] ) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure need to delete product')">Delete</a>        
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        
</div>

@endsection
