@extends('layout.app')
@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header cardB bg-light">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Details Information</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.supplier')}}" class="btn btn-primary btn-sm">All Suppliers</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped">
                            <tr>
                                <th>Name</th>
                                <td>{{$viewSupplier->sup_name}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$viewSupplier->email}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$viewSupplier->phone}}</td>
                            </tr>
                            <tr>
                                <th>Supplier Type</th>
                                <td>{{$viewSupplier->type}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$viewSupplier->address}}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{$viewSupplier->city}}</td>
                            </tr>
                            <tr>
                                <th>Shop Name</th>
                                <td>{{$viewSupplier->shopName}}</td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <td>
                                    <img src="{{URL::to($viewSupplier->photo)}}" alt="" style="height: 80px; width:80px" >
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection