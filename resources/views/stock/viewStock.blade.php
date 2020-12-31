@extends('layout.app')


@section('content')

<div class="p-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow"> 
                <div class="card-header text-white" style="background-color: #00aa55;">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center mt-2" style="font-weight:bold;font-size:25px;">Net Stock </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sr.No</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Available Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stock as $key=> $row)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$row->product->code}}</td>
                                <td>{{$row->product->name}}</td>
                                <td>
                                    @php
                                        $category = DB::table('categories')->where('id', $row->product->cat_id)->select('cat_name')->first();
                                    @endphp
                                    {{$category->cat_name}}
                                </td>
                                @if ($row->quantity <=10)
                                    <td style="color:white;">
                                        <span class="badge badge-pill badge-success" style="background-color:red;padding:0px 10px;font-size:15px;">{{$row->quantity}}</span>
                                    </td>
                                @elseif($row->quantity >10)
                                    <td><span class="badge badge-pill badge-success" style="padding:0px 10px; font-size:15px;">{{$row->quantity}}</span></td>
                                @endif
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                    {{-- <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sr.No</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Avil Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stock as $key=> $row)
                            <tr>
                            <td>{{$key+1}}</td>
                                <td>{{$row->product->name}}</td>
                                <td>{{$row->product->code}}</td>
                                <td>
                                    @php
                                        $category = DB::table('categories')->where('id', $row->product->cat_id)->select('cat_name')->first();
                                    @endphp
                                    {{$category->cat_name}}
                                </td>
                                <td>{{$row->quantity}}</td>
                                <td>
                                    
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 