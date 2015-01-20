<?php

class Umfrage extends Eloquent {

  protected $table = 'umfragen';

  public function getQuestions()
  {
    $questions = [];

    for($i = 1; $i < 20; $i++)
    {
      $question_id = 'question'.$i;
      $questions[$i] = ['id' => $i, 'question' => $this->$question_id];
    }
    return $questions;
  }

  public function getAnswers()
  {
    $answers = Answer::where('umfrage_id', '=', $this->id)->get();

    return $answers;
  }

  public function getAvgAnswers()
  {
    $answers = $this->getAnswers();
    $count = count($answers);
    $averages = [];

  }

  public function answers()
  {
    $this->hasMany('Answer');
  }

}
