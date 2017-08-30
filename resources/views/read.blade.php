@extends('templates.master')

@section('title')
  Laravel CRUD Application
@endsection

@section('headernav')
  @include('includes.header')
@endsection

@section('stylesheets')
  <link rel="stylesheet" type="text/css" href="{{ url('bower_components/summernote/dist/summernote.css') }}" />
@endsection

@section('content')
  <div class="container header-margin-bottom">
    @if(session('info'))
      <div class="alert alert-success">
        {{ session('info') }}
      </div>
    @endif
    <legend>
      Question Details
      <a class="label label-default pull-right question-react-btns">Dislike</a>
      <a class="label label-default pull-right question-react-btns">Like</a>
    </legend>
    <h4>{{ $article->title }}</h4>
    <p>{!!html_entity_decode($article->description)!!}</p>
    <div class="suggestions">
      @foreach($article->clarifications as $clarification)
        <div class="suggestion-div">
          <b class="clarification-bold">{{ $clarification->user->username . " :" }}</b>&nbsp{!! html_entity_decode($clarification->clarification) !!}
          <a><span class="glyphicon glyphicon-thumbs-up label-margin-right"></span></a>
          <a><span class="glyphicon glyphicon-thumbs-down label-margin-right"></span></a>
          @if(auth()->user()->id === $clarification->user->id)
            <a><span class="glyphicon glyphicon-pencil label-margin-right"></span></a>
            <a><span class="glyphicon glyphicon-trash"></span></a>
          @endif 
        </div>
      @endforeach
    </div>
    @if(auth()->user()->id === $article->user_id)
      <a href='{{ url("update/{$article->id}") }}' class="label label-warning">Edit</a>  |
      <a href='{{ url("delete/{$article->id}") }}' class="label label-danger">Delete</a> |
    @endif
    <button class="label label-success" id="btnAnswer">Give an Answer</button> |
    <button class="label label-info" id="btnClarification">Suggest / Ask for Clarification</button> |
    <a href="{{ url('/home') }}" class="label label-default">Go bake to Home</a>
    <div class="answer-container">
      <form class="form-horizontal" method="POST" action="{{ url('/useranswer') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="description" class="col-lg-2 control-label">Answer</label>
          <div class="col-lg-10">
            <textarea class="form-control" rows="3" id="description" name="comment"></textarea>
          </div>
        </div>
        <input type="hidden" name="post_id" value="{{ $article->id }}">
        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" class="btn btn-primary">Submit Answer</button>
          </div>
        </div>
      </form>
    </div>
    <div class="clarification-container">
      <form class="form-horizontal" method="POST" action="{{ url('/getclarification') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="description" class="col-lg-2 control-label">Suggest / Ask for Clarification</label>
          <div class="col-lg-10">
            <textarea class="form-control" rows="2" name="clarification"></textarea>
          </div>
        </div>
        <input type="hidden" name="post_id" value="{{ $article->id }}">
        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" class="btn btn-primary">Ask for Clarification</button>
          </div>
        </div>
      </form>
    </div>
    <hr>
    <h4>Answers</h4>
    <div class="comments-container">
      @if(count($article->comments) > 0)
        @foreach($article->comments as $comment)
          <div class="comment-container">
            <div class="comment-head">
              <b>{{ "Answer by : ". $comment->user->username }}</b>
            </div>
            <div class="comment-div">
              {!! html_entity_decode($comment->comment) !!}
            </div>
            <div class="action-buttons">
              <button class="label label-info label-margin-right btnReply">Reply</button>
              @if(auth()->user()->id === $comment->user->id)
                <a href='' class="label label-warning label-margin-right">Edit</a>
                <a href='' class="label label-danger">Delete</a>
              @endif
            </div>
            <div class="reply-container">
              <form class="form-horizontal" method="POST" action="{{ url('/userreply') }}">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="description" class="col-lg-2 control-label">Reply</label>
                  <div class="col-lg-10">
                    <textarea class="form-control" rows="2" name="reply"></textarea>
                  </div>
                </div>
                <input type="hidden" name="post_id" value="{{ $article->id }}">
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary">Submit Reply</button>
                  </div>
                </div>
              </form>
            </div>
            @if(count($comment->replies) > 0)
              <hr>
              @foreach($comment->replies as $reply)
                <div class="single-rep-container">
                  <div class="sing-rep-head">
                    <b>{{ $reply->user->username }} </b> | {{ $reply->created_at }}
                    @if(auth()->user()->id === $reply->user->id)
                      <a><span class="glyphicon glyphicon-trash pull-right"></span></a>
                      <a><span class="glyphicon glyphicon-pencil pull-right label-margin-right"></span></a>
                    @endif 
                    <a><span class="glyphicon glyphicon-thumbs-down pull-right label-margin-right"></span></a>
                    <a><span class="glyphicon glyphicon-thumbs-up pull-right label-margin-right"></span></a>
                  </div>
                  {!! html_entity_decode($reply->reply) !!}
                </div>
              @endforeach
            @endif
          </div>
        @endforeach
      @else
        <div class="no-data-found">
          {{ "No answers found!!! Be the first to answer..." }}
        </div>
      @endif
    </div>
  </div>
@endsection

@section('scripts')
  <script src={{ url('js/close.alert.js') }}></script>
  <script src="{{ url('bower_components/summernote/dist/summernote.js') }}"></script>
  <script src="{{ url('js/markitup.init.js') }}"></script>
  <script>
    $('#btnAnswer').click(function () {
      $('.answer-container').slideToggle();
      $('.clarification-container').hide(500);
    });

    $('#btnClarification').click(function () {
      $('.answer-container').hide(500);
      $('.clarification-container').slideToggle();
    });

    $('.btnReply').click(function () {
      $(this).parents('.comment-container').find('.reply-container').slideToggle();
    });
  </script>
@endsection