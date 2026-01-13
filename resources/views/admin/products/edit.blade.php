@extends('layout.admin')
@section('content')

<div class="page-body">
    <div class="row">
        <div style="width: 20px;">
            <a href="{{ route('product.index') }}" class="text-dark">
                <i class="fas fa-chevron-left fa-2x"></i>
            </a>
        </div>
        <div class="col-sm-6">
            <h3>Update Product</h3>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('product.update') }}" method="post" enctype='multipart/form-data' >
            @csrf
            <div class="form-group">
                <input type="hidden" name="id" value="{{$product->id}}">
				<label for="product_image">Image</label>
				<input class="form-control" type="file" id="product_image" name="productImage" >
            </div>

            <div class="form-group">
				<label for="product_name">Product Name</label>
				<input class="form-control" type="text" id="product_name" name="product_name" required value="{{$product->name}}">
            </div>

            <div class="row mb-3"> 
                <div class="form-group col-md-6">
                    <label for="price">Price</label>
                    <input class="form-control" type="number" id="price" name="price" min="0" required value="{{$product->price}}">
                </div>

                <div class="form-group col-md-6">
                    <label for="category">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($category as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>  
                </div>
            </div>
            

            <button type="submit" class="btn btn-success">Update Product</button>            
        </form>
    </div>
</div>
@endsection