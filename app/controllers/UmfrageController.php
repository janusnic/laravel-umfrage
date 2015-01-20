<?php

class UmfrageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$umfragen = Umfrage::all();
		return View::make('umfrage.index', compact('umfragen'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('umfrage.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		if (Auth::check())
		{
			$author_id = Auth::user()->id;
		}
		else {
			$author_id = 0;
		}
		$umfrage = new Umfrage;

		$umfrage->name = $input['name'];
		$umfrage->author_id = $author_id;
		for ( $j = 1; $j < 21; $j++ )
		{
			$question_id = 'question'.$j;
			$umfrage->$question_id = $input[$question_id];
		}
		$umfrage->save();

		return Redirect::action('UmfrageController@show', $umfrage->id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$umfrage = Umfrage::find($id);
		return View::make('umfrage.show', compact('umfrage'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$umfrage = Umfrage::find($id);
		return View::make('umfrage.edit', compact('umfrage'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getTake($id)
	{
		$umfrage = Umfrage::find($id);
		return View::make('umfrage.take', compact('umfrage'));
	}

	public function postTake($id)
	{
		$umfrage = Umfrage::find($id);
		$user = Auth::user();
		$input = Input::all();

		$answers = new Answer;
		$answers->umfrage_id = $id;
		$answers->user_id = $user->id;
		foreach($umfrage->getQuestions() as $question)
		{
			if($question['question']) {
				$answer_id = 'question'.$question['id'];
				$answers->$answer_id = $input[$answer_id];
			}
		}
		//$answers = $umfrage->answers()->save($answers);
		$answers->save();
		return Redirect::action('AnswerController@show', $id);
	}

	public function getResults()
	{
		$questions = Umfrage::$questions;
		return View::make('umfrage.results', compact('questions'));
	}

}
