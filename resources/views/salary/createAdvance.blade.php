@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-8 offset-2">
                <div class="card shadow">
                    <div class="card-header cardB bg-light">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Pay Advance Salary</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('all.advanceSalary')}}" class="btn btn-primary btn-sm">All</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('store.advanceSalary')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Employee</label><span class="span_star_message"> *</span>
                                <select name="employee_id" id="" class="form-control">
                                    <option value="">Select Employee</option>
                                    @foreach ($employee as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>  
                                    @endforeach
                                </select>
                                @error('employee_id')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Month</label><span class="span_star_message"> *</span>
                                <select name="month" id="" class="form-control">
                                    <option value="">Select Employee</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="Jun">Jun</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                                @error('month')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Year</label><span class="span_star_message"> *</span>
                                <input type="text" name="year" class="form-control" placeholder="Enter Year" value="{{old('year')}}">
                                @error('year')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Advance Salary</label><span class="span_star_message"> *</span>
                                <input type="text" name="advance_salary" class="form-control" placeholder="Pay Advance Salary" value="{{old('advance_salary')}}">
                                @error('advance_salary')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="text-right pt-2">
                                <input type="submit" value="Add" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection