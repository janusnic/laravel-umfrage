@extends('layouts.master')
@section('content')

<div class="row">
  <div class="col-sm-2">
    <h4>Actions</h4>
    <a href="{{ action('UmfrageController@edit', $umfrage->id) }}" class="btn btn-primary btn-block">Edit</a>
    <a href="{{ action('UmfrageController@getTake', $umfrage->id) }}" class="btn btn-primary btn-block">Take</a>
  </div>
  <div class="col-sm-10">
    <h4>{{ $umfrage->name }} <small>Umfrage Title</small></h4>
    <em>By: {{ User::find($umfrage->author_id)->username }}</em>
    <hr>
    <ol>
    @foreach($umfrage->getQuestions() as $question)
      @if($question['question'])
      <li>
        {{ $question['question'] }}
      </li>
      @endif
    @endforeach
    </ol>
    <hr>
    Results
    @foreach ($umfrage->getAnswers() as $answer)
    <p>
      {{ $answer->question1 }}
    </p>
    @endforeach
  </div>
</div>

@stop
