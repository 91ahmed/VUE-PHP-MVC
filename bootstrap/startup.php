<?php

	namespace Bootstrap;
	
	class StartUp
	{
		public function __construct ()
		{
			$this->addFile('app/helpers');
			$this->addFile('config/phpini');
			$this->addFile('vendor/autoload');
			$this->addFile('bootstrap/autoload');
			$this->addFile('bootstrap/objects');
			$this->addFile('routes/routes');
		}

		public function addFile ($filePath)
		{
			$filePath = str_replace(['/','\\'], DS, $filePath);
			require (ROOT.$filePath.'.php');
		}
	}
?>