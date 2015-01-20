@extends('layouts.master')

@section('content')

<div class="row">
  <div class="col-sm-6 col-sm-offset-3">
    @if (Session::has('message'))
    <div class="panel panel-info panel-sm">
      <div class="panel-heading">
        Successfully created new profile
      </div>
      <div class="panel-body">
          Please complete your profile.
      </div>
    </div>
    @endif
    {{ Form::model(Auth::user(), ['action' => ['UserController@update', Auth::user()->id]]) }}
      <div class="form-group">
        <label for="username">Username </label>
        <input name="username" type="text" class="form-control" disabled id="username" placeholder="Username" value="{{ Auth::user()->username }}">
      </div>
      <div class="form-group">
        <label for="password">Password </label>
        <input name="password" type="text" class="form-control" disabled id="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Enter Email">
      </div>
      <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" class="form-control" value="{{ Auth::user()->firstname }}" placeholder="Enter First Name">
      </div>
      <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" class="form-control" value="{{ Auth::user()->lastname }}" placeholder="Enter First Name">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Save</button>
      </div>
    {{ Form::close() }}
  </div>
</div>

@stop
