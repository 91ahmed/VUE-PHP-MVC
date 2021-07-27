<?php
	
	use Modules\Router\Route;

	Route::get('/', 'IndexController@index');
	
	Route::get('about', function(){
		echo 'About';
	});
?>