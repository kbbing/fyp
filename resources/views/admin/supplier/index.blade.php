@extends('layout.admin')
@section('content')
<div class="container-fluid  all-view">
    <div class="row mb-3">
        <div class="col">
            <h3 class="pb-2">Suppliers</h3>
        </div>
        <div class="col text-right">
        </div>
    </div>
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('supplier.add') }}">
                    Add Suppliers
                </a>
            </div>
        </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($supplier as $supplier)
                <tr>
                    <td>{{$supplier->id}}</td>
                    <td>{{$supplier->name}}</td>
                    <td>
                        <a href="{{ route('supplier.edit', ['id'=>$supplier->id] ) }}" class="btn btn-warning btn-xs">Edit</a>
                        &nbsp;
                        <a href="{{ route('supplier.delete', ['id'=>$supplier->id] ) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure need to delete product')">Delete</a>        
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        
</div>

@endsection
