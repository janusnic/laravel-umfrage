<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pages.register');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, User::$rules);

		// check server-side validation
		if ($validation->fails())
		{
			// return to registration page with inputs and errors
			return Redirect::action('UserController@create')->withInput()->withErrors($validation);
		}

		// create a new user
		$user = new User;
		$user->username = $input['username'];
		$user->password = Hash::make($input['password']);
		$user->save();

		Auth::login($user);

		return Redirect::action('UserController@edit')->with('message', 'Please complete your profile.');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		return View::make('pages.show', compact('user'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = Auth::user();
		return View::make('pages/edit', compact('user'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		$validation = Validator::make($input, User::$editRules);

		// check server-side validation
		if ($validation->fails())
		{
			// return to registration page with inputs and errors
			return Redirect::action('UserController@edit', $id)->withErrors($validation)->withInput();
		}

		$user = User::find($id);
		if (Input::has('email'))
		$user->email 			= $input['email'];
		if (Input::has('firstname'))
		$user->firstname 	= $input['firstname'];
		if (Input::has('lastname'))
		$user->lastname 	= $input['lastname'];
		$user->save();

		return Redirect::action('UserController@show', $id);
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

	public function login()
	{
		$input = Input::all();

		if (Auth::attempt(array('username' => $input['username'], 'password' => $input['password'])))
		{
			return Redirect::to('/');
		}
		else
		{
			return Redirect::back()->withErrors(['Invalid Username/Password']);
		}
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

}
