@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header cardB bg-light">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Update Profile</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('create.profile')}}" class="btn btn-primary btn-sm">Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update.profile', $user->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Gender</label>
                                    <select name="gender" id="" class="form-control">
                                        <option value="Male" @php if($user->gender == 'Male') echo "Selected" @endphp>Male</option>
                                        <option value="Female"@php if($user->gender == 'Female') echo "Selected" @endphp>Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Dath of Birth</label>
                                    <input type="text" name="DOB" class="form-control" value="{{$user->DOB}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="">Merital Status</label>
                                    <select name="mertal_satus" id="" class="form-control">
                                        <option value="Married" @php if($user->mertal_satus == 'Married') echo "Selected" @endphp>Married</option>
                                        <option value="Un-married" @php if($user->mertal_satus == 'Un-married') echo "Selected" @endphp>Un-married</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="">Nationality</label>
                                    <select name="nationality" id="" class="form-control">
                                        <option value="Bangladesh" @php if($user->nationality == 'Bangladesh') echo "Selected" @endphp>Bangladesh</option>
                                        <option value="Others" @php if($user->nationality == 'Others') echo "Selected" @endphp>Others</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="1" @php if($user->status == '1') echo "Selected" @endphp>Active</option>
                                        <option value="0" @php if($user->status == '0') echo "Selected" @endphp>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="">New Photo</label>
                                    <input type="file" name="photo" class="form-control">
                                </div>
                                <div class="form-group col-md-6 text-center">
                                    <label for="">Old Photo</label>
                                    <img src="{{URL::to($user->photo)}}" style="height: 70px;width:70px;border-radius:10px" alt="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Parmanent Address</label>
                                    <textarea name="parmanent_address" id="" cols="30" rows="5" class="form-control">{{$user->parmanent_address}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Prasent Address</label>
                                    <textarea name="present_address" id="" cols="30" rows="5" class="form-control">{{$user->present_address}}</textarea>
                                </div>
                            </div>
                            <div class="text-right pt-2">
                                <input type="submit" value="Update information" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection