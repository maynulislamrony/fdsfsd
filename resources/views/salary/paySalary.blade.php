@extends('layout.app')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item active">Pay Salary</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="card">
        <div class="card-header bgView">
            <div class="row">
                <div class="col-md-6">
                    <span style="font-size: 22px;">Pay Salary</span>
                </div>
                @php
                    $date = date("F",strtotime('-1 month'));
                @endphp
                <div class="col-md-6 text-right">
                    <span style="font-size: 22px;">{{$date}}</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Pay Month</th>
                        <th>Salary</th>
                        <th>Advance</th>
                        <th>Net Salary</th>
                        <th>Aciton</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employee as $key=> $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->name}}</td>
                            <td>
                                <img src="{{URL::to($row->photo)}}" class="pic" alt=" picture not Found">
                            </td>
                            <td>{{date("F", strtotime('-1 month'))}}</td>
                            <td>{{$row->salary}}</td>
                            @php
                                $advanceSalary = DB::table('advance_salaries')->where('employee_id', $row->id)->first();
                            @endphp
                            @if ($advanceSalary)
                                <td>{{$advanceSalary->advance_salary}}</td>
                            @else
                                <td>{{"0"}}</td>
                            @endif
                            @if ($advanceSalary)
                                <td>{{$row->salary-$advanceSalary->advance_salary}}</td>
                            @else
                                <td>{{$row->salary}}</td>
                            @endif
                            <td>
                                <a href="#" data-href={{$row->id}} class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#paymodal"><i class="fa fa-money"></i> Pay now</a>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="paymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header bg-light cardB">
            <h5 class="modal-title" id="exampleModalLabel">
            <i class="fa fa-money"></i>
                Pay Salary
            </h5>
            <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{route('pay.salarySuccess')}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Payment Type</label>
                    <select name="payment_type" id="" class="form-control">
                        <option value="">Select type</option>
                        <option value="Hand Cash">Hand Cash</option>
                        <option value="bkash">bkash</option>
                    </select>
                </div>
                <input type="hidden" id="input" name="id">
                <input type="hidden" name="month" value="{{date("F", strtotime('-1 month'))}}">
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-success" value="Pay Salary">
            </div>
        </form>
        </div>
    </div>
</div>
@endsection