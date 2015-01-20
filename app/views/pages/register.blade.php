@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-sm-6 col-sm-offset-3">
    <h2>Register</h2>
    {{ Form::open(['action' => 'UserController@store', 'method' => 'post', 'role' => 'form', 'class' => 'col-sm-12']) }}
      <div class="form-group">
        <label for="username">Username <i class="pull-right text-info info fa fa-info" title="Exactly 6 characters. Alphanumeric."></i></label>
        <input name="username" type="text" class="form-control" id="username" placeholder="Username">
      </div>
      <div class="form-group">
        <label for="password">Password <i class="pull-right text-info info fa fa-info" title="At least 1 Uppercase, 1 Lowercase, 1 Special character, min. 8 characters long"></i></label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password">
      </div>
      <button type="submit" class="btn btn-default btn-block">Register</button>
    {{ Form::close() }}
  </div>
</div>
@stop

@section('scripts')
@parent

<script src="{{ asset('js/validator.js') }}"></script>

@stop
