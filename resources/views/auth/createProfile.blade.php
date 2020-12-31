@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-8 offset-2">
                <div class="card shadow">
                    <div class="card-header cardB bg-light">
                        <h4>User Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 text-center">
                                <img src="{{URL::to(Auth::user()->photo)}}" alt="" style="height: 200px; width:200px; border-radius:50%">
                            </div>
                            <div class="col-md-6 " style="margin: auto;width: 50%;">
                                @if (Auth::user()->status == '1')
                                    <h4 style="color: rgb(7, 165, 7); font-weight:bold"><i class="fa fa-bullseye"></i> Active</h4>
                                @else
                                    <h4 style="color: rgb(253, 17, 17); font-weight:bold"><i class="fa fa-bullseye"></i> Inactive</h4>
                                @endif
                                <h3 style=" font-weight:bold">{{Auth::user()->name}}</h3>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-8">
                                <table class="table">
                                    <tr>
                                        <td>Full Name</td>
                                        <td>:</td>
                                        <td style="font-weight:bold">{{Auth::user()->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email Address</td>
                                        <td>:</td>
                                        <td>{{Auth::user()->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Parmanent Address</td>
                                        <td>:</td>
                                        <td>{{Auth::user()->parmanent_address}}</td>
                                    </tr>
                                    <tr>
                                        <td>Present Address</td>
                                        <td>:</td>
                                        <td>{{Auth::user()->present_address}}</td>
                                    </tr>
                                    <tr>
                                        <td>Dath of Birth</td>
                                        <td>:</td>
                                        <td>{{Auth::user()->DOB}}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender </td>
                                        <td>:</td>
                                        <td>{{Auth::user()->gender}}</td>
                                    </tr>
                                    <tr>
                                        <td>Marital Status</td>
                                        <td>:</td>
                                        <td>{{Auth::user()->mertal_satus}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nationality</td>
                                        <td>:</td>
                                        <td>{{Auth::user()->nationality}}</td>
                                    </tr>
                                </table>
                                <div>
                                    <a href="{{route('change.profile')}}" class="btn btn-success">Change Profile</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection