@extends('templates.master')

@section('headernav')
  @include('includes.mainhomeheader')
@endsection

@section('content')
	<div class="container header-margin-bottom">
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif
		<div class="row">
            <div class="col-sm-12">
                <div class="form-container">
                    <form action="{{ url('/registeruser') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                            <label class="control-label col-sm-offset-3 col-sm-2">Username</label>
                            <div class="col-sm-3">
                                <input type="text" name="username" placeholder="Username" class="form-control" name="username" value="{{ Request::old('username') }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="control-label col-sm-offset-3 col-sm-2">Email</label>
                            <div class="col-sm-3">
                                <input type="email" name="email" placeholder="Email address" class="form-control" name="email" value="{{ Request::old('email') }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label class="control-label col-sm-offset-3 col-sm-2">password</label>
                            <div class="col-sm-3">
                                <input type="password" name="password" placeholder="Password" class="form-control" name="password" value="{{ Request::old('password') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-3">
                                <input type="submit" value="Register" name="regsubmit" class="btn btn-default login-button">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-offset-3 col-sm-2">Already have an account?</label>
                            <div class="col-sm-3">
                                <a href="{{ url('login') }}" class="btn btn-success form-redirect-btn">Login Here</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
@endsection