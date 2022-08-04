<?php

Class Router 
{

	private $routes;

	public function __construct()
	{
		$routesPath= ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
// var_dump($this); die;
	}

	private function getURI()

	{
			if (!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}




	public function run()
	{
	
		$uri = $this->getURI();
// var_dump($uri); die;	 	
		foreach ($this->routes as $uriPattern => $path) {
			if (preg_match("~$uriPattern~", $uri)) {
// var_dump(preg_replace("~~", 'site/index', '')); die;
				
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
// var_dump($internalRoute); die;
				
				$segments = explode('/', $internalRoute);
// var_dump($segments); die;

				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName);

				$actionName = 'action'.ucfirst(array_shift($segments));
// var_dump($actionName); die;
				
				$parameters = $segments;
				

				$controllerFile = ROOT . '/controllers/'. $controllerName. '.php';

				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				}
				// var_dump($controllerFile); die;
				$controllerObject = new $controllerName;

			$result = call_user_func_array(array($controllerObject, $actionName),$parameters);
// var_dump($result); die;
				if ($result != null) {
					break;
				}
				// var_dump($result); die;
			}
		}

	}

}