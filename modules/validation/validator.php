<?php
	
	namespace Modules\Validation;

	class Validator
	{
		public $request;
		public $input;
		public $errors = array();
		public $messages;

		public function __construct ()
		{
			$this->messages = [
				'required' => 'is required',
				'alpha' => 'should be alphabetical',
				'alphaEnG' => 'should be english and digits',
				'alphaEnWG' => 'should be english and digits with spaces',
				'alphaAr' => 'should be arabic letters only',
				'alphaArW' => 'should be arabic letters with spaces',
				'alphaArG' => 'should be arabic letters and digits',
				'alphaArWG' => 'should be arabic letters and digits with spaces',
				'alphaEnAr' => 'should be english or arabic letters',
				'alphaEnW' => 'should be english letters with spaces',
				'alphaEnArW' => 'should be english or arabic letters with spaces',
				'alnum' => 'should be alpha numeric',
				'email' => 'should be a valid email',
				'integer' => 'should be integer',
				'float' => 'should be float',
				'boolean' => 'should be boolean',
				'url' => 'should be a valid url',
				'ipv4' => 'should be an ipv4',
				'ipv6' => 'should be an ipv6',
				'numeric' => 'should be numeric',
				'max' => 'maximum length should be ',
				'min' => 'minimum length should be ',
				'dateYMD' => 'should be a date with this format YYYY-MM-DD',
				'dateDMY' => 'should be a date with this format DD-MM-YYYY',
				'regex' => 'format is not valid',
			];
		}

		public function input ($inputName)
		{
			$this->request = $_REQUEST[$inputName];
			$this->input   = $inputName;

			return $this;
		}

		public function required ()
		{
			if (isset($this->request)) 
			{
				if (empty($this->request) || is_null($this->request))
				{
					$this->errorMessage('required');
				}
			}

			return $this;
		}

		/**
		 *	English characters only
		 */
		public function alpha ()
		{
			if (isset($this->request))
			{
				if (!empty($this->request) && !preg_match_all('/^[a-zA-Z]+$/', $this->request))
				{
					$this->errorMessage('alpha');
				}
			}

			return $this;
		}

		/**
		 *	English characters and digits
		 */
		public function alphaEnG ()
		{
			if (isset($this->request))
			{
				if (!empty($this->request) && !preg_match_all('/^[a-zA-Z0-9]+$/', $this->request))
				{
					$this->errorMessage('alphaEnG');
				}
			}

			return $this;
		}

		/**
		 *	English characters and digits with spaces
		 */
		public function alphaEnWG ()
		{
			if (isset($this->request))
			{
				if (!empty($this->request) && !preg_match_all('/^[a-z0-9_\s]+$/i', $this->request))
				{
					$this->errorMessage('alphaEnWG');
				}
			}

			return $this;
		}

		/**
		 *	Arabic characters only
		 */
		public function alphaAr ()
		{
			if (isset($this->request)) 
			{
				if (!empty($this->request) && !preg_match_all('/^(?!.*\d)[\p{Arabic}]+$/iu', $this->request))
				{
					$this->errorMessage('alphaAr');
				}
			}

			return $this;
		}

		/**
		 *	Arabic characters with spaces
		 */
		public function alphaArW ()
		{
			if (isset($this->request)) 
			{
				if (!empty($this->request) && !preg_match_all('/^(?!.*\d)[\p{Arabic}\s]+$/iu', $this->request))
				{
					$this->errorMessage('alphaArW');
				}
			}

			return $this;
		}

		/**
		 *	Arabic and digits only
		 */
		public function alphaArG ()
		{
			if (isset($this->request)) 
			{
				if (!empty($this->request) && !preg_match_all('~^[0-9\-\'\p{Arabic}]{1,60}$~iu', $this->request))
				{
					$this->errorMessage('alphaArG');
				}
			}

			return $this;
		}

		/**
		 *	Arabic and digits and spaces
		 */
		public function alphaArWG ()
		{
			if (isset($this->request)) 
			{
				if (!empty($this->request) && !preg_match_all('~^[0-9\-\'\p{Arabic}\s]{1,60}$~iu', $this->request))
				{
					$this->errorMessage('alphaArWG');
				}
			}

			return $this;
		}

		/**
		 *	English and arabic characters
		 */
		public function alphaEnAr ()
		{
			if (isset($this->request)) 
			{
				if (!empty($this->request) && !preg_match_all('~^[a-zA-Z\-\'\p{Arabic}]{1,60}$~iu', $this->request))
				{
					$this->errorMessage('alphaEnAr');
				}
			}

			return $this;
		}

		/**
		 *	English characters with spaces
		 */
		public function alphaEnW ()
		{
			if (isset($this->request)) 
			{
				if (!empty($this->request) && !preg_match_all('/^[a-zA-Z\s]*$/', $this->request))
				{
					$this->errorMessage('alphaEnW');
				}
			}

			return $this;
		}

		/**
		 *	English and arabic characters with spaces
		 */
		public function alphaEnArW ()
		{
			if (isset($this->request)) 
			{
				if (!empty($this->request) && !preg_match_all('~^[a-zA-Z\-\'\s\p{Arabic}]{1,60}$~iu', $this->request))
				{
					$this->errorMessage('alphaEnArW');
				}
			}

			return $this;
		}


		public function alnum ()
		{
			if (isset($this->request)) 
			{
				if (!empty($this->request) && !preg_match_all('/^[a-zA-Z0-9]+[a-zA-Z0-9._]+$/', $this->request))
				{
					$this->errorMessage('alnum');
				}
			}

			return $this;
		}

		public function email ()
		{
			if (isset($this->request)) 
			{
				if (!empty($this->request) && !filter_var($this->request, FILTER_VALIDATE_EMAIL))
				{
					$this->errorMessage('email');
				}
			}

			return $this;
		}

		public function integer ()
		{
			if (isset($this->request)) 
			{
				if (!empty($this->request) && !filter_var($this->request, FILTER_VALIDATE_INT))
				{
					$this->errorMessage('integer');
				}
			}

			return $this;
		}

		public function float ()
		{
			if (isset($this->request)) 
			{
				if (!empty($this->request) && !filter_var($this->request, FILTER_VALIDATE_FLOAT))
				{
					$this->errorMessage('float');
				}
			}

			return $this;
		}

		public function boolean ()
		{
			if (isset($this->request)) 
			{
				if (!empty($this->request) && !filter_var($this->request, FILTER_VALIDATE_BOOLEAN))
				{
					$this->errorMessage('boolean');
				}
			}

			return $this;
		}

		public function url ()
		{
			if (isset($this->request)) 
			{
				if (!empty($this->request) && !filter_var($this->request, FILTER_VALIDATE_URL))
				{
					$this->errorMessage('url');
				}
			}

			return $this;
		}

		public function ipv4 ()
		{
			if (isset($this->request)) 
			{
				if (!empty($this->request) && !filter_var($this->request, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4))
				{
					$this->errorMessage('ipv4');
				}
			}

			return $this;
		}

		public function ipv6 ()
		{
			if (isset($this->request)) 
			{
				if (!empty($this->request) && !filter_var($this->request, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6))
				{
					$this->errorMessage('ipv6');
				}
			}

			return $this;
		}

		public function numeric ()
		{
			if (isset($this->request)) 
			{
				if (!empty($this->request) && !is_numeric($this->request))
				{
					$this->errorMessage('numeric');
				}
			}

			return $this;
		}

		public function max (int $length)
		{
			if (isset($this->request)) 
			{
				if (!empty($this->request))
				{
					if (strlen($this->request) > $length) 
					{
						$this->errorMessage('max', $length);
					}
				}
			}

			return $this;
		}

		public function min (int $length)
		{
			if (isset($this->request)) 
			{
				if (!empty($this->request))
				{
					if (strlen($this->request) < $length) 
					{
						$this->errorMessage('min', $length);
					}
				}
			}

			return $this;
		}

		public function dateYMD ()
		{
			if (isset($this->request))
			{
				if (!empty($this->request) && !preg_match_all('/^([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})$/', $this->request))
				{
					$this->errorMessage('dateYMD');
				}
			}

			return $this;
		}

		public function dateDMY ()
		{
			if (isset($this->request))
			{
				if (!empty($this->request) && !preg_match_all('/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $this->request))
				{
					$this->errorMessage('dateDMY');
				}
			}

			return $this;
		}

		public function regex ($regex)
		{
			if (isset($this->request))
			{
				if (!empty($this->request) && !preg_match_all($regex, $this->request))
				{
					$this->errorMessage('regex');
				}
			}

			return $this;
		}

		/**
		 *	Add error message to errors array
		 *
		 *	@param string $message
		 *	@param string $customMessage
		 *	@return void
		 */
		private function errorMessage ($message, $customMessage = null) 
		{
			$this->errors[$this->input] = $this->input.' '.$this->messages[$message].''.$customMessage;
		}

		public function customError ($name, $message)
		{
			$this->errors[$name] = $message;
		}

		/**
		 *	Return errors
		 *
		 *	@return array
		 */
		public function errors ()
		{
			if (!empty($this->errors)) 
			{
				header("HTTP/1.1 500 Internal Server Error");
				return $this->errors;
			}
		}

		public function jsonErrors ()
		{
			if (count($this->errors) > 0) {

				header("HTTP/1.1 500 Internal Server Error");
		        header('Content-Type: application/json; charset=UTF-8');
		        exit(json_encode($this->errors));

			} else {

				header("HTTP/1.1 200 OK");
			}
		}
	}
?>