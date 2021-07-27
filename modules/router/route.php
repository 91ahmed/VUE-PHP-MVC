<?php
	
	namespace Modules\Router;

	class Route
	{

		private static $controller;
		private static $action;
		private static $routes = array();


		public static function get ($route, $pattern)
		{
			if ($route == '' || $route == '/') {
				$route = '/';
			} else {
				$route = trim($route, '/');
			}

			if ($route === self::url()) 
			{
				if (self::method() === 'GET') 
				{
					self::$routes[] = $route;
					self::parsePattern($pattern);
				}
			}
		} 

		public static function post ($route, $pattern)
		{
			if ($route == '' || $route == '/') {
				$route = '/';
			} else {
				$route = trim($route, '/');
			}

			if ($route === self::url()) 
			{
				if (self::method() === 'POST') 
				{
					self::$routes[] = $route;
					self::parsePattern($pattern);
				}
			}
		}

		private static function parsePattern ($pattern)
		{
			if (is_callable($pattern)) {
				$pattern();
			} else {
				$pattern = explode('@', $pattern, 2);
				self::$controller = $pattern[0];
				self::$action = $pattern[1];
			}

			self::dispatch();
		}

		private static function dispatch ()
		{
			if (!empty(self::$controller) && !empty(self::$action)) 
			{
				$controller = '\\App\\Controller\\' . ucfirst(self::$controller);
				$action = self::$action;

				if (!class_exists($controller)) {
					exit('Controller Not Found');
				} elseif (!method_exists($controller, $action)) {
					exit('Action Not Found');
				} else {
					$object = new $controller();
					$object->$action();	
				}
			}		
		}

		private static function url ()
		{
			$route = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
			$route = trim(str_replace(self::rootDir(), '', $route),'/');
			
			if ($route == '') {
				$route = '/';
			}
			
			return $route;
		}

		private static function method ()
		{
			return $_SERVER['REQUEST_METHOD'];
		}

		private static function rootDir ()
		{
			$dir = trim(ROOT, DIRECTORY_SEPARATOR);
			$dir = explode(DIRECTORY_SEPARATOR, $dir);
			$dir = end($dir);
			
			return $dir;
		}
	}

	/*
	class Router
	{
		private $controller;
		private $action;
		private $routes = array();
		private $url;
		private $method;

	    private static $instance;
		
		private function __construct ()
		{
			$this->url = $this->getUrl();
			$this->method = $_SERVER['REQUEST_METHOD'];
		}
		
		public function get ($route, $pattern)
		{
			if ($route == '' || $route == '/') {
				$route = '/';
			} else {
				$route = trim($route, '/');
			}

			if ($route === $this->url) {
				if ($this->method === 'GET') {
					$this->routes[] = $route;
					$this->parsePattern($pattern);
				}
			}
		}
		
		public function post ($route, $pattern)
		{
			if ($route == '' || $route == '/') {
				$route = '/';
			} else {
				$route = trim($route, '/');
			}

			if ($route === $this->url) {
				if ($this->method === 'POST') {
					$this->routes[] = $route;
					$this->parsePattern($pattern);
				}
			}
		}
		
		private function parsePattern ($pattern)
		{
			if (is_callable($pattern)) {
				$pattern();
			} else {
				$pattern = explode('@', $pattern, 2);
				$this->controller = $pattern[0];
				$this->action = $pattern[1];
			}

			$this->dispatch();
		}

		private function notFoundMiddleware ($value)
		{
			exit('Middleware <strong><u>'.$value.'</u></strong> not found.');
			return false;
		}

		private function dispatch ()
		{
			if (!empty($this->controller) && !empty($this->action)) 
			{
				$controller = '\\App\\Controller\\' . ucfirst($this->controller);
				$action = $this->action;

				if (!class_exists($controller)) {
					exit('Controller Not Found');
				} elseif (!method_exists($controller, $action)) {
					exit('Action Not Found');
				} else {
					$object = new $controller();
					$object->$action();	
				}
			}		
		}
		
		/**
		 *	Get application URL
		 *
		 *	@return string
		 *
		private function getUrl (): string
		{
			$route = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
			$route = trim(str_replace($this->rootDir(), '', $route),'/');
			
			if ($route == '') {
				$route = '/';
			}
			
			return $route;
		}

		/**
		 *	Get root directory
		 *
		 *	@return string
		 *
		private function rootDir (): string
		{
			$dir = trim(ROOT, DIRECTORY_SEPARATOR);
			$dir = explode(DIRECTORY_SEPARATOR, $dir);
			$dir = end($dir);
			
			return $dir;
		}

		public static function app(): Router
		{
			if (null === static::$instance) {
            	static::$instance = new static();
	        }

	        return static::$instance;
		}

		public function __destruct ()
		{
			if (count($this->routes) < 1) 
			{
				header('HTTP/1.1 404 Not Found', true, 404);
				exit('404 Page Not Found');
			}
		}
	}
	*/
?>