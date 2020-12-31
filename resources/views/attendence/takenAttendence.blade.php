@extends('layout.app')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item active">Daily Attendence</li>
    </ol>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->any() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="page-content fade-in-up">
    <div class="card shadow">
        <div class="card-header cardB bg-light">
            <div class="row">
                <h4 class="col-md-6">Daily Attendence</h4>
                <div class="col-md-6">
                    <a href="{{route('all.attendence')}}" class="btn btn-primary btn-sm float-right"> All Attendence</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('store.attendence')}}" method="POST">
                @csrf
            <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Aciton</th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach ($employee as $key=> $row)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$row->name}}</td>
                                <td>
                                    <img src="{{URL::to($row->photo)}}" alt="" class="pic">
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="hidden" value="{{$row->id}}" name="emp_id[]">
                                        <input type="radio" value="Present" name="attendence[{{$row->id}}]" required>  Present
                                        <input type="radio" value="Absence" name="attendence[{{$row->id}}]" > Absence
                                        <input type="hidden" value="{{date('d-m-y')}}" name="date">
                                        <input type="hidden" value="{{date('F')}}" name="month">
                                    </div>
                                </td>
                            </tr> 
                        @endforeach
                </tbody>
            </table>
            <div class="text-right">
                <input type="submit" value="Taken" class="btn btn-primary">
            </div>
        </form>
        </div>
    </div>
</div>
@endsection