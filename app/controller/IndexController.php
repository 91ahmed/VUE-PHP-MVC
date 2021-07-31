<?php

	namespace App\Controller;

	use Modules\Validation\Validator;
	use App\Model\User;
	
	class IndexController
	{
		public function __construct ()
		{
			// Middlewares
		}

		public function index ()
		{
			//$users = User::query()->all()->get();

			$valid = new Validator();
			$valid->input('firstname')->required()->dateDMY();
			$valid->input('lastname')->required()->alpha();

			/*
			$valid->customError('error', 'database not found!');
			*/

			$valid->errors();

			$users = [
				['username' => 'ahmed'],
				['username' => 'muhammed'],
				['username' => 'osama']
			];

			$title = 'Home Page';

			return view('home', compact('title', 'users'));
		}
	}
?>