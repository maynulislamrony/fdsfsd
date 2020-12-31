@extends('layout.app')

@section('content')
    <div class="pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-light cardB">
                        <div class="row">
                            <h4 class="col-md-6">Sales</h4>
                        </div>
                    </div>
                    <div class="card-body">
                    {{-- Datatables --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-danger text-center">
                                    <span style="font-weight:bold; font-size:20px;color:rgb(251, 250, 253)">Cart Added Product</span>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Total Price</th>
                                                    <th>Aciton</th>
                                                </tr>
                                            </thead>
                                            @php
                                                $prod = Cart::content();
                                            @endphp
                                        <tbody>
                                            @foreach ($prod as $row)
                                            <tr class="odd">
                                            </tr>
                                                <tr>
                                                    
                                                    <td>{{$row->name}}</td>
                                                    <td>
                                                    <form action="{{route('cart.update1',$row->rowId)}}" method="POST">
                                                        @csrf
                                                            <input type="number" style="width:75px" value="{{$row->qty}}" name="qty">
                                                            <input type="hidden" value="{{$row->id}}" name="product_id">
                                                            <button class="btn btn-success" style="padding: .2rem; margin-left:5px;"> <i class="fa fa-check"></i> </button>
                                                    </form>
                                                    </td>
                                                    <td>{{$row->price}}</td>
                                                    <td>{{$row->price*$row->qty}}</td>
                                                    <td>
                                                        <a href="{{route('cart.delete', $row->rowId)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr> 
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card" style="width: 100%;">
                                        <div class="card-header text-center" style="background-color: #130f40;color:#fff">
                                        <p class="hr2 pb-2" style="font-size: 20px;">Total Quantity: {{Cart::count()}}</p>
                                            <p class="hr2 pb-2" style="font-size: 20px;">Sub-Total: {{Cart::subtotal()}}</p>
                                            <p class="hr2 pb-2" style="font-size: 20px;">Vat: {{Cart::tax()}}</p>
                                            <p style="font-size: 25px; font-weight:bold">Total Price:</p>
                                            <h2 style="font-size: 35px; font-weight:bold; padding: 0px">{{Cart::total()}}</h2>
                                        </div>
                                    </div>
                                    <div class=" pt-3">
                                        <form action="{{route('invoice.sales')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="" style="font-size: 20px;">Select Customer</label>
                                                <a class="float-right btn btn-success btn-sm" data-toggle="modal" data-target="#modal-primary" href=""><i class="fa fa-plus" ></i> Add</a>
                                                <select name="customer_id" id="" class="form-control">
                                                    <option value="">Select Customer</option>
                                                    @foreach ($customer as $row)
                                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        <div class="text-center">
                                            <input type="submit" value="Create Invoice" class="btn btn-primary btn-lg">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-primary text-center">
                                    <span style="font-weight:bold; font-size:20px;color:rgb(27, 10, 58)">Select Product</span> 
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Pr Code</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product as $row)
                                            <tr>
                                                <td>{{$row->code}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->category->cat_name}}</td>
                                                <td>
                                                <img src="{{URL::to($row->photo)}}" alt="" style="height: 50px; width:50px">
                                                </td>
                                                <td>
                                                    <form action="{{route('addCart')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$row->id}}">
                                                        <input type="hidden" name="name" value="{{$row->name}}">
                                                        <input type="hidden" name="unit" value="{{$row->selPrice}}">
                                                        <input type="hidden" name="qty" value="1">
                                                        <input type="hidden" name="description" value="{{$row->description}}">
                                                        <button class="btn btn-success" style="padding: .rem; margin-left:5px;"> <i class="fa fa-plus"></i> </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="modal-primary">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-light cardB">
            <h4 class="modal-title ">Add Customer</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
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
                        <small>Only number type support.</small>
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
@endsection