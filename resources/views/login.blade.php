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
                    <form action="{{ url('/loginuser') }}" method='post' class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-sm-offset-3 col-sm-2">Email</label>
                            <div class="col-sm-3"><input type='text' name='email' class="form-control"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-offset-3 col-sm-2">Password</label>
                            <div class="col-sm-3"><input type='password' name='password' class="form-control"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-3">
                                <input type='submit' name='logsub' class="btn btn-default login-button" value="Login">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-offset-3 col-sm-2">Don't have an account?</label>
                            <div class="col-sm-3">
                                <a href="{{ url('register') }}" class="btn btn-success form-redirect-btn">Register Here</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
@endsection