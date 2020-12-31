@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-8 offset-2">
                <div class="card shadow">
                    <div class="card-header cardB bg-light">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Update Advance Salary</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('all.advanceSalary')}}" class="btn btn-primary btn-sm">All</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update.advanceSalary',$advance->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Employee</label>
                                <select name="employee_id" id="" class="form-control">
                                    <option value="">Select Employee</option>
                                    @foreach ($employee as $row)
                                        <option value="{{$row->id}}" @php
                                            if($advance->employee_id == $row->id) echo "selected"
                                        @endphp >{{$row->name}}</option>  
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Month</label>
                                <select name="month" id="" class="form-control">
                                    <option value="">Select Employee</option>
                                    <option value="January" @php if($advance->month == 'January') echo "selected" @endphp >January</option>
                                    <option value="February" @php if($advance->month == 'February') echo "selected" @endphp>February</option>
                                    <option value="March" @php if($advance->month == 'March') echo "selected" @endphp>March</option>
                                    <option value="April" @php if($advance->month == 'April') echo "selected" @endphp>April</option>
                                    <option value="May" @php if($advance->month == 'May') echo "selected" @endphp>May</option>
                                    <option value="Jun" @php if($advance->month == 'Jun') echo "selected" @endphp>Jun</option>
                                    <option value="July" @php if($advance->month == 'July') echo "selected" @endphp>July</option>
                                    <option value="August" @php if($advance->month == 'August') echo "selected" @endphp>August</option>
                                    <option value="September" @php if($advance->month == 'September') echo "selected" @endphp>September</option>
                                    <option value="October" @php if($advance->month == 'October') echo "selected" @endphp>October</option>
                                    <option value="November" @php if($advance->month == 'November') echo "selected" @endphp>November</option>
                                    <option value="December" @php if($advance->month == 'December') echo "selected" @endphp>December</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Year</label>
                                <input type="text" name="year" class="form-control" placeholder="Enter Year" value="{{$advance->year}}">
                            </div>
                            <div class="form-group">
                                <label for="">Advance Salary</label>
                                <input type="text" name="advance_salary" class="form-control" placeholder="Pay Advance Salary" value="{{$advance->advance_salary}}">
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