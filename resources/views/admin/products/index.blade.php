@extends('layout.admin')
@section('content')
<div class="container-fluid  all-view">
    <div class="row mb-3">
        <div class="col">
            <h3 class="pb-2">Product</h3>
        </div>
        <div class="col text-right">
            <a class="btn btn-success" href="{{ route('product.add') }}">
                Add Product
            </a>
        </div>
    </div>
        
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($product as $product)
                <tr>
                    <td><img src="{{ asset('image/') }}/{{ $product->image }}" alt="" width="100" class="img-fluid"></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category_name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <span className="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                        {{ $product->status == 'In Stock' ? 'bg-green-100 text-green-700':
                                ($product->status == 'Low Stock' ? 'bg-amber-100 text-amber-700' :
                                'bg-red-100 text-red-700')
                            }}">
                            {{ $product->status }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('product.edit', ['id'=>$product->id] ) }}" class="fas fa-edit color-muted " style="color: black;"></a>
                        &nbsp;
                        <a href="{{ route('productDetail.index', ['id'=>$product->id] ) }}" class="fas fa-solid fa-eye" style="color: black;"></a>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        
</div>

@endsection
