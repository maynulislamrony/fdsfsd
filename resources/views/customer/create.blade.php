@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header cardB bg-light">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Add Customer</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.customer')}}" class="btn btn-primary btn-sm">All Customer</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('store.customer')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Customer Name</label><span class="span_star_message"> *</span>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                @error('name')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Email</label><span class="span_star_message"> *</span>
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                @error('email')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Phone</label><span class="span_star_message"> *</span>
                                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                                @error('phone')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Shopname</label><span class="span_star_message"> *</span>
                                    <input type="text" name="shopName" class="form-control" value="{{old('shopName')}}">
                                @error('shopName')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">City</label><span class="span_star_message"> *</span>
                                    <input type="text" class="form-control" name="city" value="{{old('city')}}">
                                @error('city')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Upload Photo</label>
                                <input type="file" class="form-control" name="photo">
                            </div>
                            <div class="form-gorup">
                                <label for="">Address</label><span class="span_star_message"> *</span>
                                <textarea name="address" id="" cols="30" rows="3" class="form-control" >{{old('address')}}</textarea>
                            </div>
                            @error('address')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
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