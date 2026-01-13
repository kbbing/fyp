@extends('layout.admin')
@section('content')
<div class="container-fluid  all-view">
    <div class="row mb-3">
        <div style="width: 50px;">
            <a href="{{ route('product.index') }}" class="text-dark">
                <i class="fas fa-chevron-left fa-2x"></i>
            </a>
        </div>
        <div class="col text-left">
            <h3 class="pb-2">{{ $product->name }}</h3>
        </div>
        <div class="col text-right">
            <h3 class="pb-2"> Total Stock: {{ $product->stock }}</span>
        </div>
    </div>
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12 text-right">
                <a class="btn btn-success" href="{{ route('productDetail.add', $product->id) }}">
                    Add New
                </a>
            </div>
        </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Sku</th>
                <th>Stock Location</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productDetail as $productDetail)
                <tr>
                    <td>{{$productDetail->sku}}</td>
                    <td>{{$productDetail->stock_location}}</td>
                    <td>
                        @if ($productDetail->status == 1)
                            Available
                        @elseif ($productDetail->status == 2)
                            Maintenance
                        @elseif ($productDetail->status == 3)
                            Rented Out
                        @endif
                    </td>
                    <td>

                        <button class="fas fa-edit color-muted" style="border: transparent; background: none;" data-bs-toggle="modal" data-bs-target="#editModal"></button>

                        <div class="modal fade" id="editModal">
                            <div class="modal-dialog">
                                <form method="POST" action="{{ route('productDetail.edit' , ['id' => $productDetail->id]) }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5>Edit Product Detail</h5>
                                        </div>

                                        <div class="modal-body">
                                            @foreach(App\Models\ProductDetail::where('id', $productDetail->id)->get() as $pd)

                                            <label for="sku">Sku : {{$pd->sku}}</label>

                                            <div>
                                                <label for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    @foreach(App\Models\ProductDetail::STATUS_SELECT as $key => $value)
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                            @endforeach
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Confirm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        &nbsp;
                        @if ($productDetail->status == 1)
                        
                            <button class="fa fas fa-share" style="border: transparent; background: none;" data-bs-toggle="modal" data-bs-target="#rentModal"></button>

                            <div class="modal fade" id="rentModal">
                                <div class="modal-dialog">
                                    <form method="POST" action="{{ route('productDetail.rent' , ['id' => $productDetail->id]) }}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5>Rent Out</h5>
                                            </div>

                                            <div class="modal-body">
                                                <label for="renter_name">Renter Name</label>
                                                <input name="renter_name" class="form-control" placeholder="Renter Name">
                                                <br>
                                                <label for="rent_date">Rent Date</label>
                                                <input type="date" name="rent_date" class="form-control mt-2">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Confirm</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                             </div>                                          
                    
                        @elseif ($productDetail->status == 3)   
                            <a href="{{ route('productDetail.return', [
                                    'id' => $productDetail->id
                                ]) }}"  class="fa fas fa-reply" style="color: black;"></a>
                        @else
                            <i class="fa fa-exclamation-triangle"></i>
                        @endif
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        
</div>

@endsection


