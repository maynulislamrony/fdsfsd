@extends('layout.app')
@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card shadow">
                    <div class="card-header cardB bg-light">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Details Information</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.category')}}" class="btn btn-primary btn-sm">All Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped">
                            <tr>
                                <th>Name</th>
                                <td>{{$viewCategory->cat_name}}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{$viewCategory->description}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection