@extends('layouts.master')
@section('content')

<div class="row">
  <div class="col-sm-12">
    {{ Form::model($umfrage, ['action' => 'UmfrageController@update', 'method' => 'put', 'role' => 'form']) }}
    <div class="form-group">
      <label for="name">Umfrage Name</label>
      <input type="text" name="name" value="{{ $umfrage->name }}" id="name" class="form-control">
    </div>
    @for($i = 1; $i < 21; $i++)
    <?php $question_id = 'question'.$i ?>
    <div class="form-group">
      <label for="question{{$i}}">Question {{ $i }}</label>
      <input type="text" name="question{{ $i }}" value="{{ $umfrage->$question_id}}" id="question{{ $i }}" class="form-control">
    </div>
    @endfor
    <div class="form-group">
      <input type="submit" value="Save & Update" class="btn btn-primary btn-block">
    </div>
    {{ Form::close() }}
  </div>
</div>

@stop
