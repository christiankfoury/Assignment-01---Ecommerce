<?php

namespace app\core;

class App{

	private $controller = 'app\\controllers\\Main'; //set a default value for the controller
	private $method = 'index';
	private $params = [];

	// Constructor
	public function __construct(){
		//parse incoming urls to an array containing the url components
		$url = $this->parseURL();

		//check and implement the controller
		if(isset($url[0])){ //are there contents in the $url[0] element
			if(file_exists('app/controllers/' . $url[0] . '.php')){
				$this->controller = 'app\\controllers\\' . $url[0];
			}

			unset($url[0]);//deleting $url[0] from memory. 
		}
		//$this->controller becomes an object of the requested type
		$this->controller = new $this->controller;

		// Verify and choose the method
		if(isset($url[1])){
			if(method_exists($this->controller, $url[1])){
				$this->method = $url[1];
			}
			unset($url[1]);
		}

		//take care of any parameter
		$this->params = $url ? array_values($url) : [];

		// Run the command from class, method, with the following parameters
		call_user_func_array(array($this->controller, $this->method), $this->params);
	}

	// Parse URl in an array
	public function parseURL(){
		// Check that the url is passed as a GET parameter
		if(isset($_GET['url'])){ 
			return explode('/', 
				filter_var(
					rtrim($_GET['url'], '/'),
					 FILTER_SANITIZE_URL)
			);
		}
	}
}