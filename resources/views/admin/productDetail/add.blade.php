@extends('layout.admin')
@section('content')

<div class="page-body">
    <div class="row">
        <div style="width: 20px;">
            <a href="{{ route('productDetail.index', ['id'=>$product->id] ) }}" class="text-dark">
                <i class="fas fa-chevron-left fa-2x"></i>
            </a>
        </div>
        <div class="col-sm-6">
            <h3>Add New Product Detail</h3>
        </div>
    </div>
</div>

<br>

<div class="card">
    <div class="card-body">
        <form action="{{ route('productDetail.store') }}" method="post" enctype='multipart/form-data' >
            @csrf
            <div class="form-group">
                <input type="hidden" name="product_id" value="{{$product->id}}">
				<label for="sku">Sku</label>
				<input class="form-control" type="text" id="sku" name="sku" required>
            </div>
            <div class="form-group ">
                <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                    @foreach(App\Models\ProductDetail::STATUS_SELECT as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select> 
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-success" >Add New</button>
            </div>
        </form>
    </div>
</div>
@endsection