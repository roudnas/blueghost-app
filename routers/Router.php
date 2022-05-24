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

	protected function sanitize(mixed $x) : mixed 
	{
    if (!isset($x)) {
      return null;
    } elseif (is_string($x)) {
      return htmlspecialchars($x, ENT_QUOTES);
    } elseif (is_array($x)) {
      foreach ($x as $key => $v) {
        $x[$key] = $this->sanitize($v);
      }
      return $x;
    } else {
      return $x;
    }
	} 

	public function params () : array 
	{
		return $this->params;
	}
}
?>
