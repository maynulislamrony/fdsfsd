@extends('layout.app')
@section('content')
<div class="container-fluid">
    <div id="ui-view" data-select2-id="ui-view">
        <div>
            <div class="card">
                <div class="card-header">Invoice
                    <strong>{{$order->order_no}}</strong>
                    <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true">
                        <i class="fa fa-print"></i> Print</a>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <h6 class="mb-3">From:</h6>
                            <div>
                                <strong>{{$shopdetails->company_name}}</strong>
                            </div>
                            <div>{{$shopdetails->company_address}}</div>
                            <div>{{$shopdetails->company_city}}, {{$shopdetails->company_country}}</div>
                            <div>{{$shopdetails->company_email}}</div>
                            <div>{{$shopdetails->company_phone}}, {{$shopdetails->company_mobile}}</div>
                        </div>
                        <div class="col-sm-4">
                            <h6 class="mb-3">To:</h6>
                            <div>
                                <strong>{{$order->name}}}</strong>
                            </div>
                            <div>{{$order->shopName}}</div>
                            <div>{{$order->address}}</div>
                            <div>{{$order->email}}</div>
                            <div>{{$order->phone}}</div>
                        </div>
                        <div class="col-sm-4">
                            <h6 class="mb-3">Details:</h6>
                            <div>Invoice No: 
                                <strong>{{$order->order_no}}</strong>
                            </div>
                            <div>Date: 
                               <strong>{{$order->order_date}}</strong>
                            </div>
                            <div>Order Status: 
                                <span class="badge badge-pill badge-success">{{$order->status}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th class="center">Quantity</th>
                                    <th class="right">Unit Cost</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($orderDetails as $row)
                                <tr>
                                    <td class="center">{{$i++}}</td>
                                    <td class="left">{{$row->product->name}}}</td>
                                    <td class="left">Apple iphoe 10 with extended warranty</td>
                                    <td class="center">{{$row->quantity}}</td>
                                    <td class="right">{{$row->unit_cost}}</td>
                                    <td class="right">{{$row->total}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                            <div style="font-weight: bold; margin-bottom: 10px">Payment Type: {{$order->payment_type}}</div>
                            <div style="font-weight: bold; margin-bottom: 10px"">Pyment: {{$order->pay}}</div>
                            <div style="font-weight: bold">Due: <?php if($order->due == Null) echo "0" ?> {{$order->due}}</div>
                        </div>
                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="text-right">
                                            <strong>Subtotal</strong>
                                        </td>
                                        <td class="text-center">{{$order->sub_total}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">
                                            <strong>VAT (21%)</strong>
                                        </td>
                                        <td class="text-center">{{$order->tax}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="text-center">
                                            <strong>{{$order->total}}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection