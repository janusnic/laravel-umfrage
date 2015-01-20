<?php

class Answer extends Eloquent {

  protected $table = 'answers';

  public function umfrage()
  {
    $this->belongsTo('Umfrage');
  }

}
