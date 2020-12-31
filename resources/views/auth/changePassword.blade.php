@extends('layout.app')
@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-light cardB">
                    <h4>Change Password</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('change.password') }}">
                        @csrf
                        <div class="form-group">
                            <label for="password">Current Password</label>
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                @error('new_password')
                                    <span class="span_star_message">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                        <div class="form-group">
                            <label for="password">New Confirm Password</label>
                            <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                        </div>
                        <div class="form-group">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">
                                    Update Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body ">
                    <div class="text-center">
                        <img src="{{asset('/'.auth()->user()->photo)}}"  style="height:200px; width:200px; border-radius:50%;" />
                    </div>
                    <div class="text-center mt-3">
                        <p>{{Auth::user()->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection