@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-sm-12">
    @if ($user->firstname)
      <h1>{{ $user->firstname}} {{ $user->lastname}} <small>{{ $user->username}}</small></h1>
    @else
      <h1>{{ $user->username }}</h1>
    @endif
  </div>
  <div class="col-sm-2">
    <h2>Dashboard</h2>
    <hr>
      <p>
        <a href="{{ action('UserController@edit', $user->id )}}" class="btn btn-primary btn-block" >Edit Profile</a>
        <a href="/logout" class="btn btn-warning btn-block">Logout</a>
        <a href="#" class="btn btn-danger btn-block">Delete Profile</a>
      </p>
  </div>
  <div class="col-sm-10">
    <h2>Personal Details</h2>
    <hr>
    <p>
      <strong>First Name: </strong> {{ $user->firstname }}
    </p>
    <p>
      <strong>Last Name: </strong> {{ $user->lastname }}
    </p>
    <p>
      <strong>E-mail: </strong> {{ $user->email }}
    </p>
    <p>
      <strong>Surveys completed: </strong> 0
    </p>
  </div>
</div>

@stop
