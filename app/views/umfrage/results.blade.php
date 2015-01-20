@extends('layouts.master')
@section('content')

<h2>Results</h2>
<div class="row">
@foreach($questions as $question)
  <div class="col-sm-12">
    <h4>Question {{ $question['id'] }}</h4>
    <p>
      {{ $question['prompt']}}
    </p>
  </div>
  <div class="col-sm-6">
    <p>
      Ja
    </p>
  </div>
  <div class="col-sm-6">
    <p class="text-right">
      Nein
    </p>
  </div>
</div>

<div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $question['result'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $question['result'] }}%">
    <span class="sr-only">{{ $question['result'] }}% Complete (success)</span>
  </div>
</div>
@endforeach

@stop
