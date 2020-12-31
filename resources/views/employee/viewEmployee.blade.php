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
                                <a href="{{route('index.employee')}}" class="btn btn-primary btn-sm">All Employee</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped">
                            <tr>
                                <th>Name</th>
                                <td>{{$viewEmployee->name}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$viewEmployee->email}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$viewEmployee->phone}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$viewEmployee->address}}</td>
                            </tr>
                            <tr>
                                <th>NID No</th>
                                <td>{{$viewEmployee->nid}}</td>
                            </tr>
                            <tr>
                                <th>Salary</th>
                                <td>{{$viewEmployee->salary}}</td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <td>
                                    <img src="{{URL::to($viewEmployee->photo)}}" alt="" style="height: 80px; width:80px" >
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection