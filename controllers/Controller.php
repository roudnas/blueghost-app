<?php
abstract class Controller {
	protected $data = [];
	protected $view = "";
	protected $params;

	public function __construct(array $params)
	{
		$this->params = $params;
		$this->handleParams();
	}

	abstract function handleParams ();

	public function paramDefined(int $paramIndex)
	{
		return isset($this->params[$paramIndex]) 
			&& !empty($this->params[$paramIndex]);
	}

	public function param(int $paramIndex)
	{
		return $this->params[$paramIndex];
	}

	public function data() { return $this->data; }
	
	public function view() { return $this->view; }

	public function redir(string $path) : void 
	{
		header("Location: {$path}");
		exit;
	}

	public function post(string $param)
	{
			return isset($_POST[$param]);
	}

}

?>
