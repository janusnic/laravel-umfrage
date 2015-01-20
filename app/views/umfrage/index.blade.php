@extends('layouts.master')
@section('content')

<div class="row">
  <div class="col-sm-2">
    <a href="{{ action('UmfrageController@create') }}" class="btn btn-primary">Create new</a>
  </div>
  <div class="col-sm-10">
    <h3>Umfragen</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>
            Name
          </th>
          <th>
            Author
          </th>
          <th>
            Actions
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
        @foreach($umfragen as $umfrage)
          <td>
            <a href="{{ action('UmfrageController@show', $umfrage->id)}}">{{ $umfrage->name }}</a>
          </td>
          <td>
            @if ($umfrage->author_id != 0)
              {{ User::find($umfrage->author_id)->username }}
            @else
              <em>anonymous</em>
            @endif
          </td>
          <td>
            <a href="{{ action('AnswerController@show', $umfrage->id) }}" class="btn btn-info btn-xs">Resultate</a>
            <a href="{{ action('UmfrageController@getTake', $umfrage->id) }}" class="btn btn-primary btn-xs">Take</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>

@stop
