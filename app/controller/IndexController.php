<?php

	namespace App\Controller;

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