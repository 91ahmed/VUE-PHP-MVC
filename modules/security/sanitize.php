<?php
	
	namespace Modules\Security;

	class Sanitize 
	{
		public static function string ($data)
		{
			$data = filter_var($data, FILTER_SANITIZE_STRING);
			return $data;
		}

		public static function email ($data)
		{
			$data = filter_var($data, FILTER_SANITIZE_EMAIL);
			return $data;
		}

		public static function integer ($data)
		{
			$data = filter_var($data, FILTER_SANITIZE_NUMBER_INT);
			return $data;
		}

		public static function float ($data)
		{
			$data = filter_var($data, FILTER_SANITIZE_NUMBER_FLOAT);
			return $data;
		}

		public static function url ($data)
		{
			$data = filter_var($data, FILTER_SANITIZE_URL);
			return $data;
		}

		public static function specialChars ($data)
		{
			// Removes special chars. [english - numbers - spaces]
   			$data = preg_replace('/[^A-Za-z0-9\s-]/', '', $data); 
			return $data;
		}

		public static function space ($data) 
		{
			$data = str_replace(' ', '', $data);
			return $data;
		}
	}

?>