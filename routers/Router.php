<?php
require_once 'controllers/Controller.php';

class Router {
	protected $params;

	public function parse( string $url ) : void
	{
		$arr = explode("/", ltrim($url, "/"));
		$this->params = $arr;
	}

	public function render( Controller $controller ) : void 
	{
		extract($this->sanitize($controller->data()), EXTR_PREFIX_ALL, '');
		require("views/{$controller->view()}.php");
	}

	public function params () : array 
	{
		return $this->params;
	}
}
?>
