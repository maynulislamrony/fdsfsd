@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-8 offset-2">
                <div class="card shadow">
                    <div class="card-header cardB bg-dark text-light">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Product Import & Export</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('product.export')}}" class="btn btn-primary btn-sm">Download</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('product.import')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Xlsx File Import</label><span class="span_star_message"> *</span>
                                <input type="file" class="form-control" name="product_import">
                                @error('product_import')
                                    <span class="span_star_message">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="text-right pt-2">
                                <input type="submit" value="Upload" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection