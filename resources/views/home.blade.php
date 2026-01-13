@extends('layout.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container-fluid general-widget">
                        <div class="row">
                            <div class="col-sm-6 col-xl-4 col-lg-6">
                                <a href="">
                                    <div class="card o-hidden border-0">
                                        <div class="bg-primary b-r-4 card-body">
                                            <div class="media static-top-widget">
                                            <div class="align-self-center text-center"><i data-feather="product"></i></div>
                                            <div class="media-body"><span class="m-0">total_product</span>
                                                <h4 class="mb-0 counter">product</h4><i class="icon-bg" data-feather="product"></i>
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