


<?php








	ini_set('display_errors',1);
	error_reporting(E_ALL);

	session_start();

//Подключение файлов системы
	define('ROOT', dirname(__FILE__));

	// require_once(ROOT.'/components/Autoload.php');
	require_once(ROOT.'/components/Router.php');
	require_once(ROOT.'/components/Db.php');






	$router = new Router();
	// var_dump($router); die;
	$router->run();