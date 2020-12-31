@extends('layout.app')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item active">Monthly Attendence</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="card shadow">
        <div class="card-header cardB bg-light">
            <div class="row">
                <h4 class="col-md-6">Monthly Attendence list <span style="font-size: 13px; color:rgb(112, 6, 6)">(Only Running Month)</span> </h4>
                <div class="col-md-6">
                    <a href="{{route('all.attendence')}}" class="btn btn-primary btn-sm float-right"> All Attendence</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Attendence</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewMonth as $key=> $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->date}}</td>
                            <td>{{$row->name}}</td>
                            <td>
                                <img src="{{URL::to($row->photo)}}" alt="employee Pic" class="pic">
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="radio" value="Present" <?php if($row->attendence == 'Present') echo "checked" ?> disabled > Present
                                    <input type="radio" value="Absence" <?php if($row->attendence == 'Absence') echo "checked" ?> disabled > Absence
                                </div>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection