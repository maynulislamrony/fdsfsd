@extends('layout.app')


@section('content')

<div class="p-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow"> 
                <div class="card-header text-white" style="background-color: #00AA9E;">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center mt-2"style="font-weight:bold;font-size:25px">Sales Stock And Profit</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sr. No</th>
                                <th>Date</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Sale Qty</th>
                                <th>Profit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($outStock as $key=>$row)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$row->order->order_date}}</td>
                                <td>{{$row->product->code}}</td>
                                <td>{{$row->product->name}}</td>
                                <td>
                                    @php
                                        $category = DB::table('categories')->where('id', $row->product->cat_id)->select('cat_name')->first();
                                    @endphp
                                    {{$category->cat_name}}
                                </td>
                                <td>{{$row->quantity}}</td>
                                <td>{{$row->profit}}</td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 