@extends('templates.master')

@section('title')
	Update...
@endsection

@section('headernav')
  @include('includes.header')
@endsection

@section('stylesheets')
	<link rel="stylesheet" type="text/css" href="{{ url('bower_components/summernote/dist/summernote.css') }}" />
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
	<form class="form-horizontal" method="POST" action="{{ url('/edit', array($article->id)) }}">
		{{ csrf_field() }}
	  <fieldset>
	    <legend>Update Question</legend>
	    <div class="form-group">
	      <label for="inputTitle" class="col-lg-2 control-label">Question Summary</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputTitle" placeholder="Title" name="title" value="{{ $article->title }}">
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="description" class="col-lg-2 control-label">Description</label>
	      <div class="col-lg-10">
	        <textarea class="form-control" rows="3" id="description" name="description">{{ $article->description }}</textarea>
	      </div>
	    </div>
	    <div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	      	<button type="submit" class="btn btn-primary">Update</button>
	        <a href="{{ url('/home') }}" class="btn btn-default">Go to Home</a>
	      </div>
	    </div>
	  </fieldset>
	</form>
</div>
@endsection

@section('scripts')
	<script src="{{ url('bower_components/summernote/dist/summernote.js') }}"></script>
	<script src="{{ url('js/markitup.init.js') }}"></script>
@endsection