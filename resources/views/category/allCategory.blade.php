@extends('layout.app')
@section('content')
<div class="page-heading">
    <h1 class="page-title">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item active">All Category</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="card">
        <div class="card-header bgView">
            <div class="row">
                <h4 class="col-md-6">All Category</h4>
                <div class="col-md-6">
                    <a href="{{route('create.category')}}" class="btn btn-light btn-sm float-right"><i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>Aciton</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $key=> $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->cat_name}}</td>
                            <td>
                                <a href="{{route('edit.category',$row->id)}}" class="btn btn-outline-primary"><i class="fa fa-pencil"></i></a>
                                <a href="#" data-href="{{$row->id}}" class="btn btn-outline-danger" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-trash"></i></a>
                                <a href="{{route('view.category',$row->id)}}" class="btn btn-outline-success"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
            <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "DELETE" below if you are delete this Data.
            <form action="{{route('delete.category')}}" method="POST">
                @csrf
                <input type="hidden" id="input" name="id" value="">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection