@extends('templates.master')

@section('title')
  Laravel CRUD Application
@endsection

@section('headernav')
  @include('includes.header')
@endsection

@section('content')
  <div class="container header-margin-bottom">
  	<div class="alert alert-danger">
  		Think!!! Do you really want to delete below post
  	</div>
  	<a href='{{ url("deleteconfirm/{$article->id}") }}' class="label label-warning">Yes</a>  |
    <a href="{{ url('/home') }}" class="label label-primary">No</a>
    <legend>Post Details</legend>
  	<h4>{{ $article->title }}</h4>
  	<p>{{ $article->description }}</p>
  </div>
@endsection