@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-8 offset-2">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-header cardB bg-light">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Update Category</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('index.category')}}" class="btn btn-primary btn-sm">All Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update.category', $editCategory->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <input type="text" class="form-control" name="cat_name" value="{{$editCategory->cat_name}}">
                            </div>
                            <div class="form-gorup">
                                <label for="">Description</label>
                                <textarea name="description" id="" cols="30" rows="3" class="form-control">{{$editCategory->description}}</textarea>
                            </div>
                            <div class="text-right pt-2">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection