@extends('layouts.master')
@section('content')

<div class="row">
  <h3>{{ $umfrage->name }}</h3>
  {{ Form::open(['action' => ['UmfrageController@postTake', $umfrage->id], 'method' => 'post', 'role' => 'form']) }}
  @foreach($umfrage->getQuestions() as $question)
    @if($question['question'])
    <!-- Question -->
    <div class="question_container clearfix">
      <h5>Question {{ $question['id'] }}</h5>
      <div class="col-sm-4">
        {{ $question['question'] }}
      </div>
      <div class="col-sm-8">
        <label for="{{ $question['id'] }}_nein" class="radio-inline">
          <input type="radio" name="question{{ $question['id'] }}" id="{{ $question['id'] }}_nein" value="0"> nein
        </label>
        <label for="{{ $question['id'] }}_ehernein" class="radio-inline">
          <input type="radio" name="question{{ $question['id'] }}" id="{{ $question['id'] }}_ehernein" value="25"> eher nein
        </label>
        <label for="{{ $question['id'] }}_eherja" class="radio-inline">
          <input type="radio" name="question{{ $question['id'] }}" id="{{ $question['id'] }}_eherja" value="75"> eher ja
        </label>
        <label for="{{ $question['id'] }}_ja" class="radio-inline">
          <input type="radio" name="question{{ $question['id'] }}" id="{{ $question['id'] }}_ja" value="100"> ja
        </label>
        <label for="{{ $question['id'] }}_keinemeinung" class="radio-inline">
          <input type="radio" name="question{{ $question['id'] }}" id="{{ $question['id'] }}_keinemeinung" value="50"> keine Meinung
        </label>
      </div>
    </div>
    <hr>
    <!-- /Question -->
    @endif
  @endforeach
  <div class="form-group">
    <input type="submit" name="" class="btn btn-primary btn-block" value="Submit Answers">
  </div>
  {{ Form::close() }}
</div>

@stop
