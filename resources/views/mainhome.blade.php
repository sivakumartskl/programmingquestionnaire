@extends('templates.master')

@section('stylesheets')
  <link href="{{ url('css/cover.css') }}" rel="stylesheet">
@endsection

@section('headernav')
  @include('includes.mainhomeheader')
@endsection

@section('content')
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h1 class="mt-5">Progamming Questionnaire</h1>
        <p>Hello dear users, welcome to <strong>Programming Questionnaire</strong>, Here
          you can ask any programming language questions and get answers to those questions by other users or answer questions already asked by other users. Cheers!!!</p>
      </div>
    </div>
  </div>
</section>
@endsection
