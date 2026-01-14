@extends('layout.admin')
@section('content')
@php
    // Sum all stocks directly
    $totalStock = \App\Models\ProductDetail::sum('stock');
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                   

                    <div class="container-fluid general-widget">
                        <div class="row">
                            <div class="col-sm-6 col-xl-4 col-lg-6">
                                <a href="">
                                    <div class="card o-hidden border-0">
                                        <div class="bg-primary b-r-4 card-body">
                                            <div class="media static-top-widget">
                                            <div class="align-self-center text-center"><i data-feather="product"></i></div>
                                            <div class="media-body"><span class="m-0">Total Product :</span>
                                                <h4 class="mb-0 counter">{{$totalStock}}</h4></i>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection