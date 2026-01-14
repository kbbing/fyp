@extends('layout.admin')
@section('content')
<div class="container-fluid  all-view">
    <div class="row mb-3">
        <div class="col text-left">
            <h3 class="pb-2">Product Movement</h3>
        </div>
    </div>
        
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Time Stamp</th>
                <th>Item</th>
                <th>Status</th>
                <th>Person</th>
            </tr>
        </thead>
        <tbody>
            @foreach($report as $report)
                <tr>
                    <td>{{$report->created_at}}</td>
                    <td>{{$report->item}} - {{$report->sku}}</td>
                    <td>{{$report->status == 1 ? 'Return' : 'Rented Out'}}</td>
                    <td>{{$report->person}}</td>
                </tr>
                @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        
</div>

@endsection


