@extends('layout.app')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item active">last month Salary</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="card">
        <div class="card-header bgView">
            <div class="row">
                <h4 class="col-md-6">Last Month Salary</h4>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Month</th>
                        <th>Salary</th>
                        <th>Advance</th>
                        <th>Net Salary</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lastMonthSalary as $key=> $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->employee->name}}</td>
                            <td>
                                <img src="{{URL::to($row->employee->photo)}}" class="pic" alt=" picture not Found">
                            </td>
                            <td>{{$row->month}}</td>
                            <td>{{$row->employee->salary}}</td>
                            <td>{{$row->advance_salary}}</td>
                            <td>{{$row->net_salary}}</td>
                            <td>
                                <span class="badge badge-pill badge-success">{{$row->status}}</span>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection