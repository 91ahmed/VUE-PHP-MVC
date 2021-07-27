<?php
	ob_start();

	// Directory Separator
	define ('DS', DIRECTORY_SEPARATOR);

	// Root Path
	define ('ROOT', __DIR__ . DIRECTORY_SEPARATOR);

	// Include startup file
	require (ROOT.'bootstrap'.DS.'startup.php');

	$app = new \Bootstrap\StartUp();
?>