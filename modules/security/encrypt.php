<?php
	
	namespace Modules\Security;

	/**
	 *	Class for data encryption using openssl extension
	 */
	class Encrypt
	{
		/**
		 *	@var string $openssl_key
		 */
		private static $openssl_key;

		/**
		 *	@var string $openssl_method
		 */
		private static $openssl_method;

		/**
		 *	@var string $openssl_iv
		 */
		private static $openssl_iv;

		public function __construct ()
		{
			self::$openssl_key    = config('openssl_key');
			self::$openssl_method = config('openssl_method');
			self::$openssl_iv 	  = config('openssl_iv');
		}

		/**
		 *	Encrypt data
		 *
		 *	@param string $value
		 *
		 * 	@return string
		 */
		public static function set ($value)
		{
			return openssl_encrypt($value, self::$openssl_method, self::$openssl_key, OPENSSL_RAW_DATA,self::$openssl_iv);
		}

		/**
		 *	Decrypt data
		 *
		 *	@param string $value
		 *
		 * 	@return string
		 */
		public static function get ($value)
		{
			return openssl_decrypt($value, self::$openssl_method, self::$openssl_key, OPENSSL_RAW_DATA, self::$openssl_iv);
		}
	}
	
?>