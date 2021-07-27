<?php
	
	namespace Modules\Security;
	
	/**
	 *	Class for string hasing using password_hash function.
	 */
	class Hashing
	{	
		/**
		 *	Currently supported algorithms.
		 *
		 *	[ PASSWORD_DEFAULT - PASSWORD_BCRYPT - PASSWORD_ARGON2I - PASSWORD_ARGON2ID ]
		 *
		 *	@var $algorithm
		 */
		private static $algorithm = PASSWORD_BCRYPT;

		/**
		 *	@var array $options
		 */
		private static $options   = [
			'cost' => 12,
		];

		/**
		 *	Creates a string hash.
		 *
		 *	@param string $text
		 *
		 *	@return string
		 */
		public static function data ($text)
		{
			return password_hash($text, self::$algorithm, self::$options);
		}

		/**
		 *	Verifies that the given hash matches the given string.
		 *
		 *	@param string $text
		 *	@param string $hash
		 *
		 *	@return boolean
		 */
		public static function verify ($text, $hash)
		{
			if (password_verify($text, $hash)) {
				return true;
			} else {
				return false;
			}
		}

	}

?>