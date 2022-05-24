<?php
	ini_set('display_errors', 1);
	include 'controllers/UserController.php';	
  include 'routers/Router.php';
  include_once 'models/Db.php';
  // handle requests 

  // singleton db connection
  Db::connect("data.json");
  $router = new Router();
  $router->parse($_SERVER['REQUEST_URI']);
	$userController = new UserController($router->params());	
  $router->render($userController);
?>
