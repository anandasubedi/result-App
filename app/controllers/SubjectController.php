<?php

class SubjectController extends \BaseController {

	/**
	 * Display a listing of subjects
	 *
	 * @return Response
	 */
	public function index($class)
	{
		$subjects = Subject::whereClassId($class)->get();

		return View::make('subjects.index', compact('subjects','class'));
	}

	/**
	 * Show the form for creating a new subject
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('subjects.create');
	}

	/**
	 * Store a newly created subject in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Subject::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Subject::create($data);

		return Redirect::route('subjects.index');
	}

	/**
	 * Display the specified subject.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$subject = Subject::findOrFail($id);

		return View::make('subjects.show', compact('subject'));
	}

	/**
	 * Show the form for editing the specified subject.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subject = Subject::find($id);

		return View::make('subjects.edit', compact('subject'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$subject = Subject::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Subject::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$subject->update($data);

		return Redirect::route('subjects.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Subject::destroy($id);

		return Redirect::route('subjects.index');
	}

}