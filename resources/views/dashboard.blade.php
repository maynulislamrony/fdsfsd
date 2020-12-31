@extends('layout.app')
@section('content')
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-success color-white widget-stat">
                <div class="ibox-body pb-2 pt-4">
                    <h2 class="m-b-5" style="font-weight: bold; font-size:45px;" >{{$daily_purchase}}</h2>
                    <div class="m-b-5" style="font-size:20px;">Daily Purchases</div><i class="fa fa-shopping-basket widget-stat-icon"></i>
                </div>
                <div class="ibox-footer pl-4 pr-4" style="background-color: #009432;">
                    <a href="" class="text-white">
                        <div class="row">
                            <div class="col-6">View</div>
                            <div class="col-6 text-right" > <i class="fa fa-arrow-circle-right"></i></div>
                        </div>
                        </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-info color-white widget-stat">
                <div class="ibox-body pb-2 pt-4">
                    <h2 class="m-b-5 "style="font-weight: bold; font-size:45px;" >{{$daily_sales}}</h2>
                    <div class="m-b-5" style="font-size:20px;">Daily Sales</div><i class="fa fa-universal-access widget-stat-icon"></i>
                </div>
                <div class="ibox-footer pl-4 pr-4" style="background-color: #2fb4f1;">
                    <a href="" class="text-white">
                        <div class="row">
                            <div class="col-6">View</div>
                            <div class="col-6 text-right" > <i class="fa fa-arrow-circle-right"></i></div>
                        </div>
                        </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-warning color-white widget-stat">
                <div class="ibox-body pb-2 pt-4">
                    <h2 class="m-b-5 "style="font-weight: bold; font-size:45px;" >{{$daily_expenses}}</h2>
                    <div class="m-b-5" style="font-size:20px;">Daily Expensive</div><i class="fa fa-money widget-stat-icon"></i>
                </div>
                <div class="ibox-footer pl-4 pr-4" style="background-color: #f3ad16;">
                    <a href="" class="text-white">
                        <div class="row">
                            <div class="col-6">View</div>
                            <div class="col-6 text-right" > <i class="fa fa-arrow-circle-right"></i></div>
                        </div>
                        </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-primary color-white widget-stat">
                <div class="ibox-body pb-2 pt-4">
                    <h2 class="m-b-5 "style="font-weight: bold; font-size:45px;" >{{$profit}}</h2>
                    <div class="m-b-5" style="font-size:20px;">Total Profit</div><i class="fa fa-money widget-stat-icon"></i>
                </div>
                <div class="ibox-footer pl-4 pr-4" style="background-color: #6792e2;">
                    <a href="" class="text-white">
                        <div class="row">
                            <div class="col-6">View</div>
                            <div class="col-6 text-right" > <i class="fa fa-arrow-circle-right"></i></div>
                        </div>
                        </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-danger color-white widget-stat">
                <div class="ibox-body pb-2 pt-4">
                    <h2 class="m-b-5 "style="font-weight: bold; font-size:45px;" >{{$total_product}}</h2>
                    <div class="m-b-5" style="font-size:20px;">Total Product</div><i class="fa fa-product-hunt widget-stat-icon"></i>
                </div>
                <div class="ibox-footer pl-4 pr-4" style="background-color: #b30f0f;">
                    <a href="" class="text-white">
                        <div class="row">
                            <div class="col-6">View</div>
                            <div class="col-6 text-right" > <i class="fa fa-arrow-circle-right"></i></div>
                        </div>
                        </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-dark color-white widget-stat">
                <div class="ibox-body pb-2 pt-4">
                    <h2 class="m-b-5 "style="font-weight: bold; font-size:45px;" >{{$total_category}}</h2>
                    <div class="m-b-5" style="font-size:20px;">Total Category</div><i class="fa fa-crosshairs widget-stat-icon"></i>
                </div>
                <div class="ibox-footer pl-4 pr-4" style="background-color: #000000;">
                    <a href="" class="text-white">
                        <div class="row">
                            <div class="col-6">View</div>
                            <div class="col-6 text-right" > <i class="fa fa-arrow-circle-right"></i></div>
                        </div>
                        </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-success color-white widget-stat">
                <div class="ibox-body pb-2 pt-4">
                    <h2 class="m-b-5 "style="font-weight: bold; font-size:45px;" >{{$total_employee}}</h2>
                    <div class="m-b-5" style="font-size:20px;">Total Employee</div><i class="fa fa-user-circle widget-stat-icon"></i>
                </div>
                <div class="ibox-footer pl-4 pr-4" style="background-color: #05802e;">
                    <a href="" class="text-white">
                        <div class="row">
                            <div class="col-6">View</div>
                            <div class="col-6 text-right" > <i class="fa fa-arrow-circle-right"></i></div>
                        </div>
                        </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-danger color-white widget-stat">
                <div class="ibox-body pb-2 pt-4">
                    <h2 class="m-b-5 "style="font-weight: bold; font-size:45px;" >{{$daily_present}}</h2>
                    <div class="m-b-5" style="font-size:20px;">Present Employee</div><i class="fa fa-user widget-stat-icon"></i>
                </div>
                <div class="ibox-footer pl-4 pr-4" style="background-color: #b30f0f;">
                    <a href="" class="text-white">
                        <div class="row">
                            <div class="col-6">View</div>
                            <div class="col-6 text-right" > <i class="fa fa-arrow-circle-right"></i></div>
                        </div>
                        </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header cardB">
                    <div style="font-weight: bold">Latest Sales</div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Sales ID</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestOrder as $row)
                            <tr>
                                <td>{{$row->order_no}}</td>
                                <td>{{$row->customer->name}}</td>
                                <td>{{$row->total}}</td>
                                <td>
                                    <span class="badge badge-pill badge-success">{{$row->status}}</span>
                                </td>
                                <td>{{$row->order_date}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header cardB">
                    <div style="font-weight: bold">Latest Purchase</div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Purchase ID</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestPurchase as $row)
                            <tr>
                                <td>{{$row->purchase_no}}</td>
                                <td>{{$row->supplier->sup_name}}</td>
                                <td>{{$row->total}}</td>
                                <td>
                                    <span class="badge badge-pill badge-success">{{$row->status}}</span>
                                </td>
                                <td>{{$row->purchase_date}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <style>
        .visitors-table tbody tr td:last-child {
            display: flex;
            align-items: center;
        }

        .visitors-table .progress {
            flex: 1;
        }

        .visitors-table .progress-parcent {
            text-align: right;
            margin-left: 10px;
        }
    </style>
    
</div>
@endsection