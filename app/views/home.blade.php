@extends('layouts.master')

@section('content')
  <h1>Umfrage Projekt</h1>
  @if (Auth::check())
    Wilkommen, bearbeiten Sie eine Umfrage
  @else
   
  @endif
 @stop
