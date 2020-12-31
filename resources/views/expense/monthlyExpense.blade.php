@extends('layout.app')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item active">Monthly Expense</li>
    </ol>
</div>
@php
    $month = date('F');
    $total = DB::table('expenses')->where('month',$month)->sum('amount');
@endphp
<div class="text-center">
    <span style="font-weight:bold; font-size:40px; color:red">Total: {{$total}}</span>
</div>
<span style="font-weight:bold; font-size:25px; color:blue">Monthly Expense: {{date('F')}}</span>
<div class="page-content fade-in-up">
    <div class="card">
        <div class="card-header bgView">
            <div class="row">
                <h4 class="col-md-6">Monthly Expense</h4>
                <div class="col-md-6 text-right">
                    <a href="{{route('daily.expense')}}" class="btn btn-light">Daily</a>
                    <a href="{{route('monthly.expense')}}" class="btn btn-danger">Monthly</a>
                    <a href="{{route('yearly.expense')}}" class="btn btn-warning">Yearly</a>
                    <a href="{{route('create.expense')}}" class="btn btn-dark"><i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Details</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($monthEx as $key=> $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->detail}}</td>
                            <td>{{$row->amount}}</td>
                            <td>{{$row->date}}</td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection