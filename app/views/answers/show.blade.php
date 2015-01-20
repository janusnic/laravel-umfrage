@extends('layouts.master')
@section('content')

<div class="row">
  <div class="col-sm-12">
    <h2>{{ $umfrage->name }}</h2>
    <hr>
    <h4>Results</h4>
    @foreach($umfrage->getQuestions() as $question)
      @if($question['question'])
        <div class="row">
          <div class="col-sm-5">
            <p>
              {{ $question['question']}}
            </p>
          </div>
          <div class="col-sm-6">
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="{{ $answers['question'.$question['id']] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $answers['question'.$question['id']] }}%;">
                <span class="sr-only">{{ $answers['question'.$question['id']] }}% Complete</span>
              </div>
            </div>
          </div>
          <div class="col-sm-1">
            {{ $answers['question'.$question['id']] }}% 
          </div>
        </div>
      @endif
    @endforeach
  </div>
</div>

@stop
