@extends('templates.master')

@section('title')
  Laravel CRUD Application
@endsection

@section('headernav')
  @include('includes.header')
@endsection

@section('content')
  <div class="container header-margin-bottom">
    <legend>Laravel CRUD Application</legend>
    @if(session('info'))
      <div class="alert alert-success">
        {{ session('info') }}
      </div>
    @endif
    @if(count($articles) > 0)
          @foreach($articles as $article)
            <div class="row">
              <div class="col-sm-12">
                <div class="post-container">
                  <div class="post-title">
                    <a href='{{ url("read/{$article->id}") }}' class="post-link"><h4>{{ $article->title }}</h4></a>
                    <div>
                      {{ "Asked By : ". $article->user->username }} | 
                      {{ date('d D M Y - H:i:s', strtotime($article->created_at)) }}
                    </div>
                  </div>
                  <div class="post-description">
                    {{ $article->description }}
                  </div>
                  <div class="action-buttons">
                    @if(auth()->user()->id === $article->user_id)
                      <a href='{{ url("delete/{$article->id}") }}' class="label label-danger pull-right ">Delete</a>
                      <a href='{{ url("update/{$article->id}") }}' class="label label-warning pull-right label-margin-right">Update</a>
                    @endif
                    <a href='{{ url("read/{$article->id}") }}' class="label label-info pull-right label-margin-right">View</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
    @else
      <div class="no-data-found">
        {{ "No questions found!!! Be the first to ask question..." }}
      </div>
    @endif
  </div>
@endsection

@section('scripts')
  <script src={{ url('js/close.alert.js') }}></script>
@endsection
    
    
