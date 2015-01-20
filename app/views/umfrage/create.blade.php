@extends('layouts.master')
@section('content')

<div class="row">
  <div class="col-sm-12">
    {{ Form::open(['action' => 'UmfrageController@store', 'method' => 'post', 'role' => 'form']) }}
    <div class="form-group">
        <label for="name">Umfrage Name</label>
        <input type="text" name="name" value="" id="name" class="form-control">
    </div>
    @for($i = 1; $i < 21; $i++)
    <div class="form-group">
      <label for="question{{$i}}">Question {{ $i }}</label>
      <input type="text" name="question{{ $i }}" value="" id="question{{ $i }}" class="form-control">
    </div>
    @endfor
    <div class="form-group">
      <input type="submit" value="Submit" class="btn btn-primary btn-block">
    </div>
    {{ Form::close() }}
  </div>
</div>

@stop
