<?php

class HomeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /class
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check())
			return Redirect::to('dashboard');
		return View::make('auth.login');
	}

	public function dashboard(){
		return View::make('dashboard');
	}

}