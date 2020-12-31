@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-header cardB bg-light">
                        <div>
                            <h4>Update Store Information</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('store.setting',$viewSetting->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Shop Name</label>
                                    <input type="text" class="form-control" name="company_name" value="{{$viewSetting->company_name}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="company_email" value="{{$viewSetting->company_email}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="company_phone" value="{{$viewSetting->company_phone}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Mobile</label>
                                    <input type="text" class="form-control" name="company_mobile" value="{{$viewSetting->company_mobile}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="">City</label>
                                    <input type="text" class="form-control" name="company_city" value="{{$viewSetting->company_city}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control" name="company_country" value="{{$viewSetting->company_country}}"> 
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Zip Code</label>
                                    <input type="text" class="form-control" name="company_zipcode" value="{{$viewSetting->company_zipcode}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Logo</label>
                                    <input type="file" class="form-control" name="company_photo">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Old Logo</label>
                                    <img src="{{URL::to($viewSetting->company_photo)}}" alt="" style="height: 100px; width:100px">
                                </div>
                            </div>
                            <div class="form-gorup">
                                <label for="">Address</label>
                                <textarea name="company_address" id="" cols="30" rows="3" class="form-control">{{$viewSetting->company_address}}</textarea>
                            </div>
                            <div class="text-right pt-2">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection