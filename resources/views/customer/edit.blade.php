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
                <div class="card">
                    <div class="card-header bg-light cardB">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Update Customer</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.customer')}}" class="btn btn-primary btn-sm">All Customer</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update.customer',$editCustomer->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Customer Name</label>
                                <input type="text" class="form-control" value="{{$editCustomer->name}}" name="name">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" value="{{$editCustomer->email}}" name="email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{$editCustomer->phone}}">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Shopname</label>
                                    <input type="text" name="shopName" class="form-control" value="{{$editCustomer->shopName}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">City</label>
                                    <input type="text" class="form-control" name="city" value="{{$editCustomer->city}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Upload New Photo</label>
                                    <input type="file" class="form-control" name="photo" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Old Photo</label>
                                    <img src="{{URL::to($editCustomer->photo)}}" alt="" style="height: 80px; width:80px">
                                </div>
                            </div>
                            <div class="form-gorup">
                                <label for="">Address</label>
                                <textarea name="address" id="" cols="30" rows="3" class="form-control">{{$editCustomer->address}}</textarea>
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