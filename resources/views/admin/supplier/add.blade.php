@extends('layout.admin')
@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="icon-container">
                            <a href="{{ route('supplier.index') }}" class="text-dark">
                                <i class="fas fa-chevron-left fa-2x"></i>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <h3>Add New Supplier</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('supplier.store') }}" method="post" enctype='multipart/form-data' >
            @csrf
            <div class="form-group">
				<label for="supplier_name">Supplier Name</label>
				<input class="form-control" type="text" id="supplier_name" name="supplier_name" required>
            </div>

            <div class="form-group">
				<label for="contact_person">Contact Person</label>
				<input class="form-control" type="text" id="contact_person" name="contact_person" required>
            </div>

            <div class="form-group">
				<label for="phone_no">Phone Number</label>
				<input class="form-control" type="text" id="phone_no" name="phone_no" required>
            </div>

            <div class="form-group">
				<label for="email">Email</label>
				<input class="form-control" type="text" id="email" name="email" required>
            </div>

            <button type="submit" class="btn btn-primary">Add New</button>            
        </form>
    </div>
</div>
@endsection